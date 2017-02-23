<?php
// Enquee Wordpress Media Uploader JS
wp_enqueue_script('jquery');
function load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

define( 'PLUGIN_ROOT_DIR', plugin_dir_path( __FILE__ ) );
require_once( PLUGIN_ROOT_DIR . 'helper/add_information_post_m.php');

?>
