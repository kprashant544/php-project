<?php 
ob_start();
;include('config/constants.php');
include('config/login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <!-- Menu Section Starts -->
    <section class="menubar">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo2.png" class="img-responsive" alt="logo">
                
            </div>
            <div class="menu text-center">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-user.php">Users</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- Menu Section Ends -->