<?php include("p/menu.php")   ?>

<div class='main'>
    <div class="wrapper">
    <h1>Manage Order</h1>
    <?php
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    ?>
    <br><br>
        
        <table class="tbl">
            <tr>
                <th>S.N</th>
                <th>Book</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contect</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
                    //Get the data from the database
                    $sql = "SELECT * FROM `order` WHERE 1
                    ORDER BY  id DESC";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $sn=1;

                    if($count>0){

                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $book = $row['book'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contect = $row['customer_contect'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];
                            ?>
                    <tr>
                        <td><?php echo $sn++;  ?></td>
                        <td><?php echo $book;   ?></td>
                        <td><?php echo $price;   ?></td>
                        <td><?php echo $qty;   ?></td>
                        <td><?php echo $total;   ?></td>
                        <td><?php echo $order_date;   ?></td>

                        
                        <td><?php 
                        if($status=="order"){
                            echo "<lable  style='color:black;'>$status</lable>";
                        } elseif($status=="On-Delivery"){
                            echo "<label style='color : orange'>$status</label>";
                        }
                       
                        elseif($status=="Delivered"){
                            echo "<lable style='color: green;'>$status</lable>";

                        }elseif($status=="Canclled"){
                            echo "<lable style='color:red;'>$status</lable>";

                        }else{
                            echo "<lable style='color:orange;'>$status</lable>";

                        }
                        
                        ?></td>

                        <td><?php echo $customer_name;   ?></td>
                        <td><?php echo $customer_contect;   ?></td>
                        <td><?php echo $customer_email;   ?></td>
                        <td><?php echo $customer_address;   ?></td>
                        <td>
                            <a href="<?php echo SIT;?>admin/u-o1.php?id=<?php echo $id; ?>" class=" btn-s">Update Order</a>
                            
                        </td>
                    </tr>

                            <?php



                        }
                    }else{
                        echo "<tr><td colspan='12' class='e'>Order not avaliable</td></tr>";
                    }

?>
           
            
            
        </table>

</div>
</div>


<?PHP INCLUDE('p/f.php'); ?>