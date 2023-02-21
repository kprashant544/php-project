<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">CHANGE PASSWORD</h1>
            <br>
            <?php include('config/session.php') ?>
            <?php 
            //getting id
            $id = $_GET['id'];
            ?>
             <!-- Users Add Form -->
                <form method="post" action="">
                    <table class="table">
                        <tr>
                            <td class="text-right">Old Password</td>
                            <td><input type="text" name="old_password" placeholder="Enter your old password." id="old_password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-right">New Password</td>
                            <td><input type="text" name="new_password" placeholder="Enter your new password" id="new_password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-right">Confirm Password</td>
                            <td><input type="text" name="confirm_password" placeholder="Enter your confirm password" id="confirm_password" class="form-control"></td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" class="text-center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">    
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary"></td>
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
        //Getting the data from the web form in respective variable
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        $id = $_POST['id'];

        //checking the user exists
        $checkSql = "SELECT * FROM USERS WHERE ID=$id AND password='$old_password'";

        //execute the checking sql
        $exec = mysqli_query($conn, $checkSql);

        //if execution is successful
        if($exec == TRUE){
            //count the number of rows
            $count = mysqli_num_rows($exec);

            if($count==1){
                    if($new_password == $confirm_password){
                        //creating update $sql
                        $sql = "UPDATE users SET
                                password='$new_password',
                                WHERE id=$id AND password='$old_password'";

                                //execute the query
                                $execute = mysqli_query($conn, $sql);

                                //check if update
                                if($execute == TRUE){
                                    //if success
                                    $_SESSION['message'] = '<div class="success"> Password Updated Successfully</div>' ;
                                    header('location:'.APP_URL.'admin/manage-user.php');
                                }else{
                                    //if error
                                    $_SESSION['message'] = '<div class="error">Something went wrong! Please try again .</div>';
                                    header('location:'.APP_URL.'admin/update-password.php?id='.$id);
                                }
                    }else{
                        $_SESSION['message'] = '<div class="error">Please confirm your password.</div>';
                        header('location:'.APP_URL.'admin/update-password.php?id='.$id);
                    }
                
            }else{
                $_SESSION['message'] = '<div class="error">Could not find the User.</div>';
                header('location:'.APP_URL.'admin/update-password.php?id='.$id);
            }
        }else{
                $_SESSION['message'] = '<div class="error">Could not execute the query.</div>';
                header('location:'.APP_URL.'admin/update-password.php?id='.$id);
            }
    }
}
?>