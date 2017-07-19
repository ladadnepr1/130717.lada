<?php

include_once 'includes/config.php';
include_once 'includes/functions.php';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$db) {
    echo 'problem connect db:' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
} else if (filter_input(INPUT_GET, 'see_records')) {
    //просмотр пользователей 
    $nav = 1;
} else if (filter_input(INPUT_GET, 'add_record')) {
    $nav = 2;
} else if (filter_input(INPUT_POST, 'del')) {
    if (delete_record($db)) {
        echo 'record delete ';
        $nav = 1;
    } else {
        echo 'problem delete:' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
    }
} else if (filter_input(INPUT_POST, 'reg')) {

    if (!add_record($db)) {
        echo 'problem add:' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
    } else {
        $nav = 1;
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>STUDENTS</title>
        <style>
            table,td,th{
                background-color: yellow;
                border: 1px black solid;
            }
            .del{
                background-color: red;
            }
        </style>
    </head>
    <body>
        <form method="get">
            <input type="submit" value="add record" name="add_record"/>
	    <input type="submit" value="see records" name="see_records"/>	
        </form>
 
            <?php if($nav==2): 
                include_once 'registr.php';
                ?>
                
            <?php else : 
                include_once 'showusers.php';
                ?>
            <?php endif; ?>
    </body>
</html>
