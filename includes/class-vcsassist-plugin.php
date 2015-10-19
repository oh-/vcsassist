<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */

function vcs_submitbutton() {
  // link button to the Partner directory submit button, which changes to 
  // display (hopefully) the submit link, or the register link
  $link = wpbdp_get_page_link('add-listing');
  echo sprintf('<a href="%1$s" class="vcs-submit-link">%2$s</a>', $link, __('Submit a listing', '_s'));
}


function vcs_make_button($name, $link) {
  // Function to reuse to make a button
        $option = sprintf('<input id="wpbdp-bar-view-listings-button" type="button" value="%1$s" onclick="window.location.href = \'%2$s\'" class="button directory category" />',
          $name, $link );
        return $option;
};
function vcs_tag_button($parent=0, $hierarchical=true) {
    $terms = get_categories(array(
        'taxonomy' => WPBDP_TAGS_TAX,
        'orderby' => 'name',
        'hide_empty' => 0,
        'hierarchical' => 0
    ));
    foreach ($terms as $tag) {
      // print_r($tag);
      $name = $tag->name;
      $link = rtrim( wpbdp_get_page_link( 'main' ), '/' ) . '/' . wpbdp_get_option( 'permalinks-tags-slug' ) . '/' . $tag->slug . '/';
      echo vcs_make_button($name, $link);
    };
};
function vcs_categories_button($parent=0, $hierarchical=true) {
    $terms = get_categories(array(
        'taxonomy' => WPBDP_CATEGORY_TAX,
        'orderby' => 'name',
        'hide_empty' => 0,
        'hierarchical' => 0
    ));
    foreach ($terms as $category) {
      // print_r($category);
      $name = $category->name;
      $link = rtrim( wpbdp_get_page_link( 'main' ), '/' ) . '/' . wpbdp_get_option( 'permalinks-category-slug' ) . '/' . $category->slug . '/';
      if (! $category->category_parent == 0) {
        // only show second level categories
        echo vcs_make_button($name, $link);
      };
    };
}; 

//partner directorry layout functions
function vcspd_header() {
  return "<div class='listings'>";
};
function vcspd_footer() {
  return "</div>";
};
function vcspd_search_form() {
			$html = '';
			$html .= sprintf('<form id="wpbdmsearchform" action="" method="GET" class="wpbdp-search-form">
												<input type="hidden" name="action" value="search" />
												<input type="hidden" name="page_id" value="%d" />
												<input type="hidden" name="dosrch" value="1" />',
												wpbdp_get_page_id('main'));
			$html .= '<input id="intextbox" maxlength="150" name="q" size="20" type="text" value="" />';
			$html .= sprintf('<input id="wpbdmsearchsubmit" class="submit" type="submit" value="%s" />',
											 _x('Go', 'templates', 'WPBDM'));
			$html .= sprintf('<a href="%s" class="advanced-search-link">%s</a>',
											 esc_url( add_query_arg('action', 'search', wpbdp_get_page_link('main')) ),
											 _x('Advanced Search', 'templates', 'WPBDM'));
			$html .= '</form>';

			return $html;
}


function vcspd_the_search_form() {
    if (wpbdp_get_option('show-search-listings'))
        echo vcspd_search_form();
}

//Removes Admin bar from Partners
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (current_user_can('partner') ) {
		show_admin_bar(false);
	}
}


// function for register or claim this listing registration pop over. Not currently implemented.
function vcs_lightbox() {

  echo '<a href = "javascript:void(0)" onclick = "document.getElementById(\'light\').style.display=\'none\';document.getElementById(\'fade\').style.display=\'none\'">';
  echo '<div id="fade_wrapper">';
  echo '<div id="fade" class="black_overlay"> [x]</div>';
  echo '</div>';
  echo '</a>';
};

class VCSPEnqueue {
  function __construct($handle){
    $this->handle = $handle;
  }
  function enqueue(){
    echo 'hello '.$this->handle ;
  }
  
  function do_tother(){
    // add_action( 'wp_enqueue_scripts', '' );
    wp_enqueue_script($handle);
    add_action('wp_enqueue_scripts', 'vcsp_enqueue', 10, 1 );
  }
};


// class Plugin_Name {
//
// 	/**
// 	 * The loader that's responsible for maintaining and registering all hooks that power
// 	 * the plugin.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   protected
// 	 * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
// 	 */
// 	protected $loader;
//
// 	/**
// 	 * The unique identifier of this plugin.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   protected
// 	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
// 	 */
// 	protected $plugin_name;
//
// 	/**
// 	 * The current version of the plugin.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   protected
// 	 * @var      string    $version    The current version of the plugin.
// 	 */
// 	protected $version;
//
// 	/**
// 	 * Define the core functionality of the plugin.
// 	 *
// 	 * Set the plugin name and the plugin version that can be used throughout the plugin.
// 	 * Load the dependencies, define the locale, and set the hooks for the admin area and
// 	 * the public-facing side of the site.
// 	 *
// 	 * @since    1.0.0
// 	 */
// 	public function __construct() {
//
// 		$this->plugin_name = 'vcsassist-plugin';
// 		$this->version = '1.0.0';
//
// 		$this->load_dependencies();
// 		$this->set_locale();
// 		$this->define_admin_hooks();
// 		$this->define_public_hooks();
//
// 	}
//
// 	/**
// 	 * Load the required dependencies for this plugin.
// 	 *
// 	 * Include the following files that make up the plugin:
// 	 *
// 	 * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
// 	 * - Plugin_Name_i18n. Defines internationalization functionality.
// 	 * - Plugin_Name_Admin. Defines all hooks for the admin area.
// 	 * - Plugin_Name_Public. Defines all hooks for the public side of the site.
// 	 *
// 	 * Create an instance of the loader which will be used to register the hooks
// 	 * with WordPress.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   private
// 	 */
// 	private function load_dependencies() {
//
// 		/**
// 		 * The class responsible for orchestrating the actions and filters of the
// 		 * core plugin.
// 		 */
// 		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-vcsassist-plugin-loader.php';
//
// 		/**
// 		 * The class responsible for defining internationalization functionality
// 		 * of the plugin.
// 		 */
// 		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-vcsassist-plugin-i18n.php';
//
// 		/**
// 		 * The class responsible for defining all actions that occur in the admin area.
// 		 */
// 		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-vcsassist-plugin-admin.php';
//
// 		/**
// 		 * The class responsible for defining all actions that occur in the public-facing
// 		 * side of the site.
// 		 */
// 		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-vcsassist-plugin-public.php';
//
// 		$this->loader = new Plugin_Name_Loader();
//
// 	}
//
// 	/**
// 	 * Define the locale for this plugin for internationalization.
// 	 *
// 	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
// 	 * with WordPress.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   private
// 	 */
// 	private function set_locale() {
//
// 		$plugin_i18n = new Plugin_Name_i18n();
// 		$plugin_i18n->set_domain( $this->get_plugin_name() );
//
// 		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
//
// 	}
//
// 	/**
// 	 * Register all of the hooks related to the admin area functionality
// 	 * of the plugin.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   private
// 	 */
// 	private function define_admin_hooks() {
//
// 		$plugin_admin = new Plugin_Name_Admin( $this->get_plugin_name(), $this->get_version() );
//
// 		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
// 		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
//
// 	}
//
// 	/**
// 	 * Register all of the hooks related to the public-facing functionality
// 	 * of the plugin.
// 	 *
// 	 * @since    1.0.0
// 	 * @access   private
// 	 */
// 	private function define_public_hooks() {
//
// 		$plugin_public = new Plugin_Name_Public( $this->get_plugin_name(), $this->get_version() );
//
// 		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
// 		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
//
// 	}
//
// 	/**
// 	 * Run the loader to execute all of the hooks with WordPress.
// 	 *
// 	 * @since    1.0.0
// 	 */
// 	public function run() {
// 		$this->loader->run();
// 	}
//
// 	/**
// 	 * The name of the plugin used to uniquely identify it within the context of
// 	 * WordPress and to define internationalization functionality.
// 	 *
// 	 * @since     1.0.0
// 	 * @return    string    The name of the plugin.
// 	 */
// 	public function get_plugin_name() {
// 		return $this->plugin_name;
// 	}
//
// 	/**
// 	 * The reference to the class that orchestrates the hooks with the plugin.
// 	 *
// 	 * @since     1.0.0
// 	 * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
// 	 */
// 	public function get_loader() {
// 		return $this->loader;
// 	}
//
// 	/**
// 	 * Retrieve the version number of the plugin.
// 	 *
// 	 * @since     1.0.0
// 	 * @return    string    The version number of the plugin.
// 	 */
// 	public function get_version() {
// 		return $this->version;
// 	}
//
// }
