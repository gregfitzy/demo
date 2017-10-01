<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
    <head>
        <title>Online Add CPD Entry</title>
    </head>
    <body>
        <pre>
            <?php
            //print_r(wp_get_current_user());
            //global $ocpd_user_id;
            //echo "global user id = $ocpd_user_id";
            //$user_id = wp_get_current_user()->ID;
            //echo "user id = " . $user_id;
            if (current_user_can('manage-options')) {
                echo "you can manage options";
            }
            ?>
        </pre>
        <form action="ocpd_save_entry.php" method="post">
            Agreed learning Activity: <input type="text" name="activity_name"/><br />
            Start Date: <input type="date" name="start_date"/><br />
            <br />
            <input type="submit" name="submit" value="Save" />
        </form>
    </body>
</html>
