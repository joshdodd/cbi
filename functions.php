<?php  
//enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
function loadup_scripts() {
	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/assets/js/cbi.js', array('jquery'), '1.0.0', true );
 
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/libs/responsiveslides.js', array(), false, true ); 
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('page-banner', 1240, 250, true);
add_image_size('home-banner', 1240, 800, true);
add_image_size('content-block-image', 255, '', true);
add_image_size('slideshow', 655, 400, true);
add_image_size('landing', 315, 220, true);




//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Main Navigation'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );
 
//disable code editors
add_theme_support('html5');
add_theme_support('automatic-feed-links');

//Security and header clean-ups
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'wp_generator'); // remove WP version from header
remove_action( 'wp_head','wp_shortlink_wp_head');


//CLEAN UP FUNCTIONS ---------------------------------------- 
  
// admin part cleanups //
add_action('admin_menu', 'delete_menu_items'); // deleting menu items from admin area
add_action('admin_menu','remove_dashboard_widgets'); // remove some dashboard widgets
add_action('login_head', 'my_custom_login_logo'); //Add custom logo to admin
  
  
//Clean up Dashboard
function remove_dashboard_widgets(){

    //remove_meta_box('dashboard_right_now','dashboard','core'); // right now overview box
    remove_meta_box('dashboard_incoming_links','dashboard','core'); // incoming links box
    remove_meta_box('dashboard_quick_press','dashboard','core'); // quick press box
    //remove_meta_box('dashboard_plugins','dashboard','core'); // new plugins box
    //remove_meta_box('dashboard_recent_drafts','dashboard','core'); // recent drafts box
    remove_meta_box('dashboard_recent_comments','dashboard','core'); // recent comments box
    remove_meta_box('dashboard_primary','dashboard','core'); // wordpress development blog box
    remove_meta_box('dashboard_secondary','dashboard','core'); // other wordpress news box
} 

// Remove menus froms the admin area 
function delete_menu_items() {
  
    /*** Remove menu http://codex.wordpress.org/Function_Reference/remove_menu_page 
    syntaxe : remove_menu_page( $menu_slug )  **/
    //remove_menu_page('index.php'); // Dashboard
    remove_menu_page('edit.php'); // Posts
    //remove_menu_page('upload.php'); // Media
    //remove_menu_page('link-manager.php'); // Links
    //remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit-comments.php'); // Comments
    //remove_menu_page('themes.php'); // Appearance
    //remove_menu_page('plugins.php'); // Plugins
    //remove_menu_page('users.php'); // Users
    //remove_menu_page('tools.php'); // Tools
    //remove_menu_page('options-general.php'); // Settings
}


//Custon wp-admin logo
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a {
          background-size: 227px 85px !important;
          margin-bottom: 20px !important;
          background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}


function get_breadcrumb() {

    global $post;

    $trail = '';
    $page_title = get_the_title($post->ID);

    if($post->post_parent) {
        $parent_id = $post->post_parent;

        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>  <i class="fa fa-caret-right"> </i>';
            $parent_id = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);
        foreach($breadcrumbs as $crumb) $trail .= $crumb;

        $trail .= $page_title;
        $trail .= '';

        return $trail;  
    }
    else{
         $trail .= '';
        return $trail; 
    }
    
}
 

?>
