<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">MANAGE PRODUCT</h1><br>
       
             <?php include('config/session.php') ?>
             <br>
                <a class="btn btn-secondary product-add" href="add-product.php"> Add Product</a>
             <br>

             <!-- Products Table -->
                <table class="table">
                    <thead>
                       <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        //making the sql to fetch the data from products table
                        $sql = "SELECT * FROM `products`";
                        
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
                                    $title = $rows['title'];
                                    $price = $rows['price'];
                                    $current_image = $rows['image_name'];
                                    $featured = $rows['featured'];
                                    $status = $rows['status'];
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <?php
                                        if($current_image != ""){
                                            ?>
                                            <td><img width="100" height="100" src="../images/product/<?php echo $current_image; ?>" alt="<?php echo $current_image; ?>"></td>
                                            <?php
                                        }else{
                                            echo '<td>No Image Found</td>';
                                        }
                                        ?>
                                      
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                    <a class="btn btn-primary" href="<?php  echo APP_URL; ?>admin/edit-product.php?id=<?php echo $id; ?>">
                                Edit Product
                            </a>
                                <a class="btn btn-danger" href="<?php  echo APP_URL; ?>admin/delete-product.php?id=<?php echo $id; ?>">
                                    Delete Product
                                </a>
                                    </td>
                                </tr>
                                    <?php 
                                }  
                            }else{
                                echo'<tr><td colspan="7" class="text-center">No products to display</td></tr>';
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
