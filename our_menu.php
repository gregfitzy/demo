<?php

function demo_hide_admin_bar() {
    $option = get_option('demo-our-first-option');
    
    if ($option === "yes") {
        add_filter('show_admin_bar', '__return_false');
    }
}

add_action('init', 'demo_hide_admin_bar');

function demo_register_our_settings() {
    register_setting('demo-our-settings-group','demo-our-first-option');
}

add_action('admin_init', 'demo_register_our_settings');

function demo_our_menu_callback() {
    //echo "<br>Demo hello our first menu</br>"; old
    
    ?>
        <br>demo hello our first menu</br>
        
        <form action="options.php" method="POST">
            <?php settings_fields('demo-our-settings-group'); ?>
            
            <input id="demo-hide-admin" type="checkbox" name="demo-our-first-option" value="yes" <?php checked(get_option('demo-our-first-option'), 'yes') ?>/>
            <label for="demo-hide-admin">Demo Hide admin bar in front end ?</label>
            <br>
            <?php 
                $user_id = wp_get_current_user()->ID;
                echo "user id = " . $user_id;
            ?>
            
            <?php submit_button('Save'); ?>
        </form>
        
    <?php
    /*
     * N.B. can use options API direct
     *  add_option('option-name', 'option-value);
     *  update_option('option-name', 'option-value) // use in ajax request
     *  delete_option('option-name'); // put in uninstall function
     */
}

function demo_our_submenu_callback() {
    echo "<br>demo hello our first sub menu</br>";
}

function demo_build_our_first_menu() {
    add_menu_page(
        'Demo Our Page Title', 
        'Demo Our Menu Title', 
        'administrator', 
        'demo_our_menu_slug',
        'demo_our_menu_callback',
        'dashicons-menu'
    );
    
    add_submenu_page(
        'demo_our_menu_slug',
        'Demo Our Sub Page Title', 
        'Demo Our Sub Menu Title', 
        'administrator', 
        'demo_our_submenu_slug',
        'demo_our_submenu_callback'
    );
}

add_action('admin_menu', 'demo_build_our_first_menu');

?>
