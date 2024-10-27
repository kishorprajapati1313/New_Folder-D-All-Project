<?php include("p-f/menu.php");  ?>

<?php
        if(isset($_GET['book_id'])){
            $book_id=$_GET['book_id'];

            //get the details from the book

            $sql = "SELECT * FROM book WHERE id=$book_id";

            $res= mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1){

                $row = mysqli_fetch_assoc($res);
                $title= $row['title'];
                $price= $row['price'];
                $image_name= $row['image_name'];
                

            }else{
                //book not avaliable
                header('location:'.SIT);
            }

        }else{
                header('location:'.SIT);

        }

?>

<br>

<section class='color' >
    <div class="image7">
        
        
       
        <h2 class='text white'>Fill the form to confirm your order</h2>

        <form action='#' class='order' method='post'>

        <div class="image7">

            <fieldset>
                <legend>
    <h2 class="text color1">Select Book</h2>
    </legend>
   
       <div class="fimg">
        <?php
        
        if($image_name==''){
            echo '<div class="e">image not valiable</div>';

        }else{
            ?>
            <img src="<?php echo SIT; ?>images/book/<?php echo $image_name; ?>" alt="kjevj" class="ph"></img>
            <?php
        }

        ?>
       
       </div>
       <div class="fde1">
        <h4><?php echo $title; ?></h4>
        <input type='hidden' name='book' value='<?php echo $title; ?>'>

        <p>$<?php echo $price ?></p>
        <input type='hidden' name='price' value='<?php echo $price; ?>'>
       <div>Quantity</div>

      <td><input type='number' name='qty' class='input' value='1' required></td>

       <br><br>
       </fieldset><br>
       <br>

       <fieldset>
        <table>
            <legend class='le'>Delivery Details</legend>
            <div class='input1'>Full name</div>
            <input type='text' name='fname' placeholder='E.G. kishor prajapati' class='input1' required>   

            <div class='input1'>Phone number</div>
            <input type='tel' name='con' placeholder='E.G. 8989xxxxxx' class='input1' required>

            <div class='input1'>Email</div>
            <input type='email' name='email' placeholder='E.G. kis....@gmail.com' class='input1' required>

            <div class='input1'>Address</div>
            <textarea name='add' row='10' cols='30  ' placeholder='E.G. street, city, country' required></textarea>
            <div>

            <input type='submit' name='submit' value='Confirm Order' class='btn p '>
            </div>
       </fieldset>
       </table>
       </form>
       
       <?php
       if(isset($_POST['submit'])){
        
        $book = mysqli_real_escape_string($conn,$_POST['book']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        $qty = mysqli_real_escape_string($conn,$_POST['qty']);

        $total = $price * $qty;

        $order_date = date("y-m-d h:i:sa");
        $status = "order"; //type of status    ordered   on-delivery  cancled  delivered

        $customer_name = mysqli_real_escape_string($conn,$_POST['fname']);

        $customer_contect = mysqli_real_escape_string($conn,$_POST['con']);

        $customer_email = mysqli_real_escape_string($conn,$_POST['email']);

        $customer_address = mysqli_real_escape_string($conn,$_POST['add']);

        //save the order on database

        $sql2 = "INSERT INTO `order`( `book`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contect`, `customer_email`, `customer_address`) 
        VALUES ('$book',$price,$qty,'$total','$order_date','$status','$customer_name','$customer_contect','$customer_email','$customer_address')";
        
        $res2 = mysqli_query($conn, $sql2);

        if($res2==true){
                $_SESSION['order'] = '<div class="s text">book order success</div>';
                header('location:'.SIT);

        }else{
            //fail to send the order
            $_SESSION['order'] = '<div class="e text">failed the order</div>';
                header('location:'.SIT);

        }


       }
   
   

?>
       
        </div> 
       
</section>


<?php include("p-f/f.php");  ?>