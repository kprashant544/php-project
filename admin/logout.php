<?php
    include('config/constants.php');
    //session destroy
    session_destroy();
    //redirect to login page
    header('location:'.APP_URL.'admin/login.php');
?>