<?php
/**
 * pivotpilotcustom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pivotpilotcustom
 */

function pivotpilotcustom_register_post_types(){
  // Add theme post types
  $client_labels = array(
    'name'          =>  'Clients',
    'singular_name' =>  'Client',
    'add_new'       =>  _x('Add New Client', 'Client'),
    'add_new_item'  =>  'Add Client',
    'edit_item'     =>  'Edit Client',
    'new_item'      =>  'New Client',
    'view_item'     =>  'View Client',
    'search_items'  =>  'Search Portfolio',
    'not_found'     =>  'No Clients Found',
    'not_found_in_trash' => 'No Clients found in Trash',
    'all_items'     =>  'View All Clients',
    'archives'      =>  'Portfolio',
    'insert_into_item'  =>  'Insert Into Client\'s Portfolio',
    'uploaded_to_this_item' => 'Uploaded to this Client\'s Portfolio',
    'menu_name'     =>  'Portfolio',
    'name_admin_bar'=>  'Portfolio'
  );

  register_post_type('clients',
    array(
      'description' => 'Portfolio for all the website work',
      'has_archive' => true,
      'labels'      => $client_labels,
      'menu_position' => -1,
      'public'      => true,
      'publicly_queryable' =>true,
      'rewrite'     => array(
        'with_front'  => false,
        'slug'      => 'portfolio'
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true,
      'taxonomies'  => array('post_tag', 'category'),
    )
  );

  $service_labels = array(
    'name'          =>  'Services',
    'singular_name' =>  'Service',
    'add_new'       =>  _x('Add New Service', 'Service'),
    'add_new_item'  =>  'Add Service',
    'edit_item'     =>  'Edit Service',
    'new_item'      =>  'New Service',
    'view_item'     =>  'View Service',
    'search_items'  =>  'Search Services',
    'not_found'     =>  'No Services Found',
    'not_found_in_trash' => 'No Services found in Trash',
    'all_items'     =>  'View All Services',
    'archives'      =>  'Services',
    'insert_into_item'  =>  'Insert Into Service\'s Services',
    'uploaded_to_this_item' => 'Uploaded to this Service\'s Services',
    'menu_name'     =>  'Services',
    'name_admin_bar'=>  'Services'
  );

  register_post_type('services',
    array(
      'description' => 'Services that we offer.',
      'has_archive' => false,
      'labels'      => $service_labels,
      'menu_position' => 0,
      'public'      => true,
      'publicly_queryable' =>true,
      'rewrite'     => array(
        'slug'      => 'services',
        'with_front'  => false
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true,
      'taxonomies'  => array('post_tag', 'category')
    )
  );

  $member_labels = array(
    'name'          =>  'Team Members',
    'singular_name' =>  'Team Member',
    'add_new'       =>  _x('Add New Member', 'Member'),
    'add_new_item'  =>  'Add Team Member',
    'edit_item'     =>  'Edit Team Member',
    'new_item'      =>  'New Team Member',
    'view_item'     =>  'View Team Member',
    'search_items'  =>  'Search Bios',
    'not_found'     =>  'No Team Members Found',
    'not_found_in_trash' => 'No Team Members found in Trash',
    'all_items'     =>  'View All Members',
    'archives'      =>  'Team Members',
    'insert_into_item'  =>  'Insert Into Team Members\'s Biography',
    'uploaded_to_this_item' => 'Uploaded to this Team Member\'s Biography',
    'menu_name'     =>  'Team Bios',
    'name_admin_bar'=>  'Team Members'
  );

  register_post_type('members',
    array(
      'description' => 'Biography\'s for each team member',
      'has_archive' => false,
      'labels'      => $member_labels,
      'menu_position' => 1,
      'public'      => true,
      'publicly_queryable' =>true,
      'rewrite'     => array(
        'slug'      => 'members'
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true,
      'taxonomies'  => array('post_tag')
    )
  );

  $blog_tag_labels = array(
    'name'                       => _x( 'Blog Tags', 'taxonomy general name', 'textdomain' ),
    'singular_name'              => _x( 'Blog Tag', 'taxonomy singular name', 'textdomain' ),
    'search_items'               => __( 'Search Blog Tags', 'textdomain' ),
    'popular_items'              => __( 'Popular Blog Tags', 'textdomain' ),
    'all_items'                  => __( 'All Blog Tags', 'textdomain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Blog Tag', 'textdomain' ),
    'update_item'                => __( 'Update Blog Tag', 'textdomain' ),
    'add_new_item'               => __( 'Add New Blog Tag', 'textdomain' ),
    'new_item_name'              => __( 'New Blog Tag Name', 'textdomain' ),
    'separate_items_with_commas' => __( 'Separate Blog Tag with commas', 'textdomain' ),
    'add_or_remove_items'        => __( 'Add or remove Blog Tag', 'textdomain' ),
    'choose_from_most_used'      => __( 'Choose from the most used Blog Tag', 'textdomain' ),
    'not_found'                  => __( 'No Blog Tag found.', 'textdomain' ),
    'menu_name'                  => __( 'Blog Tags', 'textdomain' ),
  );

  $blog_tag_args = array(
    'hierarchical'          => false,
    'labels'                => $blog_tag_labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'blog-tags' ),
  );

  $category_labels = array(
    'name'                       => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
    'singular_name'              => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
    'search_items'               => __( 'Search Categories', 'textdomain' ),
    'popular_items'              => __( 'Popular Categories', 'textdomain' ),
    'all_items'                  => __( 'All Categories', 'textdomain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Category', 'textdomain' ),
    'update_item'                => __( 'Update Category', 'textdomain' ),
    'add_new_item'               => __( 'Add New Category', 'textdomain' ),
    'new_item_name'              => __( 'New Category Name', 'textdomain' ),
    'separate_items_with_commas' => __( 'Separate Category with commas', 'textdomain' ),
    'add_or_remove_items'        => __( 'Add or remove Category', 'textdomain' ),
    'choose_from_most_used'      => __( 'Choose from the most used Categories', 'textdomain' ),
    'not_found'                  => __( 'No Category found.', 'textdomain' ),
    'menu_name'                  => __( 'Categories', 'textdomain' ),
  );

  $category_args = array(
    'hierarchical'          => false,
    'labels'                => $category_labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
  );

  $tag_labels = array(
    'name'                       => _x( 'Tags', 'taxonomy general name', 'textdomain' ),
    'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'textdomain' ),
    'search_items'               => __( 'Search Tags', 'textdomain' ),
    'popular_items'              => __( 'Popular Tags', 'textdomain' ),
    'all_items'                  => __( 'All Tags', 'textdomain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Tag', 'textdomain' ),
    'update_item'                => __( 'Update Tag', 'textdomain' ),
    'add_new_item'               => __( 'Add New Tag', 'textdomain' ),
    'new_item_name'              => __( 'New Tag Name', 'textdomain' ),
    'separate_items_with_commas' => __( 'Separate Tag with commas', 'textdomain' ),
    'add_or_remove_items'        => __( 'Add or remove Tag', 'textdomain' ),
    'choose_from_most_used'      => __( 'Choose from the most used Tags', 'textdomain' ),
    'not_found'                  => __( 'No Tag found.', 'textdomain' ),
    'menu_name'                  => __( 'Tags', 'textdomain' ),
  );

  $tag_args = array(
    'hierarchical'          => false,
    'labels'                => $tag_labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
  );
  
  add_post_type_support( 'page' , 'excerpt' );
  register_taxonomy( 'blog_tag', 'post', $blog_tag_args );
  register_taxonomy( 'category', array('clients', 'services'), $category_args);
  register_taxonomy( 'post_tag', array('clients'), $tag_args );
}

add_action( 'init' , 'pivotpilotcustom_register_post_types');

if ( ! function_exists( 'pivotpilotcustom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pivotpilotcustom_setup() { 
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pivotpilotcustom, use a find and replace
	 * to change 'pivotpilotcustom' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pivotpilotcustom', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'pivotpilotcustom' ),
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
	add_theme_support( 'custom-background', apply_filters( 'pivotpilotcustom_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif;
add_action( 'after_setup_theme', 'pivotpilotcustom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pivotpilotcustom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pivotpilotcustom_content_width', 640 );
}
add_action( 'after_setup_theme', 'pivotpilotcustom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pivotpilotcustom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pivotpilotcustom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pivotpilotcustom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pivotpilotcustom_widgets_init' );

// ACF Google Maps API Key
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDvk8V5jh5obvt8tE-tDGBME2WM8Mm2shI');
}

add_action('acf/init', 'my_acf_init');

/**
 * Enqueue scripts and styles.
 */
function pivotpilotcustom_scripts() {
  wp_enqueue_style( 'pivotpilotcustom-style', get_stylesheet_uri() );
  
  // rellax
  wp_enqueue_script('rellax', get_template_directory_uri() . '/js/rellax.min.js', array(), true);

  wp_enqueue_style( 'pivotpilotcustom-style-menu', get_template_directory_uri() . '/css/menu.css', true );

  // 404 page
  wp_enqueue_style( 'pivotpilotcustom-404-page', get_template_directory_uri() . '/css/404.css', true );

  // services page
  wp_enqueue_style( 'pivotpilotcustom-services-page', get_template_directory_uri() . '/css/services-page.css', true );

  wp_enqueue_style('pivotpilotcustom-slick', get_template_directory_uri() . '/js/slick/slick.css', true );

  wp_enqueue_style('pivotpilotcustom-slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.css', true );

	wp_enqueue_script( 'pivotpilotcustom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pivotpilotcustom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  wp_enqueue_script('underscore', get_template_directory_uri() . '/js/underscore-min.js', array(), null, true);

	wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), null, true);

	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.js', array(), null, true);

  wp_enqueue_script('index', get_template_directory_uri() . '/js/index.js', array(), null, true);

  wp_enqueue_script('googlemaps', get_template_directory_uri() . '/js/googlemaps.js', array(), null, true);
  
  wp_enqueue_style( 'pivotpilotcustom-style-custom', get_template_directory_uri() . '/style-custom.css', false );
  if ( is_front_page() || is_page('services') ) {
    wp_enqueue_style( 'pivotpilot__front-page-css', get_template_directory_uri() . '/css/front-page.css', true );  
  }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() ) {
		wp_enqueue_script('front-page', get_template_directory_uri() . '/js/page/front-page.js', array(), null, true);
  }
  
  if ( is_page('services') ) {
		wp_enqueue_script('services-page', get_template_directory_uri() . '/js/page/services-page.js', array(), null, true);
	}

  if ( is_page('about') ){
    wp_enqueue_script('page-about', get_template_directory_uri() . '/js/page/page-about.js', array(), null, true); 
  }

  if ( is_home() ){
    wp_enqueue_script('page-blog', get_template_directory_uri() . '/js/page/page-blog.js', array(), null, true); 
  }

  if ( is_singular('services') ){
    wp_enqueue_script('single-services', get_template_directory_uri() . '/js/single/single-services.js', array(), null, true);
  }

  if ( is_singular('clients') ){
    wp_enqueue_script('single-clients', get_template_directory_uri() . '/js/single/single-clients.js', array(), null, true);
  }

  if ( is_singular('post') ){
    wp_enqueue_script('single-post', get_template_directory_uri() . '/js/single/single-post.js', array(), null, true);
  }

  if( is_archive() ) {
    wp_enqueue_script('page-about', get_template_directory_uri() . '/js/archive/archive.js', array(), null, true);
  }
}
add_action( 'wp_enqueue_scripts', 'pivotpilotcustom_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pivotpilotcustom_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pivotpilotcustom_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


require_once('api.php');