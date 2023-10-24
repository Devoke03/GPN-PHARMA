<?php
    session_start();
    include('functions.php');
    include('connection.php');
    if(isset($_SESSION['user_id']))
    {
        unset($_SESSION['user_id']);
        header("Location: managerlogin.php");
        die;
    }

    // header("Location: managerlogin.php");
    // die;