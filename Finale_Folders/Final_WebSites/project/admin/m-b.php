<?php include("p/menu.php")   ?>

<div class='main'>
    <div class="wrapper">
    <h1>Manage book</h1>
    <br><br>
        <a href="<?php echo SIT;?>admin/add-book.php" class="btn">ADD Book</a><br><br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['un'])){
            echo $_SESSION['un'];
            unset($_SESSION['un']);
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        
        ?><br>

        <table class="tbl">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>category</th>
                <th>Fectured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php
            $sql  = "SELECT * FROM book";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn=1;
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $category_id= $row['category_id'];
                    $fectured = $row['fectured'];
                    $active = $row['active'];
                    ?>
                          <tr>
                             <td><?php echo $sn++; ?></td>
                             <td><?php echo $title; ?></td>
                             <td><?php echo $price; ?></td>
                             <td><?php 
                                   if($image_name==''){
                                    echo "<div class='e'>not image</div>";
                                   }else{
                                    ?>
                                    <img src='<?php echo SIT; ?>images/book/<?php echo $image_name; ?>' width='90px' height='40px'>
                                    <?php
                                   }
                             ?>
                            </td>
                            <td><?php echo $category_id; ?></td>
                             <td><?php echo $fectured; ?></td>
                             <td><?php echo $active; ?></td>
                <td>
                    <a href="<?php echo "http://localhost/project/"; ?>admin/u-bo.php?id=<?php echo $id; ?>" class="btn-s">Update book</a>
                    <a href="<?php echo "http://localhost/project/"; ?>admin/d-b.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-d"> Delete book</a>
                </td>
            </tr>
                    <?php
                }


            }else{
                echo "<tr><td colspan='7' class='e'>Book not add </td></tr>";
            }


             ?>
           
           
          
        </table>

</div>
</div>

<?php include("p/f.php")   ?>