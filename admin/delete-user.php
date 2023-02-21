<?php

//getting the connection
include('config/constants.php');
//taking the id
$id = $_GET['id'];
echo $id;

//making the sql

$sql = "DELETE FROM USERS WHERE ID = '$id'";

//execute query
$exec = mysqli_query($conn,$sql);

//checking either true or false
if($exec == TRUE){
    $_SESSION['message'] = '<div class="success"> Users Deleted Succesfully </div>';
}else{
    $_SESSION['message'] = '<div class="error"> Something Went Wrong. Try Again </div>';
}
header('location:'.APP_URL.'admin/manage-user.php');
?>