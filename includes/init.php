<?php

(defined('ABSPATH')) || exit;
function disable_admin_bar_for_specific_roles($show)
{
    if (is_user_logged_in()) {
        $user             = wp_get_current_user();
        $restricted_roles = [ 'subscriber' ];

        if (array_intersect($restricted_roles, $user->roles)) {
            return false;
        }
    }

    return $show;
}

add_action('init', 'heyat_action_init');

function heyat_action_init(): void
{
    if (! isset($_COOKIE[ "setcookie_heyat_nonce" ])) {
        setcookie("setcookie_heyat_nonce", wp_generate_password(20, true, true), time() + 1800, "/");
        header("Refresh:0");
        exit;

    }

}

function remove_wp_version()
{
    return '';
}
add_filter('the_generator', 'remove_wp_version');

function hide_theme_name()
{
    wp_dequeue_style('parent-style'); 
    wp_dequeue_style('child-style');  
    wp_deregister_style('parent-style');
    wp_deregister_style('child-style');
}
add_action('wp_enqueue_scripts', 'hide_theme_name', 9999);

function disable_rest_api()
{
    if (! is_user_logged_in()) {
        wp_die('REST API is disabled.');
    }
}
add_action('rest_api_init', 'disable_rest_api', 1);


add_action('get_header','action_get_header', 10, 2 );

/**
 * Fires before the header template file is loaded.
 *
 * @param string|null $name Name of the specific header file to use. Null for the default header.
 * @param array       $args Additional arguments passed to the header template.
 */
function action_get_header($name, $args) : void {

    if(is_category()){
        $current_category    = get_category(get_queried_object_id());
    
        if ($current_category->slug == "heart") {
    
            wp_redirect( home_url());
                                
        }
    }
}

function custom_archive_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && (is_archive() || is_category() || is_tag())) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'custom_archive_posts_per_page');
