<?php include("p-f/menu.php");  ?>     
       
    <section class="image1 text">
    <div class="image7">
    <form action="<?php echo SIT; ?>b-s.php" method='POST'>
        <input type="search" name="search" placeholder="search book">
        <input type="submit" name="submit" value="search" class="btn p">
    </form>
</div>
</section>

<section class="image3">
    <div class="image7">
    <h2 class="text">exploar book</h2>

    <?php
        $sql = "SELECT * FROM book WHERE active='yes'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
if($count>0){
    while($row = mysqli_fetch_assoc($res)){
        $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name= $row['image_name'];
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
</div>
</section>




<?php include("p-f/f.php");  ?>