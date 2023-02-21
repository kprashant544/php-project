<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">EDIT CATEGORY</h1>
            <br>
            <?php include('config/session.php') ?>
            <?php 
            //getting id
            $id = $_GET['id'];
            
            //making sql to select value
            $sql = "SELECT * FROM categories where id='$id'";

            //execute the query
            $exec = mysqli_query($conn,$sql);

            //count the number of rows
            $count = mysqli_num_rows($exec);

            if($count == 1){
                while($rows=mysqli_fetch_assoc($exec)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $featured = $rows['featured'];
                    $status = $rows['status'];
                    $current_image = $rows['image_name'];
                }
            }

            ?>
             <!-- Categories Add Form -->
                <form method="post" action="" enctype="multipart/form-data">
                <table class="table">
                        <tr>
                            <td class="text-right">Title</td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Enter title" id="title" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Current Image</td>
                            <?php
                                        if($current_image != ""){
                                            ?>
                                            <td><img width="100" height="100" src="../images/category/<?php echo $current_image; ?>" alt="<?php echo $current_image; ?>"></td>
                                            <?php
                                        }else{
                                            echo '<td>No Image Found</td>';
                                        }
                                        ?>
                        </tr>
                        <tr>
                            <td class="text-right">Upload New Image</td>
                            <td>
                                <input type="file" accept="image/*" name="image" id="image" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Featured</td>
                            <td>
                                <input type="radio" <?php  if($featured == "Yes"){echo "checked";} ?> name="featured" id="" value="Yes">Yes
                                <input type="radio" <?php  if($featured == "No"){echo "checked";} ?> name="featured" id="" value="No">No
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Status</td>
                            <td>
                                <input type="radio" <?php  if($status == "Yes"){echo "checked";} ?> name="status" id="" value="Yes">Active
                                <input type="radio" <?php  if($status == "No"){echo "checked";} ?> name="status" id="" value="No">Inactive
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                             </td>
                        </tr>
                    </table>
                </form>
             <!-- Categories Add Form End -->
        </div>
    </section>
    <!-- Body Section Ends -->

   

<?php include('common/footer.php') ?>

<?php 
//Form Submit Code
//check if request method is POST or not
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        
         //Getting the data from the web form in respective variable
        $title = $_POST['title'];
        //to populate the default value of featured
        if(isset($_POST['featured'])){
            //request value 
            $featured = $_POST['featured']; 
        }else{
            //default value
            $featured = "No";
        }

         //to populate the default value of status
         if(isset($_POST['status'])){
            //request value 
            $status = $_POST['status']; 
        }else{
            //default value
            $status = "No";
        }
        $id = $_POST['id'];
        $current_image = $_POST['current_image'];

        //upload file or image
         //Check if request file
         if($_FILES['image']['name']){ 
            //taking the extension
            $ext = end(explode('.',$_FILES['image']['name']));
            //giving the random name
            $image = 'Category_'.rand(1111,9999).'.'.$ext;
         //upload the image
         $uploaded_path = $_FILES['image']['tmp_name'];
         $destination_path = "../images/category/".$image;

         $upload = move_uploaded_file($uploaded_path, $destination_path);

         if($upload == false){
            $_SESSION['message'] = '<div class="error">Could not upload the image. Try again</div>';
            die();
        }else{ 
            $image_name = $image;
            
            //remove the old image
            if(file_exists("../images/category/".$current_image)){
                @unlink("../images/category/".$current_image);
            }
        }
    }else{
        $image_name = "$current_image";
    }
        //making sql
        $sql = "UPDATE categories SET
        title='$title',
        featured='$featured',
        status='$status',
        image_name='$image_name'
        WHERE id='$id'";

        //Check the connection
        if($conn){
            $execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //create database 
            if($execute == TRUE){
                $_SESSION['message']= '<div class="success"> Category updated Succefully </div>';
                header('location:'.APP_URL.'admin/manage-category.php');
            }else{
                $_SESSION['message'] = '<div class="error"> Could not Edit Category Instantly. Try Again </div>';
                header('location:'.APP_URL.'admin/edit-category.php');
            }
        }else{
            die("Connection Failed".mysqli_connect_error());
        }

    }
}
?>