<?php

/* ------Menu------- */

function register_my_menus() {
    register_nav_menus(
            array(
                'header-menu' => __('Main Menu'),
                'footer-menu' => __('Footer Menu'),
            )
    );
}

add_image_size('featured-thumb', 260, 210, true);
add_image_size('popular-thumb', 92, 102, true);
add_image_size('daynews-thumb', 164, 164, true);
add_image_size('taxonomy-thumb', 360, 200, true);
add_image_size('post-thumb', 135, 150, true);
add_image_size('trip-month', 660, 400, true);

add_action('init', 'register_my_menus');
add_theme_support('post-thumbnails');

require_once(TEMPLATEPATH . '/include/custome_field_activities.php');
require_once(TEMPLATEPATH . '/admin_tab.php');

require_once(TEMPLATEPATH . '/include/custome_field_staff.php');
require_once(TEMPLATEPATH . '/include/testimonials.php');
require_once(TEMPLATEPATH . '/include/widget_create.php');
require_once(TEMPLATEPATH . '/include/pagination.php');

add_filter('images_cpt', 'my_image_cpt');

function my_image_cpt() {
    $cpts = array('page', 'ourtrekking');
    return $cpts;
}

add_action('init', 'my_custom_init');

function my_custom_init() {
    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'page-attributes');
}

/////////////////////////Start This code for admin post images display ///////////////////////
// GET FEATURED IMAGE
function ST4_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}

// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ST4_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img width="50" height="50" src="' . $post_featured_image . '" />';
        }
    }
}

add_filter('manage_posts_columns', 'ST4_columns_head');
add_action('manage_posts_custom_column', 'ST4_columns_content', 5, 2);

/////////////////////////End This code for admin post images display ///////////////////////

/** for widgets sidebar create */
function arphabet_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer First',
        'id' => 'footer_first',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Second',
        'id' => 'footer_second',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Third',
        'id' => 'footer_third',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Fourth',
        'id' => 'footer_forth',
        'before_widget' => '<div class="fb_header">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'arphabet_widgets_init');

/* -----------Banner----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Banner');

function my_custom_post_Banner() {
    /* for services */

    register_post_type('ourbanner', array(
        'labels' => array(
            'name' => __('Banner'),
            'singular_name' => __('ourbanner')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-image',
        'rewrite' => array('slug' => 'ourbanner'),
        'supports' => array('title', 'editor', 'thumbnail'),
            )
    );
}

/* -----------Staffs and climbers----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Staffs');

function my_custom_post_Staffs() {

    /* for services */

    register_post_type('ourstaff', array(
        'labels' => array(
            'name' => __('Staffs'),
            'singular_name' => __('ourstaff')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'rewrite' => array('slug' => 'ourstaff'),
        'supports' => array('title', 'editor', 'thumbnail'),
            )
    );
}

/* -----------News----------- */
/* ======================================== */
add_action('init', 'my_custom_post_News');

function my_custom_post_News() {

    /* for services */

    register_post_type('ournews', array(
        'labels' => array(
            'name' => __('News'),
            'singular_name' => __('ournews')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'rewrite' => array('slug' => 'ournews'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
    );
}

/* -----------Tours----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Tours');

function my_custom_post_Tours() {

    /* for services */

    register_post_type('ourtours', array(
        'labels' => array(
            'name' => __('Tours'),
            'singular_name' => __('ourtours')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category'),
        'menu_icon' => 'dashicons-universal-access',
        'rewrite' => array('slug' => 'ourtours'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
    );
}

/* -----------Activities----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Activities');

function my_custom_post_Activities() {

    /* for services */

    register_post_type('ouractivities', array(
        'labels' => array(
            'name' => __('Activitites'),
            'singular_name' => __('ouractivities')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category'),
        'menu_icon' => 'dashicons-editor-table',
        'rewrite' => array('slug' => 'ouractivities'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
    );
}

/* -----------Trekking----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Trekking');

function my_custom_post_Trekking() {
    /* for services */
    register_post_type('ourtrekking', array(
        'labels' => array(
            'name' => __('Trekking'),
            'singular_name' => __('ourtrekking')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category'),
        'menu_icon' => 'dashicons-universal-access-alt',
        'rewrite' => array('slug' => 'ourtrekking'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'tags'),
            )
    );
}

/* -----------Peak Climbing----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Climbing');

function my_custom_post_Climbing() {
    /* for services */
    register_post_type('ourclimbing', array(
        'labels' => array(
            'name' => __('Peak Climbing'),
            'singular_name' => __('ourclimbing')
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category'),
        'menu_icon' => 'dashicons-chart-area',
        'rewrite' => array('slug' => 'ourclimbing'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
    );
}
  /* --------------------------------------------------------------------
  Remove Unwanted Menu Items from the WordPress Dashboard
  - Requires WordPress 3.1+
  -------------------------------------------------------------------- */

function sb_remove_admin_menus() {

// Check that the built-in WordPress function remove_menu_page() exists in the current installation
    if (function_exists('remove_menu_page')) {

        /* Remove unwanted menu items by passing their slug to the remove_menu_item() function.
          You can comment out the items you want to keep. */

//remove_menu_page('upload.php'); // Media
        remove_menu_page('link-manager.php'); // Links
        remove_menu_page('edit-comments.php'); // Comments
//remove_menu_page('plugins.php'); // Plugins
//remove_menu_page('tools.php'); // Tools
//remove_menu_page('options-general.php'); // Settings
        remove_submenu_page('index.php', 'update-core.php');
    }
}

// Add our function to the admin_menu action
add_action('admin_menu', 'sb_remove_admin_menus');

require_once(TEMPLATEPATH . '/inc/search_destination.php');

function wpse_load_custom_search_template() {
    if (isset($_REQUEST['search']) &&  $_REQUEST['search']== 'advanced') {
        require('advanced-search-result.php');
        die();
    }
}

add_action('init', 'wpse_load_custom_search_template');

require_once(TEMPLATEPATH . '/inc/booking.php');

add_action( 'phpmailer_init', 'my_phpmailer_init' );
function my_phpmailer_init( PHPMailer $phpmailer ) {
    $phpmailer->Host = 'mail.crossovernepal.com';
    $phpmailer->Port = 26; // could be different
    $phpmailer->Username = 'rupesh@crossovernepal.com'; // if required
    $phpmailer->Password = 'rupesh_123'; // if required
    $phpmailer->SMTPAuth = true; // if required
    $phpmailer->SMTPSecure = 'ssl'; // enable if required, 'tls' is another possible value
    $phpmailer->IsSMTP();
}

function insert_attachment($file_handler,$post_id,$setthumb='false') {
if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){ return __return_false(); 
} 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

echo $attach_id = media_handle_upload( $file_handler, $post_id );
//set post thumbnail if setthumb is 1
if ($setthumb == 1) update_post_meta($post_id,'_thumbnail_id',$attach_id);
return $attach_id;
    }
   
    
?>