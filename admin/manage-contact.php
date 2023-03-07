<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <strong class="heading">MANAGE CONTACT</strong><br>
       
             <?php include('config/session.php') ?>
             <!-- <br>
                <a class="btn btn-secondary product-add" href="add-product.php"> Add Product</a>
             <br> -->

             <!-- Products Table -->
                <table class="table bordertable">
                    <thead>
                       <tr>
                            <th>SN</th>
                            <th>CustomerName</th>
                            <th>CustomerEmail</th>
                            <th>CustomerFeedback</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        //making the sql to fetch the data from products table
                        $sql = "SELECT * FROM `contacts`";
                        
                        //execute the query
                        $exec = mysqli_query($conn, $sql);

                        //if there is something
                        if($exec == TRUE){
                            //count the number of rows
                            $count = mysqli_num_rows($exec);
                            if($count > 0){
                                $sn=1;
                                while( $rows = mysqli_fetch_assoc($exec)){
                                    $id = $rows['id'];
                                    $name = $rows['customer_name'];
                                    $feedback = $rows['customer_feedback'];
                                    $email = $rows['customer_email'];


?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $feedback; ?></td>
                                </tr>
                                    <?php 
                                }  
                            }else{
                                echo'<tr><td colspan="7" class="text-center">No feedbacks to display</td></tr>';
                            }
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
             <!-- Products Table End -->
        </div>
    </section>
    <!-- Body Section Ends -->

<?php include('common/footer.php') ?>
