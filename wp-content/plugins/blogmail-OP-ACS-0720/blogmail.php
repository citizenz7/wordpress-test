<?php
/*
Plugin Name: Blogmail-OP-ACS-0720
Plugin URI: https://olivierp.promo-41.codeur.online/wordpress-test
Description: Un plugin qui doit permettre, enfin j'espère... d'envoyer un mail à une liste d'adresse à chaque fois qu'un article est publié. Mais bon, ça, c'est la théorie, hein ?!!
Version: 0.1
Author: citizenz7
Author URI: https://www.citizenz.info
License: GPL2
*/
?>

<?php

/* checks status of post_ID and if in the future, schedules the sending event */
// note that this does not work for custom post types.
function mail_blog_post( $post_ID ) {
	$post = get_post($post_ID);
	if( ( $post->post_status == 'publish' ) && ( $post->original_post_status != 'publish' ) ) {
		send_blognewsletter($post_ID);
	}
	else if ( 'future' == $post->post_status ) {
	    $time = strtotime( $post->post_date_gmt . ' GMT' );
	    if ( $time > time() ) { // Uh oh, someone jumped the gun!
	        wp_clear_scheduled_hook( 'schedule_blognewsletter', array( $post_id ) ); // clear anything else in the system - https://developer.wordpress.org/reference/functions/wp_clear_scheduled_hook/
	        wp_schedule_single_event( $time, 'schedule_blognewsletter', array( $post_ID ) ); // https://developer.wordpress.org/reference/functions/wp_schedule_single_event/
	        return;
	    }
	}
}

/* Code inspired by http://codex.wordpress.org/Plugin_API/Action_Reference/publish_post
 * sends the actual email
 */
function send_blognewsletter( $post_ID ) {
	$post = get_post($post_ID);
	// get options
	$blog_newsletter_options = get_option('blog_newsletter_option_name');
	$from = $blog_newsletter_options['from'];
	if(!is_email($from)) $from = get_option( 'admin_email' ); // fall back to admin email if from !isset
	$subject = $blog_newsletter_options['subject'];
	$recipients = $blog_newsletter_options['recipients'];
	$logoURL = $blog_newsletter_options['logo'];
	$extracontents = $blog_newsletter_options['extracontents'];

	// send mail
	if(!empty($recipients) AND !empty($from)) {
		$to = $from;
		$blogurl = get_bloginfo('url');
		$blogname =  get_bloginfo('name');
		// doing some tests...
		$posttitle = str_replace("&rsquo;","'", get_the_title($post_ID)); //simple quote
		$posttitle = preg_replace('/[^a-zA-ZÀ-ÿ0-9’\']/', ' ', $posttitle);
		$postlink = get_permalink($post_ID);
		$headers[] = "From: $blogname <$from>";
		$headers[] = "Bcc: $recipients";

		// get thumbnail
		if(has_post_thumbnail($post_ID))
			$postthumbnail = get_the_post_thumbnail( $post_ID, 'thumbnail' );

		// get excerpt
		$postexcerpt = apply_filters('get_the_excerpt', $post->post_excerpt);

		// If logoURL is not empty...
		if(!empty($logoURL))
			$message = "<a href=\"$blogurl\"><img src=\"$logoURL\" alt=\"\" /></a><br />";

		$message .= "$extracontents<br /><br /><span style=\"float:left; margin-right: 1em;\">$postthumbnail</span><h1>$posttitle</h1>$postexcerpt<br/><br/><a href=\"$postlink\">".__('Lire la suite')."</a><br style=\"clear: both;\" />--<br />$blogurl";

		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

		// Send the mail: https://developer.wordpress.org/reference/functions/wp_mail/
		wp_mail( $to, "[$blogname] $subject $posttitle", $message, $headers );
		return $post_ID;
	}
}
add_action( 'publish_post', 'mail_blog_post');
add_action( 'schedule_blognewsletter','send_blognewsletter', 10, 3 );

class BlogNewsletterSettingsPage {
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings": https://developer.wordpress.org/reference/functions/add_options_page/
        add_options_page(
            'Settings Admin',
            'Blog Mail',
            'manage_options',
            'blog-newsletter-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'blog_newsletter_option_name' );
        ?>
        <div class="wrap">
            <?php //screen_icon(); ?> <!-- https://developer.wordpress.org/reference/functions/screen_icon/ DEPRECATED -->
            <h2>Paramètres de blogMail</h2>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'blog_newsletter_option_group' ); // https://developer.wordpress.org/reference/functions/settings_fields/
                do_settings_sections( 'blog-newsletter-admin' ); // https://developer.wordpress.org/reference/functions/do_settings_sections/
                submit_button(); // https://developer.wordpress.org/reference/functions/submit_button/
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'blog_newsletter_option_group', // Option group
            'blog_newsletter_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'blog_newsletter_section_general', // ID
            'Paramètres', // Title
            array( $this, 'print_section_info' ), // Callback
            'blog-newsletter-admin' // Page
        );

        add_settings_field(
            'from',
            'E-mail de l\'expéditeur',
            array( $this, 'from_callback' ),
            'blog-newsletter-admin',
            'blog_newsletter_section_general'
        );
        add_settings_field(
            'recipients',
            'Liste des adresses e-mail des destinataires, séparées par une virgule',
            array( $this, 'recipients_callback' ),
            'blog-newsletter-admin',
            'blog_newsletter_section_general'
        );
        add_settings_field(
            'subject',
            'Sujet de l\'e-mail (exemple : "Nouvel article :")',
            array( $this, 'subject_callback' ),
            'blog-newsletter-admin',
            'blog_newsletter_section_general'
        );
        add_settings_field(
            'extracontents',
            'Contenu supplémentaire dans le message (apparait avant le lien de l\'article)',
            array( $this, 'extracontents_callback' ),
            'blog-newsletter-admin',
            'blog_newsletter_section_general'
        );
        add_settings_field(
            'logo',
            'Logo (Veuillez fournir une URL de l\'image - attention à la taille)',
            array( $this, 'logo_callback' ),
            'blog-newsletter-admin',
            'blog_newsletter_section_general'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {

        if( !empty( $input['from'] ) )
            $input['from'] = sanitize_email( $input['from'] ); // https://developer.wordpress.org/reference/functions/sanitize_email/

        if( !empty( $input['logo'] ) )
            $input['logo'] = esc_url( $input['logo'] );

        if( !empty( $input['recipients'] ) ) {
            $input['recipients'] = sanitize_text_field(str_replace( ';', ',', $input['recipients'] )); // https://developer.wordpress.org/reference/functions/sanitize_text_field/
            $tmprecipients = explode( ',', $input['recipients'] );
            foreach($tmprecipients as $recipient) {
                $tmp = sanitize_email( $recipient );
                if(!empty($tmp)) {
                    $clean_recipients[] = $tmp;
                }
            }
            $input['recipients'] = implode(',', $clean_recipients);
        }

        if( !empty( $input['subject'] ) )
            $input['subject'] = sanitize_text_field( $input['subject'] );

        if( !empty( $input['extracontents'] ) )
            $input['extracontents'] = sanitize_text_field( $input['extracontents'] );

        return $input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'La newsletter sera envoyée automatiquement à tous les inscrits quand vous publiez un article.';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function from_callback()
    {
        printf(
            '<input type="text" id="from" name="blog_newsletter_option_name[from]" value="%s" class="regular-text ltr" />',
            esc_attr( $this->options['from'])
        );
    }

    public function recipients_callback()
    {
        printf(
            '<textarea id="recipients" name="blog_newsletter_option_name[recipients]" class="large-text code">%s</textarea>',
            esc_attr( $this->options['recipients']) // https://developer.wordpress.org/reference/functions/esc_attr/
        );
    }

    public function subject_callback()
    {
        printf(
			'<input type="text" id="subject" name="blog_newsletter_option_name[subject]" class="regular-text ltr" value="%s" />',
			esc_attr( $this->options['subject'])
        );
    }

    public function logo_callback()
    {
        printf(
			'<input type="text" id="logo" name="blog_newsletter_option_name[logo]" class="regular-text ltr" value="%s" />',
			esc_attr( $this->options['logo'])
        );
    }

    public function extracontents_callback()
    {
        printf(
            '<textarea id="extracontents" name="blog_newsletter_option_name[extracontents]" class="large-text code">%s</textarea>',
            esc_attr( $this->options['extracontents'])
        );
    }
}

if( is_admin() ) // https://developer.wordpress.org/reference/functions/is_admin/
    $my_settings_page = new BlogNewsletterSettingsPage();
