<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">DASHBOARD</h1>

            <div class="clearfix"></div>
    
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM categories";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM products";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM orders";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                
                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql4 = "SELECT * FROM users";
                        //Execute Query
                        $res4 = mysqli_query($conn, $sql4);
                        //Count Rows
                        $count4 = mysqli_num_rows($res4);
                    ?>

                    <h1><?php echo $count4; ?></h1>
                    <br />
                    Total users
                </div>

                <div class="contact-link">
                    <ul>
                        <li><a href="manage-contact.php">CustomerFeedback</a></li>
                    </ul>
                 </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
    <!-- Body Section Ends -->

<?php include('common/footer.php') ?>
