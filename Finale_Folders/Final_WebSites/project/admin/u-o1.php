<?php include('p/menu.php');  ?>

<div class="main">
    <div class="wrapper">
        <h1>Update Order</h1><br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM `order` WHERE id=$id";

                $res= mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count== 1){

                    $row = mysqli_fetch_assoc($res);

                    $book = $row['book'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contect = $row['customer_contect'];
                
                        $customer_email = $row['customer_email'];
                
                        $customer_address = $row['customer_address'];


                }else{
                    header("location:".SIT."admin/m-c.php");
                }

            }else{
                header("location:".SIT."admin/m-c.php");
            }
          
        ?>
         
        <form action="" method='POST'>
            <table class='tbl-30'>
                <tr>
                    <td>Book:</td>
                    <td><b><?php echo $book; ?></b></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>$<b><?php echo $price; ?></b></td>
                </tr>

                <tr>
                    <td>Qty:</td>
                    <td><input type='number' name='qty' value='<?php echo $qty; ?>'></td>
                </tr>

                <tr>
                    <td>Status:</td>
                    <td>
                        <select name='status'>
                        <option <?php if($status=="order"){echo "selected";} ?> name='order'>order</option>
                        <option <?php if($status=="On-Delivery"){echo "selected";} ?> name='On-Delivery'>On-Delivery</option>
                        <option <?php if($status=="Delivery"){echo "selected";} ?> name='Delivery'>Delivered</option>
                        <option <?php if($status=="Canclled"){echo "selected";} ?> name='Canclled'>Canclled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name:</td>
                    <td><input type='text' name='customer_name' value='<?php echo $customer_name; ?>'></td>
                </tr>

                <tr>
                    <td>Custmore Contact</td>
                    <td><input type='text' name='customer_contect' value='<?php echo $customer_contect; ?>'></td>
                </tr>

                <tr>
                    <td>Custmore Email</td>
                    <td><input type='text' name='customer_email' value='<?php echo $customer_email; ?>'></td>
                </tr>

                <tr>
                    <td>Custmore Address</td>
                    <td><textarea  name='customer_address' value='' cols='26' rows='3'><?php echo $customer_address; ?></textarea></td>
                 </tr>

                <tr>
                    <input type='hidden' name='id' value='<?php echo $id; ?>'>
                    <input type='hidden' name='price' value='<?php echo $price; ?>'>
                    <td><input type='submit' name='submit' value='Update Order' class='btn-s'></td>
                </tr>


            </table>
        </form>

        <?php
                if(isset($_POST['submit'])){
                   
                    $id = mysqli_real_escape_string($conn,$_POST['id']);
                    $price = mysqli_real_escape_string($conn,$_POST['price']);
                    $qty = mysqli_real_escape_string($conn,$_POST['qty']);

                    $total = $price * $qty;

                    $status = mysqli_real_escape_string($conn,$_POST['status']);

                    $customer_name = mysqli_real_escape_string($conn,$_POST['customer_name']);
                    $customer_contect = mysqli_real_escape_string($conn,$_POST['customer_contect']);
                    $customer_email = mysqli_real_escape_string($conn,$_POST['customer_email']);
                    $customer_address = mysqli_real_escape_string($conn,$_POST['customer_address']);


                    $sql2 = "UPDATE `order` SET
                    
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contect = '$customer_contect',
                    customer_email = '$customer_email',
                    customer_address ='$customer_address'
                    WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true){
                        $_SESSION['update'] = '<div class="s">successfully to updated order</div>';
                        header("location:".SIT.'admin/m-o.php');


                    }else{
                        $_SESSION['update'] = '<div class="e">failed to updated order</div>';
                        header("location:".SIT.'admin/m-o.php');
                    }



                }

?>
    </div>
</div>



<?php include('p/f.php');  ?>