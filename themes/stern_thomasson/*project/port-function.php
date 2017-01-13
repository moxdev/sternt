<?php
/**
 * portabello functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portabello
 */

if ( ! function_exists( 'mm4_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mm4_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on portabello, use a find and replace
     * to change 'mm4' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'mm4', get_template_directory() . '/languages' );

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
    add_image_size('featured-image-home-page', 1500, 1000, array( 'center', 'bottom' ) );
    add_image_size('featured-image', 1800, 500, true );
    add_image_size('floor-plan-thumb', 400, 9999, false);
    // add_image_size('floor-plan-lightbox', 1500, 1000, false);

/*<?php the_post_thumbnail(); ?>*/

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'mm4', 'Menu' ),
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
    add_theme_support( 'custom-background', apply_filters( 'mm4_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'mm4_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mm4_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'mm4_content_width', 640 );
}
add_action( 'after_setup_theme', 'mm4_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mm4_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mm4' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'mm4' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mm4_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mm4_scripts() {
    wp_enqueue_style( 'mm4-style', get_stylesheet_uri() );

    wp_deregister_script('jquery');
    //         // Load the copy of jQuery that comes with WordPress
    //         // The last parameter set to TRUE states that it should be loaded in the footer.
    wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, FALSE, TRUE);

    wp_enqueue_script( 'mm4-navigation', get_template_directory_uri() . '/js/min/navigation-min.js', array(), '20151215', true );

    wp_enqueue_script( 'mm4-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix-min.js', array(), '20151215', true );

    if ( is_page_template( 'page-contact-page.php' ) ) {

        wp_enqueue_script( 'mm4-contact-directions-map', get_template_directory_uri() . '/js/min/map-directions-min.js', array(), '20151215', true );
    }

    if ( is_page_template( 'page-floorplan-listing-page.php' ) ) {

        wp_enqueue_script( 'mm4-imagelightbox', get_template_directory_uri() . '/js/min/imagelightbox-min.js', array('jquery'), false, true );

        wp_enqueue_script( 'mm4-lightbox', get_template_directory_uri() . '/js/min/lightbox-min.js', array('mm4-imagelightbox'), false, true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mm4_scripts' );

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
 * Custom Post Type configuration for Landmarks
 */

function mm4_create_custom_posts() {
    $labels = array(
        'name'                  => _x( 'Area Landmarks', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Area Landmark', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Area Landmarks', 'text_domain' ),
        'name_admin_bar'        => __( 'Area Landmarks', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Landmarks', 'text_domain' ),
        'add_new_item'          => __( 'Add New Landmark', 'text_domain' ),
        'add_new'               => __( 'Add New Landmark', 'text_domain' ),
        'new_item'              => __( 'New Landmark', 'text_domain' ),
        'edit_item'             => __( 'Edit Landmark', 'text_domain' ),
        'update_item'           => __( 'Update Landmark', 'text_domain' ),
        'view_item'             => __( 'View Landmark', 'text_domain' ),
        'search_items'          => __( 'Search Landmarks', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Area Landmark', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'revisions', ),
        'taxonomies'            => array( 'landmark_types' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-location',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'area_landmarks', $args );

}
add_action( 'init', 'mm4_create_custom_posts', 0 );

function mm4_create_custom_taxonomies() {
    $labels = array(
        'name'                       => _x( 'Landmark Types', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Landmark Type', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Landmark Types', 'text_domain' ),
        'all_items'                  => __( 'All Landmark Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Landmark Type', 'text_domain' ),
        'add_new_item'               => __( 'Add New Landmark Type', 'text_domain' ),
        'edit_item'                  => __( 'Edit Landmark Type', 'text_domain' ),
        'update_item'                => __( 'Update Landmark Type', 'text_domain' ),
        'view_item'                  => __( 'View Landmark Type', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'landmark_types', array( 'area_landmarks' ), $args );

}
add_action( 'init', 'mm4_create_custom_taxonomies', 0 );

// Remove option for no type from radio button for taxonomies plugin
add_filter('radio-buttons-for-taxonomies-no-term-landmark_types', '__return_FALSE' );

/**
* Include Plugins
*/
include_once( get_stylesheet_directory() . '/plugins/mm4-you-contact-form/mm4-you-cf.php' );

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
 * Load footer colophon content.
 */
require get_template_directory() . '/inc/footer-colophon.php';

/**
 * Load floor plan content.
 */
require get_template_directory() . '/inc/floorplan-listing.php';

/**
 * Load amenities content.
 */
require get_template_directory() . '/inc/amenities.php';

/**
 * Load contact page content.
 */
require get_template_directory() . '/inc/contact-page-content.php';

/**
 * Load community page map.
 */
require get_template_directory() . '/inc/community-page-map.php';

/**
 * Load community page amenities list.
 */
require get_template_directory() . '/inc/community-page-list.php';

/**
 * Load frontpage display with circle links.
 */
require get_template_directory() . '/inc/front-page-highlights.php';

/**
 * Load floor plan parent page display with circle links.
 */
require get_template_directory() . '/inc/floor-plan-highlights.php';

/**
 * Load floor plan listing page display with circle links.
 */
require get_template_directory() . '/inc/floor-plan-listing-highlights.php';

/**
 * Load resident page pay online links and service request form.
 */
require get_template_directory() . '/inc/resident-page-content.php';