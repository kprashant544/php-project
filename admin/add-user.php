<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">ADD USER</h1>
            <br>
            <?php include('config/session.php') ?>
             <!-- Users Add Form -->
                <form method="post" action="add-user.php">
                    <table class="table">
                        <tr>
                            <td class="text-right">UserName</td>
                            <td><input type="text" name="user_name" placeholder="Enter your Username" id="user_name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-right">FullName</td>
                            <td><input type="text" name="full_name" placeholder="Enter your Fullname" id="full_name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-right">Password</td>
                            <td><input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
             <!-- Users Add Form End -->
        </div>
    </section>
    <!-- Body Section Ends -->

   

<?php include('common/footer.php') ?>

<?php 
//Form Submit Code
//check if request method is POST or not
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        var_dump($_POST);
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        //making sql
        $sql = "INSERT INTO users SET
        full_name='$full_name',
        user_name='$user_name',
        password='$password'
        ";

        //Check the connection
        if($conn){
            $execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //create database 
            if($execute = TRUE){
                $_SESSION['message']= '<div class="success"> User Added Succefully </div>';
                header('location:'.APP_URL.'admin/manage-user.php');
            }else{
                $_SESSION['message'] = '<div class="error"> Could not Add User Instantly. Try Again </div>';
                header('location:'.APP_URL.'admin/manage-user.php');
            }
        }else{
            die("Connection Failed".mysqli_connect_error());
        }

    }
}
?>