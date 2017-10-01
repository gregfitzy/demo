<?php

function my_custom_form2_create() {
    ?>        
    <form action="ocpd_save_entry.php" method="post">
        Agreed learning Activity: <input type="text" name="activity_name"/><br />
        Start Date: <input type="date" name="start_date"/><br />
        <br />
        <input type="submit" name="submit" value="Save" />
        <br />
        <?php
            global $my_global_user;
            echo "my global user = $my_global_user";
            /*
            $location = $_SERVER['DOCUMENT_ROOT'];
            include ($location . '/wp-includes/pluggable.php');
            include ($location . '/wp-includes/user.php');
            include ($location . '/wp-includes/plugin.php');
            include ($location . '/wp-includes/class-wp-user.php');
            wp_get_current_user();
            */
        ?>
    </form>       
    <?php
}

my_custom_form2_create();
?>