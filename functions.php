<?php
/**
 * Bronte functions and definitions
 *
 * @package Bronte
 */

/*
* Loading theme options
*/

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/theme-options/' );
require_once dirname( __FILE__ ) . '/inc/theme-options/options-framework.php';

//	Visual Editor Styles
$eri_editor_stylesheet = 'visual-editor.css';
add_editor_style($eri_editor_stylesheet);


if ( ! function_exists( 'eri_bronte_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eri_bronte_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bronte, use a find and replace
	 * to change 'eri_bronte' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'eri_bronte', get_template_directory() . '/languages' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // eri_bronte_setup
add_action( 'after_setup_theme', 'eri_bronte_setup' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/navigation.php';


/**
 * Loading widget areas
 */
require get_template_directory() . '/inc/widget-areas.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/cpt/books.php';


/**
* Enqueue scripts and styles.
*/
function eri_bronte_scripts() {

wp_enqueue_style( 'eri_bronte_style', get_stylesheet_uri() );

wp_enqueue_script( 'eri_bronte_jquery', get_template_directory_uri() . '/js/jquery-1.11.0.min.js' );
wp_enqueue_script( 'eri_bronte_superfish', get_template_directory_uri() . '/js/plugins/superfish.min.js' );
wp_enqueue_script( 'eri_bronte_hoverIntent', get_template_directory_uri() . '/js/plugins/hoverIntent.js' );
wp_enqueue_script( 'eri_bronte_tinyNav', get_template_directory_uri() . '/js/plugins/tinyNav.js' );
wp_enqueue_script( 'eri_bronte_backstretch', get_template_directory_uri() . '/js/plugins/backstretch.js' );
wp_enqueue_script( 'eri_bronte_custom', get_template_directory_uri() . '/js/custom.js' );

// Fontello
wp_enqueue_script( 'eri_bronte_fontello', get_template_directory_uri() . '/fontello/config.json' );
wp_enqueue_style( 'eri_bronte_fontello_codes', get_template_directory_uri() . '/fontello/css/fontello-codes.css');
wp_enqueue_style( 'eri_bronte_fontello_embedded', get_template_directory_uri() . '/fontello/css/fontello-embedded.css');
wp_enqueue_style( 'eri_bronte_fontello_ie7_codes', get_template_directory_uri() . '/fontello/css/fontello-ie7-codes.css');
wp_enqueue_style( 'eri_bronte_fontello_ie7', get_template_directory_uri() . '/fontello/css/fontello-ie7.css');
wp_enqueue_style( 'eri_bronte_fontello', get_template_directory_uri() . '/fontello/css/fontello.css');


if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eri_bronte_scripts' );

/**
 * Loading Assets ( only if you need to hide staff from the header.php )
 */
//require get_template_directory() . '/inc/header-assets.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/theme-style.php';

/**
 * Add some metaboxes
 */
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/inc/metaboxes' ) );

// Include the meta box script
require get_template_directory() . '/inc/metaboxes/meta-box.php';
require get_template_directory() . '/inc/metaboxes/my-meta.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';