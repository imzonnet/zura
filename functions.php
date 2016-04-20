<?php
/**
 * ZuraVN.Com functions and definitions
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
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */

if ( ! function_exists( 'zura_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own zura_setup() function to override in a child theme.
 *
 * @since ZuraVN.Com 1.0
 */
function zura_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ZuraVN.Com, use a find and replace
	 * to change 'zura' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zura', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zura' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', zura_fonts_url() ) );
}
endif; // zura_setup
add_action( 'after_setup_theme', 'zura_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since ZuraVN.Com 1.0
 */
function zura_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zura_content_width', 840 );
}
add_action( 'after_setup_theme', 'zura_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since ZuraVN.Com 1.0
 */
function zura_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'zura' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Top Left', 'zura' ),
		'id'            => 'header-top-1',
		'description'   => __( 'Add widgets here to appear in the header.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Top Right', 'zura' ),
		'id'            => 'header-top-2',
		'description'   => __( 'Add widgets here to appear in the header.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Top 1', 'zura' ),
		'id'            => 'footer-top-1',
		'description'   => __( 'Appears at the top of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Top 2', 'zura' ),
		'id'            => 'footer-top-2',
		'description'   => __( 'Appears at the top of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Top 3', 'zura' ),
		'id'            => 'footer-top-3',
		'description'   => __( 'Appears at the top of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Top 4', 'zura' ),
		'id'            => 'footer-top-4',
		'description'   => __( 'Appears at the top of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Bottom 1', 'zura' ),
		'id'            => 'footer-bottom-1',
		'description'   => __( 'Appears at the bottom of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Bottom 2', 'zura' ),
		'id'            => 'footer-bottom-2',
		'description'   => __( 'Appears at the bottom of the footer pages.', 'zura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'zura_widgets_init' );

if ( ! function_exists( 'zura_fonts_url' ) ) :
/**
 * Register Google fonts for ZuraVN.Com.
 *
 * Create your own zura_fonts_url() function to override in a child theme.
 *
 * @since ZuraVN.Com 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function zura_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'zura' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueues scripts and styles.
 *
 * @since ZuraVN.Com 1.0
 */
function zura_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'zura-fonts', zura_fonts_url(), array(), null );

	// Add Boostrap Libs
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '20160323' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '20160323', true );
	//Add FontAwesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '20160323' );

	// Theme stylesheet.
	wp_enqueue_style( 'zura-style', get_template_directory_uri() .'/assets/css/static.css', array(), '20160323' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'zura-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'zura-style' ), '20150930' );
	wp_style_add_data( 'zura-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'zura-ie8', get_template_directory_uri() . '/assets/css/ie8.css', array( 'zura-style' ), '20151230' );
	wp_style_add_data( 'zura-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'zura-ie7', get_template_directory_uri() . '/assets/css/ie7.css', array( 'zura-style' ), '20150930' );
	wp_style_add_data( 'zura-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'zura-html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'zura-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'zura-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	}

	wp_enqueue_script( 'zura-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20151204', true );

}
add_action( 'wp_enqueue_scripts', 'zura_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since ZuraVN.Com 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function zura_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'zura_body_classes' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/init.php';

