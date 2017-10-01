<?php
/*
Plugin Name: demo
Plugin URI: http://www.practice.dev/demo
Description: Demo me
Version: 1.0
Author: Fiona Scott
Author URI: http://www.practice.dev/demo 
License: GPL2
*/

function demo_execute_our_first_short_code($attr)  {
    /* first code block for demo
    if (isset($attr['attribute'])) {
        return 'attribute provided = ' . $attr['attribute'];
    } else {
        return 'no attribute provided';
    }
    */
    // second code block for demo
    wp_enqueue_style('demo_css_id', plugins_url() . '/demo/my_demo.css');
    wp_enqueue_script('demo_js_id', plugins_url() . '/demo/my_demo.js');
    
    $output_text = 'no attribute provided';
    if (isset($attr['attribute'])) {
        $output_text = 'attribute provided = ' . $attr['attribute'];
    }
    return '<p class="our_demo_class" id ="our_demo_id" onclick="changeColor()">You gave me: ' . $output_text . '</p>';
}
add_shortcode('our_first_short_code', 'demo_execute_our_first_short_code');

function demo_my_admin_footer_text($text) {
    return '<p style="color:red">My first plugin called demo for website ' . site_url() . '</p>' . $text;
}
add_filter('admin_footer_text', 'demo_my_admin_footer_text');

function demo_add_my_own_menu2() {
    global $wp_admin_bar;
    
    global $my_global_user;
    $my_global_user = wp_get_current_user();
    if (!($my_global_user instanceof WP_User )) {
        return;
    }

    $custom_menu = array(
        'id' => 'my-custom-form2',
        'title'=> 'My Custom Form Menu2',
        'parent' => 'top-secondary',
        'href' => plugins_url('our_add_entry2.php', __FILE__)
    );       
    $wp_admin_bar->add_node($custom_menu);
}
add_action('admin_bar_menu', 'demo_add_my_own_menu2');

function demo_add_my_own_menu() {
    global $wp_admin_bar;

    $custom_menu = array(
        'id' => 'demo_menu',
        'title'=> 'Demo First Menu',
        'parent' => 'top-secondary',
        //'href' => site_url() . '/practice-demo-home'
        'href' => plugins_url('our_add_entry.php', __FILE__)
    );       
    $wp_admin_bar->add_node($custom_menu);
}
add_action('admin_bar_menu', 'demo_add_my_own_menu');

function wp_codex_search_form() {
    global $wp_admin_bar;

    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $codex_search = '
<form style="margin: 5px 0 0;" action="http://wordpress.org/search/do-search.php" method="get">
        <input class="adminbar-input" maxlength="100" name="search" size="13" type="text" value="' . __( 'Search the Codex', 'textdomain' ) . '" />
        <button class="adminbar-button">
            <span>Go</span>
        </button>
    </form>

';

    /* Add the main siteadmin menu item */
    $wp_admin_bar->add_menu( array( 'id' => 'codex_search', 'title' => __( 'Search the Codex', 'textdomain' ), 'href' => FALSE ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'codex_search', 'title' => $codex_search, 'href' => FALSE ) );
}
add_action( 'admin_bar_menu', 'wp_codex_search_form', 1000 );

function my_custom_form() {
    global $wp_admin_bar;

    $custom_menu = array(
        'id' => 'my-custom-form',
        'title'=> 'My Custom Form Menu',
        'href' => plugins_url('our_add_entry.php', __FILE__)
    );       
    $wp_admin_bar->add_node($custom_menu);
}
add_action('admin_bar_menu', 'my_custom_form');

require_once('our_menu.php');

/**
NOTES:

//can add a custom action.
//define action hook
function add_my_custom_Action() {
    do_action('my_custom_action', 1); (// 2nd arg is no. parameters. defaults to 1
}
//the then attach a function to action hook 
add_action('my_custom_action', 'do_something');
function do_something() {
    echo 'awesome';
}
//call action hook
my_custom_action()
//can do same with filters see https://www.lynda.com/WordPress-tutorials/Creating-custom-hooks/508212/547129-4.html
**/
?>

