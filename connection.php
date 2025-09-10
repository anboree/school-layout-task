<?php
    $server_name = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "layout_task_db";

    $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

    if(!$conn){
        echo "Error";
        die;
    }
?>