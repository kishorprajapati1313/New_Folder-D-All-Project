<?php include("p/menu.php")   ?>
<div class='main'>
    <div class="wrapper">
    <h1>Manage Categroy</h1>

<br><br>
        <a href="add-cat.php" class="btn">ADD Catagroy</a><br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found'])){
            echo $_SESSION['no-category-found'];
            unset ($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }
        ?><br><br>

        <table class="tbl">
            <tr>
                <th>S.N</th>
                <th>title</th>
               <th>image</th>
                <th>featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
                <?php
                //get data from database
                $sql = "SELECT * FROM `ca` WHERE 1";     //excute query
              
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
                $sn=1;

                if ($count>0){
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id= $row['id'];
                        $title= $row['title'];
                        $image_name = $row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                        ?>
                         <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td> 
                            <td><?php 
                                   if($image_name==''){
                                    echo "<div class='e'>not image</div>";
                                   }else{
                                    ?>
                                    <img src='<?php echo "http://localhost/project/"; ?>images/ca/<?php echo $image_name; ?>' width='90px' height='40px'>
                                    <?php
                                   }
                             ?>
                            </td> 
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                            <a href="<?php echo "http://localhost/project/"; ?>admin/u-c.php?id=<?php echo $id; ?>" class="btn-s">Update category</a>
                             <a href="<?php echo "http://localhost/project/"; ?>admin/d-c.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-d"> Delete book</a>
                            </td>
                         </tr>
                         
                        <?php  

                    
                    }
                }
                else{
                    ?>
                    <tr>
                        <td colspan='6'><div class='e'>no categroy add..</div></td>
                    </tr>
                    <?php
                }
                ?>
           
            
        </table>

        </div>
</div>

<?php include("p/f.php")   ?>