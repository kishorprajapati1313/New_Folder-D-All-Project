<?php include("p-f/menu.php");  ?>

<section class=' image1' >
    <div class="image7">
        <?php 
        //get the search keyword

        $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        
        ?>
       
        <h2>Book on your search<a href="#.php" class="white"> "<?php echo $search; ?>"</a> </h2>
       
        
        </div>
            </div>
        </a>
</section>

<section class="image3">
    <div class="image7">
    <h2 class="text">exploar book</h2>
    <?php
        

        //sql query to get book on s-keyword
        $sql = "SELECT * FROM book WHERE TITLE like '%$search%' OR description LIKE '%$description%'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count > 0){
            while($row=mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
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
                    <a href="o.php" class="btn p">order now</a>
                </div>
                </div>
                <?php

            }
        }else{
            echo '<div class="e">book not found</div>';
        }
?>

 </div>
<div class="clear">
                </div>
</div>
</section>




<?php include("p-f/f.php");  ?>