<?php
    include('config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login - Hamro Sekuwa</title>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <?php include('config/session.php');?>
        <br>
        <!-- Form Start -->
        <form action="" method="post">
        <label for="">UserName</label>
        <input type="text" name="user_name" class="form-control-login" placeholder="Enter your username..">
        <br><br>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Enter your password">
        <br><br>
        <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </form>
        <br> <br>
        <!-- Form Close -->

        <p class="text-center">Designed By<a href="#">Prashant Kasula</a> </p>
    </div>
    <?php  
        //login Code
        //check if request method is POST or not
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        //creating sql

        $sql = "SELECT * FROM users where user_name='$user_name' AND password='$password'";

        //execute the sql
        $res = mysqli_query($conn,$sql);

;        //if query is true
        if($res == TRUE){
            //If true count the number of rows
            $count = mysqli_num_rows($res);
            if($count == 1){
                $_SESSION['message'] = '<div class="success">Login Successful</div>';
                $_SESSION['user'] = $user_name;
                header('location:'.APP_URL.'admin/index.php');
            }else{
                $_SESSION['message'] = '<div class="error">Your Credentials do not match our record</div>';
                header('location:'.APP_URL.'admin/login.php');
            }
        }else{
            $_SESSION['message'] = '<div class="error">Something is mistake in your query</div>';
            header('location:'.APP_URL.'admin/login.php');
        }
    }
}
    ?>
</body>
</html>