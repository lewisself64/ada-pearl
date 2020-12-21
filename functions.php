<?php
/**
 * Ada_Pearl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ada_Pearl
 */

if ( ! defined( 'ADA_PEARL_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ADA_PEARL_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ada_pearl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ada_pearl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ada_Pearl, use a find and replace
		 * to change 'ada-pearl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ada-pearl', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'ada-pearl' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ada_pearl_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for gutenberg alignment.
		add_theme_support( 'align-wide' );

		// Add theme support for editor styling
		add_theme_support( 'editor-styles' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Remove theme support for default block patterns
		remove_theme_support( 'core-block-patterns' );
	}
endif;
add_action( 'after_setup_theme', 'ada_pearl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ada_pearl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ada_pearl_content_width', 640 );
}
add_action( 'after_setup_theme', 'ada_pearl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ada_pearl_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ada-pearl' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ada-pearl' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'ada-pearl' ),
			'id'            => 'footer-widgets-1',
			'description'   => esc_html__( 'Add widgets here.', 'ada-pearl' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ada_pearl_widgets_init' );

function ada_pearl_admin_scripts() {
	add_editor_style( 'style-editor.css' );
}
add_action( 'admin_init', 'ada_pearl_admin_scripts' );


/**
 * Enqueue scripts and styles.
 */
function ada_pearl_scripts() {
	wp_enqueue_style( 'ada-pearl-style', get_stylesheet_uri(), array(), ADA_PEARL_VERSION );
	wp_style_add_data( 'ada-pearl-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ada-pearl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ADA_PEARL_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ada_pearl_scripts' );

/**
 * Create theme block patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
