<?php include('p-f/menu.php')  ?>

<section class="image1 text">
    <div class="image7">
    <form action="<?php echo SIT; ?>b-s.php" method='POST'>
        <input type="search" name="search" placeholder="search book">
        <input type="submit" name="submit" value="search" class="btn p">
    </form>
</div>
</section>

<?php
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
?>
<section class="image2">
    <div class="image7">
        <h2 class="text">Category book </h2>

        <?php
            $sql="SELECT * FROM ca WHERE active='yes' AND featured='yes' LIMIT 3";

            $res = mysqli_query($conn,$sql);
            
            $count = mysqli_num_rows($res);

            if($count>0){

                    while($row=mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            ?>
                                <a href="<?php echo SIT; ?>c-b.php?category_id=<?php echo $id; ?>">
                                    <div class="box float">
                                        <?php
                                                    if($image_name==''){
                                                        echo "<div class='e'>image not available</div>";
                                                    }else{
                                                          ?>

                                                            <img src="<?php echo SIT;?>images/ca/<?php echo $image_name; ?>" class="img curve">
                                                        
                                                        <?php
                                                    }
                                        ?>
                                      
                                       <h3 class="floating white"><?php echo $title;  ?></h3>
                                    </div></a> 

                            <?php

                    }

            }else{
                    echo '<div class="e">category not added</div>';

            }
        ?>

        <div class="clear">
        </div>
</div>
</section>


<section class="image3">
    <div class="image7">
    <h2 class="text">exploar book</h2>


        <?php
            $sql2 = "SELECT * FROM book WHERE active='yes' AND fectured='yes' LIMIT 6 ";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){

            while($row2=mysqli_fetch_assoc($res2)){
                $id = $row2['id'];
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $image_name= $row2['image_name'];
                ?>
            <div class="food">
                <div class="fimg">
                    <?php
                            if($image_name==''){
                                echo '<div class="e">image not avaliable</div>';
                            }else{
                                ?>
                                <img src="<?php echo SIT; ?>images/book/<?php echo $image_name; ?>" alt="kjevj" class="ph"></img>
                                <?php
                            }
                    ?>
                </div>

                <div class="fde">
                    
                    <h4><?php echo $title; ?></h4>
                    <p>$<?php echo $price; ?></p>
                    <p>
                        <?php echo $description; ?>
                    </p>
                    <a href="<?php echo SIT; ?>o.php?book_id=<?php echo $id; ?>" class="btn p">order now</a>
       
                </div>
                </div>
<?php
                        }
                        }else{
                            echo '<div class="e">Book not avaliable </div>';
                        }
?>
 </div>

 
<div class="clear">
                </div>
                <p class='text m'>  <a href="b.php">See All Book</a>
         
         </p>
</section>


<?php include('p-f/f.php')    ?>