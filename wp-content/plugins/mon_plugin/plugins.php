<?php
/*
  Plugin Name: Plugin
  Plugin URI: citizenz.info
  Description: Exemple de plugin WordPress
  Version: 0.1
  Author: citizenz7
  Author URI: http://www.citizenz.info
  License: GPL2
*/

if (!class_exists('TutorielPlugin')) {

    class TutorielPlugin {

      public function simple_action(){
        add_menu_page('Plugin Tutoriel', 'Plugin Tutoriel', 'manage_options', 'plugin-tutoriel', array($this, 'plugin_tutoriel'), 'dashicons-admin-comments', 4);
      }

      public function __construct() {
          add_action('admin_menu', array($this,'simple_action'));
      }

      public function plugin_tutoriel() {
        if (!current_user_can('manage_options')) {
          wp_die(__('Vous n\'avez pas les droits pour accéder à cette page.'));
        }
        include(sprintf("%s/plugin_tutoriel.php", dirname(__FILE__)));
      }

    }

}
$tutoriel_plugin = new TutorielPlugin();
