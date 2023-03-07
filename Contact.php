<?php include('layout/header.php'); ?>

    <!-- Contact Form section -->
     <section class="search text-center">
        <div class="container">
            <section class="contact">
                <div class="container">
                    <h2 class="text-center text-white contact-heading">Send us a Message</h2>
                    <form enctype="multipart/form-data" method="post" action="" class="form-horizontal">
                        <label for="">Name</label>
                        <input class="form-control" required type="text" name="name" id="name" placeholder="Enter your name..">
        
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email..">
        
                        <label for="">Message</label>
                        <textarea class="form-control" required name="feedback" id="feedback" cols="30" rows="10" placeholder="Enter your message.."></textarea>
        
                       <input type="submit" name="submit" class="btn text-center btn-primary">
                    </form>
                </div>
            </section>
        </div>
    </section>
    <!-- Contact Form Section Ends -->

    <?php
    //to submit the form
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['submit'])){
            //Getting the data from the web form in respective variable
            $customer_name = $_POST['name'];
            $customer_email = $_POST['email'];
            $customer_feedback = $_POST['feedback'];
            
            //making sql
            $sql = "INSERT INTO contacts SET
            customer_name='$customer_name',
            customer_email='$customer_email',
            customer_feedback='$customer_feedback'";

            //Check the connection
            if($conn){
                $execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                //create database 
                if($execute = TRUE){
                    $_SESSION['message']= '<div class="success"> feedback submitted Succefully </div>';
                    header('location:'.APP_URL);
                }else{
                    $_SESSION['message'] = '<div class="error"> Could not submit feedback Instantly. Try Again </div>';
                    header('location:'.APP_URL.'contact.php?id=$id');
                }
            }else{
                die("Connection Failed".mysqli_connect_error());
            }
        }
    }
    ?>
   
    <?php include('layout/footer.php'); ?>
