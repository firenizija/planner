<?php
$config= require_once 'config.php';
$conn = new mysqli($config['host'],$config['user'],$config['password'],$config['database']);
session_start();
        if(!mysqli_query($conn, "UPDATE users SET session = '".''."' WHERE login = '".$_SESSION['login']."';")){
            printf("Error message: %s\n", $conn->error);
        }
session_unset();
session_destroy();
header("Location: index.php");
exit();