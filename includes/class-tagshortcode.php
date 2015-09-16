<?php

/**
 * contents of original vcsassist-plugin.php.
 */



/**
 * Creation of the TagCloudShortcode
 * This class should host all the functionality that the plugin requires.
 */
/*
 * first get the options necessary to properly display the plugin
 */



if ( !class_exists( "TagCloudShortcode" ) ) {
    
    class TagCloudShortcode {

        /**
         * Shortcode Function
         */
         function shortcode($atts)
         {

      		$out = "";
			$out .='<style type="text/css">div#tagcloud { margin-bottom: 50px; width: 90%; margin-left: auto; margin-right: auto; text-align: center; }</style>';

			$out .= '<div id="tagcloud">';
			
			// do something intelligent to pull attributes to set up the parameters properly, with defaults. (not working yet. deal with it.)
			$listparams = 'number=100&echo=0';
			
			$out .= wp_tag_cloud($listparams);
			
			$out .='</div>';
            
            return $out;
         }
    } // End Class TagCloudShortcode
} 


/**
 * Initialize the admin panel function 
 */

if (class_exists("TagCloudShortcode")) {

    $TagCloudShortcodeInstance = new TagCloudShortcode();
}


/**
  * Set Actions, Shortcodes and Filters
  */
// Shortcode events
if (isset($TagCloudShortcodeInstance)) {
    add_shortcode('tagcloud',array(&$TagCloudShortcodeInstance, 'shortcode'));
}

