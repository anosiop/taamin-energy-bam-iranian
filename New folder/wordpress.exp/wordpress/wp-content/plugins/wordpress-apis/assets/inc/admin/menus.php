<?php
//actions
add_actions('admin_menu','wp_apis_register_menus');

//functions
function wp_apis_register_menus()
{
    add_menu_page(
        'پلاگین سفارشی',
        'پلاگین سفارشی',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler'
    
    );
    
    add_submenu_page(
        'wp_apis_admin',
        'کاربران',
        'کاربران',
        'manage_options',
        'wp_apis_users',
        'wp_apis_users_page'
    );
   
    add_submenu_page(
        'wp_apis_admin',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page'
    );
}

function wp_apis_main_menu_handler()
{

    global $wpdb;

    $action = $_Get['action'];

    if ($action = "delete"){
        $item = intval($_GET['item']);

        if ($item >0) {

            $wpdb->delete($wpdb->prefix . 'sample' , ['ID' => $item]);

        }

    }
    if ($action == "add") {

        if (isset($_POST['saveData'])) {

            $wpdb->insert($wpdb->prefix . 'sample', [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'mobile' => $_POST['mobile']
            ]);

        }

        include WP_APIS_TPL . 'admin/menus/add.php';
        
    } else {
        $samples = $wpdb -> get_results ("SELECT * FORM {$wpdb -> prefix}sample");

        include WP_APIS_TPL . 'admin/menus/main.php';
    
    }
}

function wp_apis_general_page()
{
    if (isset($_POST['saveSettings'])) {
        //$is_plugin_active = isset($_POST['is_plugin_active']) ? 1 : 0;
        
        //add_option('wp_apis_is_active',$is_plugin_active);
        if (isset($_POST['is_plugin_active'])) {
            update_option('wp_apis_is_active', 1);
        }else {
            delete_option('wp_apis_is_active');
        }

    }

    $current_plugin_status = get_option('wp_apis_is_active', 0);
    include WP_APIS_TPL . 'admin/menus/general.php';
}

function wp_apis_users_page(){
    global $wpdb;

     $users = $wpdb -> get_results("SELECT ID,user_email,display_name FROM {$wpdb -> users}");

    include WP_APIS_TPL . 'admin/menus/users.php';

}