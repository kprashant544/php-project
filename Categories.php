<?php include('layout/header.php'); ?>

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
                $sql = "SELECT * FROM CATEGORIES WHERE status='yes'";

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
                            <a href="#">
                                <div class="card float-container">
                                <a href="product.php">
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

    <?php include('layout/footer.php'); ?>
