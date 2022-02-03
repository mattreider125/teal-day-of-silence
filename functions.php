<?php
/**
 * OCDOS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OCDOS
 */

if ( ! function_exists( 'ocdos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ocdos_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on OCDOS, use a find and replace
	 * to change 'ocdos' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ocdos', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'ocdos' ),
		'menu-top' => esc_html__( 'Top', 'ocdos' ),
	) );


	/**
 * Footer Menu.
 */
function footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer' ));
}
add_action( 'init', 'footer_menu' );

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
	add_theme_support( 'custom-background', apply_filters( 'ocdos_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'ocdos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ocdos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ocdos_content_width', 640 );
}
add_action( 'after_setup_theme', 'ocdos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ocdos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ocdos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ocdos' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Sidebar', 'ocdos' ),
		'id'            => 'sidebar-homepage',
		'description'   => esc_html__( 'Add widgets here.', 'ocdos' ),
		'before_widget' => '<section id="%1$s"><div class="home-widget">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="home-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ocdos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ocdos_scripts() {
	wp_enqueue_style( 'ocdos-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ocdos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ocdos-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ocdos_scripts' );




/**
 * Remove admin bar for non-administrators.
 */
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}



// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/**
 * Add custom post type for stories.
 */

function ocdos_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

function ocdos_columns_head($defaults) {
    $defaults['featured_image'] = 'Story Photo';
    $defaults['stories_city'] = 'City';
    return $defaults;
    

}

// SHOW THE FEATURED IMAGE
function ocdos_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ocdos_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" width="75" height="75"/>';
        }
    }
}

add_filter('manage_posts_columns', 'ocdos_columns_head');
add_action('manage_posts_custom_column', 'ocdos_columns_content', 10, 2);


function cpt_stories() {
	$labels = array(
		'name'                => _x( 'Stories', 'Post Type General Name', 'ocdos' ),
		'singular_name'       => _x( 'Story', 'Post Type Singular Name', 'ocdos' ),
		'add_new'             => __( 'Add New', 'custom-post', 'ocdos' ),
		'add_new_item'        => __( 'Add New Story', 'ocdos' ),
		'edit_item'           => __( 'Edit Story', 'ocdos' ),
		'new_item'           => __( 'New Story', 'ocdos' ),
		'all_items'           => __( 'All Stories', 'ocdos' ),
		'view_item'           => __( 'View Story', 'ocdos' ),
		'search_items'        => __( 'Search Story', 'ocdos' ),
		'not_found'           => __( 'Not Found', 'ocdos' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ocdos' ),
		'parent_item_colon'   => __( 'Parent Story', 'ocdos' ),
		'menu_name'           => __( 'Stories', 'ocdos' ),
		'update_item'         => __( 'Update Story', 'ocdos' ),
	);
$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'description'         => __( 'Survivor stories', 'ocdos' ),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'taxonomies'          => array( 'category' ),
	);
	
	// Registering your Custom Post Type
register_post_type( 'stories', $args );

}
add_action( 'init', 'cpt_stories' );


add_filter( 'bp_login_redirect', 'ps_redirect_to_profile', 11, 3 );

function ps_redirect_to_profile( $redirect_to, $redirect_url, $user ){

if( empty( $redirect_to) )
$redirect_to = admin_url();

//if the user is not site admin,redirect to his/her profile

if( isset( $user->ID) && ! is_super_admin( $user->ID ) )
return bp_core_get_user_domain( $user->ID );
else
return $redirect_to;

}




function bpfr_hide_visibility_tab() {	
	if( bp_is_active( 'xprofile' ) )	
			
		bp_core_remove_subnav_item( 'settings', 'profile' ); 
	
}
add_action( 'bp_ready', 'bpfr_hide_visibility_tab' );



function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );


/**
* Redirect buddypress and bbpress pages to registration page
*/
function kleo_page_template_redirect()
{
    //if not logged in and on a bp page except registration or activation
    if( ! is_user_logged_in() &&
        ( ( ! bp_is_blog_page() && ! bp_is_activation_page() && ! bp_is_register_page() ) || is_bbpress() )
    )
    {
        wp_redirect( home_url( '/login/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'kleo_page_template_redirect' );


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