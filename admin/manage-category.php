<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">MANAGE CATEGORY</h1><br>
       
             <?php include('config/session.php') ?>
             <br>
                <a class="btn btn-secondary category-add" href="add-category.php"> Add Category</a>
             <br>

             <!-- Users Table -->
                <table class="table">
                    <thead>
                       <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <?php 
                        //making the sql to fetch the data from categories table
                        $sql = "SELECT * FROM `categories`";
                        
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
                                    $current_image = $rows['image_name'];
                                    $featured = $rows['featured'];
                                    $status = $rows['status'];
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <?php
                                        if($current_image != ""){
                                            ?>
                                            <td><img width="100" height="100" src="../images/category/<?php echo $current_image; ?>" alt="<?php echo $current_image; ?>"></td>
                                            <?php
                                        }else{
                                            echo '<td>No Image Found</td>';
                                        }
                                        ?>
                                      
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                    <a class="btn btn-primary" href="<?php  echo APP_URL; ?>admin/edit-category.php?id=<?php echo $id; ?>">
                                Edit Category
                            </a>
                                <a class="btn btn-danger" href="<?php  echo APP_URL; ?>admin/delete-category.php?id=<?php echo $id; ?>">
                                    Delete Category
                                </a>
                                    </td>
                                </tr>
                                    <?php 
                                }  
                            }else{
                                echo'<tr><td colspan="6" class="text-center">No rows to display</td></tr>';
                            }
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
             <!-- Users Table End -->
        </div>
    </section>
    <!-- Body Section Ends -->

<?php include('common/footer.php') ?>
