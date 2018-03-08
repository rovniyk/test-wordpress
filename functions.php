<?php

/**
 * Test Theme functions and definitions
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */
/*
 * Enqueue scripts and styles.
 */
//require 'classes/yith_wc_points_rewards_expanded.php';
//require 'classes/yith_wc_points_rewards_customer_history_list_table_expanded.php';




//Debug function
function pa($mixed, $stop = false) {
    $ar = debug_backtrace();
    $key = pathinfo($ar[0]['file']);
    $key = $key['basename'] . ':' . $ar[0]['line'];
    $print = array($key => $mixed);
    echo( '<pre>' . (print_r($print, 1)) . '</pre>' );
    if ($stop == 1)
        exit();
}

if (!function_exists('testtheme_setup')) :

    function testtheme_setup() {

        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Top header menu')
        ));
        // Add image sizes for sections theme
        if (function_exists('add_image_size')) {
            add_image_size('post-preview', 562, 320, true);
            add_image_size('video-poster-preview', 1200, 573, true);
            add_image_size('button-play-preview', 144, 144, true);
            add_image_size('instagram-preview', 317, 328, true);
            add_image_size('event-preview', 370, 210, true);
            add_image_size('header-preview', 210, 117);
        }
        // Enable ACF theme options
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title' => 'Theme General Settings',
                'menu_title' => 'Theme Settings',
                'menu_slug' => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            ));

            acf_add_options_sub_page(array(
                'page_title' => 'Theme Header Settings',
                'menu_title' => 'Header',
                'parent_slug' => 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' => 'Theme Footer Settings',
                'menu_title' => 'Footer',
                'parent_slug' => 'theme-general-settings',
            ));
        }
    }

endif;
add_action('after_setup_theme', 'testtheme_setup');


add_action('admin_init', 'posts_order');

function posts_order() {
    add_post_type_support('post', 'page-attributes');
}

include( WP_CONTENT_DIR . '/themes/testtheme/classes/My_Walker_Nav_Menu.php' );

function testtheme_scripts() {
    // Bootstrap style
    wp_enqueue_style('testtheme-bootstrap', get_theme_file_uri('/css/bootstrap.min.css'), FALSE, TRUE);
    // Add fonts, used in the main stylesheet.
    wp_enqueue_style('testtheme-fonts', get_theme_file_uri('/css/font-awesome.min.css'), '', null, 'all');
    // Load the carousel  style.
    wp_enqueue_style('testtheme-carousel', get_theme_file_uri('/css/owl.carousel.min.css'), FALSE, TRUE);
    //Add Animate style    
    wp_enqueue_style('testtheme-animate', get_theme_file_uri('/css/animate.css'));
    // Theme stylesheet.
    wp_enqueue_style('testtheme-style', get_stylesheet_uri());


    //Load jquery script and custom script
    wp_enqueue_script('testtheme-jquery', get_theme_file_uri('/js/jquery.min.js'), array('jquery'), FALSE, TRUE);
    // Bootstrap script
    wp_enqueue_script('testtheme-bootstrap-script', get_theme_file_uri('/js/bootstrap.min.js'), false, FALSE, TRUE);
    // Load the carousel script .
    wp_enqueue_script('testtheme-carousel-script', get_theme_file_uri('/js/owl.carousel.min.js'), false, FALSE, TRUE);

    wp_enqueue_script('testtheme-jquery-validate', get_theme_file_uri('/js/jquery.h5validate.js'), false, FALSE, TRUE);
    // Theme custom js script
    wp_enqueue_script('testtheme-main-script', get_theme_file_uri('/js/main.js'), array('jquery'), FALSE, TRUE);
}

add_action('wp_enqueue_scripts', 'testtheme_scripts');

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}

function get_posts_for_article_block() {

    $with_us_post = get_field('sing_with_us_post', get_the_ID());

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => array(
            'date ' => 'DESC',
            'menu_order' => 'DESC'),
        'post__not_in' => array($with_us_post)
    );

    return new WP_Query($args);
}

function get_sing_with_us_block() {
    
    $args = array(
        'post__in' => array(get_field('sing_with_us_post', get_the_ID())),
    );

    return new WP_Query($args);
}

/*
    Todo Add field 'comment' in table 'wp_yith_ywpar_points_log'
*/
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'yith-woocommerce-points-and-rewards-premium/init.php' ) ){    
remove_filter('yith_ywpar_customers', array(YITH_WC_Points_Rewards_Admin(), 'customers_tab'));    
}

add_action('yith_ywpar_customers', 'expanded_customers_tab', 20);



function expanded_customers_tab() {
    
    require_once( __DIR__ . '/classes/yith_wc_points_rewards_expanded.php');
    require_once( __DIR__ . '/classes/yith_wc_points_rewards_customer_history_list_table_expanded.php');
    
    $cl = new YITH_WC_Points_Rewards_Admin();    
    $obj = new YITH_WC_Points_Rewards_Expanded();
    $points = 0;

    if (isset($_REQUEST['action'])) {
        $user_id = $_REQUEST['user_id'];
        $user_info = get_userdata($user_id);
        $points = get_user_meta($user_id, '_ywpar_user_total_points', true);
        if ($_REQUEST['action'] == 'save' && wp_verify_nonce($_POST['ywpar_update_points'], 'update_points')) {

            $new_points = $_REQUEST['user_points'] + $points;
            update_user_meta($user_id, '_ywpar_user_total_points', $new_points);
            $obj->register_log_com($user_id, 'admin_action', '', $_REQUEST['user_points'], $_REQUEST['user_comment']);
            YITH_WC_Points_Rewards_Earning()->extra_points(array('points'), $user_id);
        }
        $link = remove_query_arg(array('action', 'user_id'));
        
        $cl->cpt_obj = new YITH_WC_Points_Rewards_Customer_History_List_Table_Expanded();
    } else {
        $cl->cpt_obj = new YITH_WC_Points_Rewards_Customers_List_Table();
    }

    $customers_tab = TEMPLATEPATH . '/admin/customers-tab.php';
    if (file_exists($customers_tab)) {
        include_once( $customers_tab );
    }
}

function get_fencing_query(){
    
    $number_of_posts    = get_field('number_of_posts','option');
    $type_sorting       = get_field('type_sorting','option');
    $sorting_direction  = get_field('sorting_direction','option');

    if ( is_page('commercial') ){         

         if(!empty($number_of_posts) && !empty($type_sorting) && !empty($sorting_direction)){
            $args = array(
                'post_type'         =>'commercial',
                'posts_per_page'    => $number_of_posts,
                'orderby'           => $type_sorting,
                'order'             => $sorting_direction,
                                                      
            );                                
        }else{
             $args = array(
                'post_type'         =>'commercial',
                'posts_per_page'    => -1,
                'orderby'           => 'date',
                'order'             => 'DESC',
                
            );   
        }
        return new WP_Query($args); 

    }elseif(is_page('residential')){
        if(!empty($number_of_posts) && !empty($type_sorting) && !empty($sorting_direction)){
            $args = array(
                'post_type'         =>'residential',
                'posts_per_page'    => $number_of_posts,
                'orderby'           => $type_sorting,
                'order'             => $sorting_direction,
                                                      
            );                                
        }else{
             $args = array(
                'post_type'         =>'residential',
                'posts_per_page'    => -1,
                'orderby'           => 'date',
                'order'             => 'DESC',
                
            );   
        }
        return new WP_Query($args); 
    }
}