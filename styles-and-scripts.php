<?php
/** 
 * Styles and scripts
 */

// removing wpbdp default minimum styles - so that I can make them myself

add_action( 'wp_print_styles', 'vcs_deregister_styles', 100 );

function vcs_deregister_styles() {
  wp_deregister_style( 'wpbdp-base-css' );

};

// jQuere stuff  for max ammount of words in textarea for submit.

// Always use wp_enqueue_scripts action hook to both enqueue and register scripts
add_action( 'wp_enqueue_scripts', 'vcsp_register_scripts');

function vcsp_register_scripts() {
  
  wp_register_script( 'jq-1.10.1', '//code.jquery.com/jquery-1.10.1.min.js' );
  wp_register_script( 'jq-m-1.2.1', '//code.jquery.com/jquery-migrate-1.2.1.min.js"', array('jq-1.10.1') );
  wp_register_script( 'jquery-simply-countable',  plugin_dir_url( __FILE__ ) . 'public/js/jquery.simplyCountable.js', /* array('jquery-core', 'jquery-migrate')*/ array('jq-m-1.2.1') );
  wp_register_script( 'wordcount',  plugin_dir_url( __FILE__ ) . 'public/js/wordcount.js', array('jquery-simply-countable'));
}
function vcsp_enqueue_scripts_directory() {
  if (is_page('directory')){
    wp_enqueue_script( 'wordcount');
  };
}
add_action('wp_enqueue_scripts', 'vcsp_enqueue_scripts_directory');


