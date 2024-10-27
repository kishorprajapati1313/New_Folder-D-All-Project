<?php include('p-f/menu.php')  ?>
<?php 
        if(isset($_GET['category_id'])){
            $category_id = $_GET['category_id'];

            $sql = "SELECT title FROM ca WHERE id=$category_id";  

            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);

            $c_title = $row['title'];

        }else{
                header('location:'.SIT);
        }
?>

<section class='image1' >
    <div class="image7">
        <h2>Book on your search<a href="#.php" class="white"> "<?php echo $c_title; ?>"</a> </h2>
       
        
        </div>
            </div>
        </a>
</section>

<section class="image2">
    <div class="image7">
        <h2 class="text">Category book </h2>

        <?php
        
        $sql2= "SELECT * FROM book WHERE category_id=$category_id";

        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res);

        if($count2>0){
            while($row2 = mysqli_fetch_assoc($res2)){
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
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
            echo "<div class='e'>not the categiry avaliable</div>";
        }

        ?>
          


        
        
        <div class="clear">
        </div>
</div>
</section>

<?php include('p-f/f.php');   ?>