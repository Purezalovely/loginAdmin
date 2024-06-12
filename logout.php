<?php 
    session_start();
    $_SESSION['Admin_email'] = '';
    session_unset();
    header('location:login.php');