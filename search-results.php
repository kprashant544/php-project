<?php 
// include('config/db.php'); 
include('layout/header.php'); 

// Get the query from the search form
$query = $_GET['query'];

// Create the sql to fetch the search results
$sql = "SELECT * FROM products WHERE title LIKE '%$query%' OR description LIKE '%$query%'";

// Execute the query using the connection
$execute = mysqli_query($conn,$sql);

// Check if the execution is successful
if($execute == TRUE){

  // Count the number of rows
  $count = mysqli_num_rows($execute);

  // If there are more than 0 rows, display the results
  if($count > 0){
?>
<!--Search Results Begins Here-->
<section class="search-results">
  <div class="container">
    <h2 class="text-center">Search Results</h2>
    <?php
      // Loop through each result and display them
      while($rows = mysqli_fetch_assoc($execute)){
        $id = $rows['id'];
        $title = $rows['title'];
        $description = $rows['description'];
        $price = $rows['price'];
        $image = $rows['image_name'];
    ?>
    <div class="box">
      <div class="box-img">
        <img src="images/product/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-responsive img-rounded">
      </div>
      <div class="box-desc">
        <h4><?php echo $title; ?></h4>
        <p class="item-price">Rs.<?php echo $price; ?></p>
        <p class="item-desc"><?php echo $description; ?></p>
        <a href="<?php echo APP_URL; ?>order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
      </div>
    </div>
    <?php
      }
    ?>
    <div class="clearfix"></div>
  </div>
</section>
<!--Search Results Ends Here-->
<?php 
  }else{
    // If there are no results, display a message
    echo "<div class='text-center'>No Results Found</div>";
  }
}

include('layout/footer.php'); 
?>