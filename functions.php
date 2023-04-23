<?php
/**
 * GoCourier functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 */

//Define variable
define('GOCOURIERTHEMENAME', 'GoCourier' );
define('GOCOURIERTHEMEVERSION', '2.5.4' );
define('GOCOURIERTHEMEURI', trailingslashit( get_template_directory_uri() ) );
define('GOCOURIERTHEMEDIR', trailingslashit( get_template_directory() ) );

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( ! function_exists( 'gocourier_setup' ) ) :
/**
 * GoCourier setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function gocourier_setup() {

	/*
	 * Make gocourier available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on gocourier, use a find and
	 * replace to change THEMESNAME to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'gocourier', GOCOURIERTHEMEDIR . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 900, 600, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header-menu'   => esc_html__( 'Header Menu', 'gocourier' ),
		'top-menu'   => esc_html__( 'Top Menu', 'gocourier' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'quote', 'link', 'gallery' ) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	add_theme_support( 'title-tag' );
	
	// This theme support woocommerce
	add_theme_support( 'woocommerce' );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	
	add_editor_style( array(gocourier_fonts_url(), 'style-editor.css') );

}
endif; // gocourier_setup
add_action( 'after_setup_theme', 'gocourier_setup' );

/**
 * Theme Options
 */
require GOCOURIERTHEMEDIR . 'admin/theme-options.php';

/**
 * Function for the back end.
 *
 */
require GOCOURIERTHEMEDIR . 'admin/functions.php';

require GOCOURIERTHEMEDIR . 'admin/widgets.php';

/**
 * Enqueue scripts and styles for the front end.
 *
 */
require GOCOURIERTHEMEDIR . 'include/scripts-css.php';
 
 /*
 * tgm plugins
 *
 */
 require GOCOURIERTHEMEDIR . 'library/tgm-plugins.php';


/**
 * Function for the front end.
 *
 */
require GOCOURIERTHEMEDIR . 'include/mr-image-resize.php';
require GOCOURIERTHEMEDIR . 'include/functions.php';
require GOCOURIERTHEMEDIR . 'include/elementor-widgets.php';