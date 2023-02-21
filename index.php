<?php
 include('layout/header.php'); 
?>
<!--Search Bar Begins Here-->
<section class="search text-center">
        <div class="container">
            <form method="GET" action="search-results.php">
                <input type="search" name="query" id="search" placeholder="Search for Food here...">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!--Search Ends Here-->

    <!--Categories Begins Here-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>
            <?php
                //create the sql to pull the categories
                $sql = "SELECT * FROM CATEGORIES WHERE FEATURED='YES' AND status='yes' LIMIT 3";

                //execute the query using connection
                $execute = mysqli_query($conn,$sql);

                //if execution is correctly submitted
                if($execute == TRUE){

                    //count the number of rows
                    $count = mysqli_num_rows($execute);

                    if($count > 0){
                       //if count is greater than 0 we will execute the loop

                        while($rows=mysqli_fetch_assoc($execute)){
                            $id = $rows['id'];
                            $category_title = $rows['title'];
                            $category_image = $rows['image_name'];
                            ?>
                            <a href="categories.php">
                                <div class="card float-container">
                                    <img src="images/category/<?php echo $category_image; ?>" alt="<?php echo$category_title; ?>" class="img-responsive img-rounded">
                                    <h3 class="float-text text-white"><?php echo$category_title; ?></h3>
                                </div>
                            </a>
                            <?php
                        }
                    }else{
                        //
                        echo "<div class='text-center'>No category Found</div>";
                    }
                    
                }
            ?>
          
            <div class="clearfix"></div>
        </div>
    </section>
    <!--Categories Ends Here-->

    <!--Explore Begins Here-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>
            <?php
                //sql to fetch products

                $product_sql = "SELECT * FROM products WHERE featured = 'yes' AND status = 'yes' limit 8";

                //execute this sql
                $pro_exec = mysqli_query($conn,$product_sql);

                //check if execution is true
                if($pro_exec == TRUE){
                    //count the numer of rows
                    $count = mysqli_num_rows($pro_exec);
                    
                    if($count > 0){
                        //run the while loop
                        while($pro_rows= mysqli_fetch_assoc($pro_exec)){
                           $pro_id = $pro_rows['id'];
                           $pro_title = $pro_rows['title'];
                           $pro_description = $pro_rows['description'];
                           $pro_price = $pro_rows['price'];
                           $pro_image = $pro_rows['image_name'];
                           ?>
                            <div class="box">
                                <div class="box-img">
                                    <img src="images/product/<?php echo $pro_image; ?>" alt="<?php echo $pro_title; ?>" class="img-responsive img-rounded">
                                </div>
                                <div class="box-desc">
                                    <h4><?php echo $pro_title; ?></h4>
                                    <p class="item-price">Rs.<?php echo $pro_price; ?></p>
                                    <p class="item-desc"><?php echo $pro_description; ?></p>
                                    <a href="<?php echo APP_URL; ?>order.php?id=<?php echo $pro_id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        echo "<div class='text-center'>No Products found</div>";

                    }
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--Explore Ends Here-->

    <?php include('layout/footer.php'); ?>
