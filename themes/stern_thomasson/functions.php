<?php
/**
 * Stern Thomasson LLP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stern_Thomasson_LLP
 */

if ( ! function_exists( 'stern_thomasson_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stern_thomasson_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Stern Thomasson LLP, use a find and replace
	 * to change 'stern_thomasson' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stern_thomasson', get_template_directory() . '/languages' );

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
    add_image_size('home-carousel', 1500, 750, TRUE );
    add_image_size( 'featured-image', 1500, 400, array( 'center', 'top' ) );
    add_image_size( 'community-involvement', 1500, 500, array( 'center', 'top' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'stern_thomasson' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stern_thomasson_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'stern_thomasson_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stern_thomasson_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stern_thomasson_content_width', 640 );
}
add_action( 'after_setup_theme', 'stern_thomasson_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stern_thomasson_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stern_thomasson' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stern_thomasson' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'stern_thomasson_widgets_init' );

/**
 * Register Scripts
 */
function stern_thomasson_register_scripts()  {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        // Load the copy of jQuery that comes with WordPress
        // The last parameter set to TRUE states that it should be loaded in the footer.
        wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, NULL, TRUE);
    }
}
add_action('init', 'stern_thomasson_register_scripts');

/**
 * Enqueue scripts and styles.
 */
function stern_thomasson_scripts() {
	wp_enqueue_style( 'stern_thomasson-style', get_stylesheet_uri() );

	wp_enqueue_script( 'stern_thomasson-navigation', get_template_directory_uri() . '/js/min/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'stern_thomasson-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if(is_front_page()) {
        if(function_exists('get_field')) {
            $imgs = get_field('carousel_images');
            if($imgs) {
                wp_enqueue_script( 'stern_thomasson-home-carousel', get_template_directory_uri() . '/js/min/home-carousel-min.js', array('jquery'), NULL, true );
            }
        }
    }

    if( is_page_template( 'page-contact.php' ) ) {
        wp_enqueue_script( 'stern_thomasson-directions-map', get_template_directory_uri() . '/js/min/map-directions-min.js', array('jquery'), NULL, true );
    }
}
add_action( 'wp_enqueue_scripts', 'stern_thomasson_scripts' );

/**
 * Global Website Information ( ACF Options )
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Website Information',
        'menu_slug'     => 'global-info',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Contact Information',
        'menu_title'    => 'Contact Info',
        'menu_slug'     => 'contact-info',
        'parent_slug'   => 'global-info',
    ));
}

/**
 * ADD STYLES TO WYSIWYG
 */
function my_mce_buttons_2( $buttons ) {
        array_shift( $buttons );
        array_unshift( $buttons, 'fontsizeselect');
        return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

/**
 * Implement the custom disclaimer section.
 */
function stern_thomasson_disclaimer() {
    $disclaimer = get_field( 'disclaimer_text' );
    if( ($disclaimer) ): ?>

        <div class="disclaimer-wrapper">
            <p><?php echo $disclaimer ?></p>
        </div>

    <?php endif;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load footer colophon.
 */
require get_template_directory() . '/inc/footer-colophon.php';

/**
 * Load sidebar.
 */
require get_template_directory() . '/inc/sidebar-content.php';

/**
 * Load the Home Page image carousel.
 */
require get_template_directory() . '/inc/home-carousel.php';

/**
 * Load the Firm Page community involvement section.
 */
require get_template_directory() . '/inc/community-involvement.php';

/**
 * Load the FAQ Page question & answers section.
 */
require get_template_directory() . '/inc/faq-questions.php';

/**
 * Include MM4 Contact Form Plugin
 */
include_once( get_template_directory() . '/plugins/mm4-you-contact-form/mm4-you-cf.php' );

/**
 * Include Directions Map on Contact Page
 */
require( get_template_directory() . '/inc/contact-sidebar.php' );