<?php include('p-f/menu.php')  ?>

<section class="image2">
    <div class="image7">
        <h2 class="text">Category book </h2>
            <?php

            $sql="SELECT * FROM ca WHERE active='yes' ";
            $res=mysqli_query($conn, $sql);
            $count= mysqli_num_rows($res);

            if($count>0){
                while($rows = mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];
                    $active = $rows['active'];
                    ?>
                <a href="<?php echo SIT; ?>c-b.php?category_id=<?php echo $id; ?>">
                     <div class="box float">
                         <?php 
                            if($image_name == ''){
                                echo "<div class='e'>image not available</div>";
                       }else{

                     ?>
                            <img src='<?php echo SIT; ?>images/ca/<?php echo $image_name; ?>' class="img curve">
                     <?php
        } 
         ?>

        <h3 class="floating1 white"><?php echo $title; ?></h3>
        </div>

    </a>
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