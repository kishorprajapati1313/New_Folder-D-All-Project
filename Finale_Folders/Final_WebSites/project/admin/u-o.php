<?php include('p/menu.php');  ?>

<div class="main">
    <div class="wrapper">
        <h1>Update Order</h1><br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM `order` WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                        $book = $row['book'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];

                        $customer_contect = $row['customer_contect'];
                
                        $customer_email = $row['customer_email'];
                
                        $customer_address = $row['customer_address'];

                    
                        

                }else{
                    header("location:".SIT."admin/m-o.php");
                }

            }else{
                header("location:".SIT."admin/m-o.php");
            }
        ?>

        <form action="#" method='POST'>
    <table class="tbl-30">

    <tr>
        <td>Book name</td>
        <td><b><?php echo $book; ?></b></td>
    </tr>

    <tr>
        <td>Price</td>
        <td><b>$<?php echo $price; ?></b></td>
    </tr>

    <tr>
        <td>Qty</td>
        <td>
            <input type='number' name='qty' value='<?php echo $qty; ?>'>
        </td>
    </tr>

    <tr>
        <td>Status</td>
        <td>
            <select name='status'>
            <option <?php if($status=='Ordered'){echo "selected";} ?>value='Ordered'>Ordered</option>
            <option <?php if($status=='On-Delivery'){echo "selected";} ?>value='On-Delivery'>On-Delivery</option>
            <option <?php if($status=='Delivered'){echo "selected";} ?>value='Delivered'>Delivered</option>
            <option <?php if($status=='Cancelled'){echo "selected";} ?>value='Cancelled'>Cancelled</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Custmore Name</td>
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
       <td colspan='2'>
       <input type='hidden' name='id' value='<?php echo $id;?>'>    
        <input type='hidden' name='price' va;ue='<?php echo $price; ?>'>
        <input type='submit' name='submit' value='Update Order' class='btn-s'>
       </td>
    </tr>
    </table>
</form>
</div>
</div>

<?php 

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
     
       

        $status = $_POST['status'];
        $customer_name = $_POST['customer_name'];
        $customer_contect = $_POST['customer_contect'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        $sql2 = "UPDATE `order` SET `id`='[$id]',`book`='[value-2]',`price`='[value-3]',`qty`='[value-4]',`total`='[value-5]',`order_date`='[value-6]',`status`='[value-7]',`customer_name`='[$customer_name]',`customer_contect`='[value-9]',`customer_email`='[value-10]',`customer_address`='[value-11]' WHERE 0";

        $res2 = mysqli_query($conn, $sql2);

        echo $sql2; 

        if($res2==true){
            $_SESSION['update'] = '<div class="s">successfull update</div>';
            header("location:".SIT."admin/m-o.php");
        }else{
            $_SESSION['update'] = '<div class="e">successfull update</div>';
            header("location:".SIT."admin/m-o.php");
        }

    }

?>


   




<?php include('p/f.php');  ?>