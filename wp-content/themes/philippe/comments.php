<div class="container">
  <div class="row">
    <div class="col">

<a id="comments"></a>
<h2>Commentaires</h2>
<?php if($comments) : ?>
    <ol class="comments">
    <?php foreach($comments as $comment) : ?>
        <li id="comment-<?php comment_ID(); ?>" class="<?php if ($comment->user_id == 1) echo "authcomment";?>">
            <?php if ($comment->comment_approved == '0') : ?>
                <p>Your comment is awaiting approval</p>
            <?php endif; ?>
            <?php echo get_avatar(get_comment_author_email(), 48, $default_avatar); ?>
            <cite><h3><?php comment_author_link(); ?></h3> on <small><?php comment_date(); ?></small></cite><br />
            <?php comment_text(); ?>
        </li>
    <?php endforeach; ?>
    </ol>
<?php endif; ?>


<?php if(comments_open()) : ?>
	<h2>Ajouter un commentaire</h2>
    <?php if(get_option('comment_registration') && !$user_ID) : ?>
        <p>Vous devez être <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">connecté</a> pour poster un commentaire.</p><?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if($user_ID) : ?>
                <p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
                <?php else : ?>
                <div class="form-group">
                  <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
                    <label for="author">Nom <?php if($req) echo "(requis)"; ?></label></p>
                </div>
                <div class="form-group">
                  <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                    <label for="email">Email (ne sera pas montrée <?php if($req) echo", requis"; ?>)</label></p>
                </div>
                <div class="form-group">
                  <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                    <label for="url">Site web</label></p>
                </div>
            <?php endif; ?>
            <div class="form-group">
              <textarea name="comment" id="comment" rows="10" cols="120" tabindex="4"></textarea>
              <p><label for="comment">Votre texte</label></p>
            </div>
            <?php //show_subscription_checkbox(); ?>
            <p><button class="btn btn-primary" name="submit" type="submit" id="submit" tabindex="5">Envoyer le commentaire</button>
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
            <?php do_action('comment_form', $post->ID); ?>
            </form>
    <?php endif; ?>
<?php else : ?>
    <p>Les commentaires sont fermés.</p>
<?php endif; ?>
</div>
</div>
</div>
