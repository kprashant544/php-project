<?php

//getting the connection
include('config/constants.php');
//taking the id
$id = $_GET['id'];
echo $id;
//finding the product inorder to delete photo
 //making sql to select value
 $sql = "SELECT * FROM orders where id='$id'";

 //execute the query
 $exec = mysqli_query($conn,$sql);

 //count the number of rows
 $count = mysqli_num_rows($exec);

//making the sql

$sql = "DELETE FROM ORDERS WHERE ID = '$id'";

//execute query
$exec = mysqli_query($conn,$sql);

//checking either true or false
if($exec == TRUE){
    $_SESSION['message'] = '<div class="success"> Order Deleted Succesfully </div>';
}else{
    $_SESSION['message'] = '<div class="error"> Something Went Wrong. Try Again </div>';
}
header('location:'.APP_URL.'admin/manage-order.php');
?>