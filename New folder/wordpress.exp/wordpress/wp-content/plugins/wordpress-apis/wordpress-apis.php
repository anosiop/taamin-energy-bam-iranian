<?php 
/*
Plugin Name: Wordpress Apis
Plugin URI: 
Description: a wordpress plugin to work with apis
Author: Sama 
Author URI: 
Text Domain: wordpress-apis
Domain Path: /languages/
Version: 1.0.0
*/

define('WP_APIS_DIR',plugin_dir_path(__FILE__));
define('WP_APIS_URI',plugin_dir_url(__FILE__));
define('WP_APIS_INC',WP_APIS_DIR . '/inc/');
define('WP_APIS_TPL',WP_APIS_DIR . '/tpl/');


register_activation_hook(__FILE__,'wp_apis_plugin-activation');
register_deactivation_hook(__FILE__,'wp_apis_plugin_deactivation');

function wp_apis_plugin_activation()
{

    add_role(
        'shop_manager',
        'Shop Manager',
        [
            'read'=> true,
            'edit_posts'=> true,
            'remove_products'=> true
        ]
    );

    $role = get_role('administrator');
    $role ->add_cap('remove_products');

}
function wp_apis_plugin_deactivation()
{

}

if (is_admin()) {
    include WP_APIS_INC . 'admin/menus.php';
    include WP_APIS_INC . 'admin/metaboxes.php';

}

function wpapis_register_styles()
{
    wp_register_style('wpapis-maim-style',WP_APIS_URL . '/assets/css/main.css');
    wp_enqueue_style('wpapis-main-style');
}

add_action('wp_enqueue_scripts','wpapis_register_styles');
