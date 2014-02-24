<?php
/**
 * _s_tn functions and definitions
 *
 * @package _s_tn
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 's_tn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function s_tn_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s_tn, use a find and replace
	 * to change 's_tn' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 's_tn', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 's_tn' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 's_tn_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // s_tn_setup
add_action( 'after_setup_theme', 's_tn_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function s_tn_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 's_tn' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 's_tn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function s_tn_scripts() {

  //base stylesheet
	wp_enqueue_style( 's_tn-style', get_stylesheet_uri() );

  //Twenty Eleven dark
  wp_register_style( 's_tn-2011_dark', get_template_directory_uri() . '/dark.css' );

	wp_enqueue_style( 's_tn-2011_dark');

  //Custom
  wp_register_style( 's_tn-custom', get_template_directory_uri() . '/custom.css' );

	wp_enqueue_style( 's_tn-custom');

	wp_enqueue_script( 's_tn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 's_tn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 's_tn_scripts' );

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

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * custom header
 */
//Add header logo
function s_tn_add_logo(){
	$logo = "<a href=\"".esc_url( home_url( '/' ) )."\" title=\"TeeehN.com\" class=\"tn_logo\">";
	$logo .= "<img src=\"".get_stylesheet_directory_uri()."/images/tn-logo-160x104.png\" alt=\"TeeehN.com\" >";
	$logo .= "</a>\n";
	echo $logo;
	}
add_action('s_tn_header_logo','s_tn_add_logo');
//Add site-title image
function s_tn_add_site_title(){
	$logo = "<a href=\"".esc_url( home_url( '/' ) )."\" title=\"TeeehN.com\">";
	$logo .= "<img src=\"".get_stylesheet_directory_uri()."/images/web-developer.png\" alt=\"Web Developer\" >";
	$logo .= "</a>\n";
	echo $logo;
	}
add_action('s_tn_site_title','s_tn_add_site_title');
//credits
//s_tn_credits
add_action('tn_site_title','tn_add_site_title');
//Add copyright notice.
function s_tn_copyright(){
	echo "<p>Except where stated all content &copy; Copyright ". date("Y") . " Thomas Nicolosi. All rights reserved.</p>";
	}
add_action('s_tn_credits','s_tn_copyright');
