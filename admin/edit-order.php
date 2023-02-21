<?php include('common/header.php') ?>

    <!-- Body Section Starts -->
    <section class="content">
        <div class="wrapper">
             <h1 class="heading">EDIT ORDER</h1>
            <br>
            <?php include('config/session.php') ?>
            <?php 
            //getting id
            $id = $_GET['id'];
            
            //making sql to select value
            $sql = "SELECT * FROM orders where id='$id'";

            //execute the query
            $exec = mysqli_query($conn,$sql);

            //count the number of rows
            $count = mysqli_num_rows($exec);

            if($count == 1){
                while($rows=mysqli_fetch_assoc($exec)){
                    $id = $rows['id'];
                    $title = $rows['product'];
                    $price = $rows['price'];
                    $quantity = $rows['quantity'];
                    $total = $rows['total'];
                    $name = $rows['customer_name'];
                    $address = $rows['customer_address'];
                    $email = $rows['customer_email'];
                    $contact = $rows['customer_contact'];
                }
            }

            ?>
             <!-- Categories Add Form -->
                <form method="post" action="" enctype="multipart/form-data">
                <table class="table">
                        <tr>
                            <td class="text-right">Name</td>
                            <td>
                                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter name" id="name" class="form-control">
                            </td>
                        </tr>
                        
                                <input type="hidden" name="price" value="<?php echo $price; ?>" placeholder="Enter price" id="price" class="form-control">

                        <tr>
                            <td class="text-right">Email</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter email" id="email" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Address</td>
                            <td>
                                <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Enter address" id="address" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Contact</td>
                            <td>
                                <input type="number" min=9000000000 max=9999999999 name="contact" value="<?php echo $contact; ?>" placeholder="Enter contact" id="contact" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Quantity</td>
                            <td>
                                <input type="number" name="quantity" value="<?php echo $quantity; ?>" placeholder="Enter quantity" id="quantity" class="form-control">
                            </td>
                        </tr>
                
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $total = $price * $quantity;

          //making sql
        $sql = "UPDATE orders SET
        quantity='$quantity',
        price='$price',
        total='$total',
        customer_name='$name',
        customer_email='$email',
        customer_address='$address',
        customer_contact='$contact'
        WHERE id='$id'";

        //Check the connection
        if($conn){
            $execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //create database 
            if($execute == TRUE){
                $_SESSION['message']= '<div class="success"> Order updated Succefully </div>';
                header('location:'.APP_URL.'admin/manage-order.php');
            }else{
                $_SESSION['message'] = '<div class="error"> Could not Edit Order Instantly. Try Again </div>';
                header('location:'.APP_URL.'admin/edit-order.php?id='.$id);
            }
        }else{
            die("Connection Failed".mysqli_connect_error());
        }

    }
}
?>