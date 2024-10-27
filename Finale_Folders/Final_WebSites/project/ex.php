<?php include('p-f/menu.php')  ?>
<h1>Update Book</h1><br>

<?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql2 = "SELECT * FROM book WHERE id=$id";

            $res2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($res2);

            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $fectured = $row2['fectured'];
            $active = $row2['active'];



        }else{
            header('location:'.SIT.'admin/m-b.php');
        }
?>
 <form action='' method='POST' enctype='multipart/form-data'>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name='category' >
                            <?php
                                    $sql = "SELECT * FROM ca WHERE active='yes'";
                                    $res = mysqli_query($conn, $sql);

                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                                    while($row =mysqli_fetch_assoc($res)){
                                                        $category_title = $row['title'];
                                                        $category_id = $row['id'];                         
                                                            ?>
                                                           <option <?php if($current_category == $category_id){echo "selected";} ?>value="<?php echo $category_id; ?>">  <?php echo $category_title;  ?></option> 
                                                        <?php
                                                    }
                                    }else{
                                        echo "<option value='0'>category not avaliable</option>";
                                    }
                            ?>
                            
                        </select>
                    </td>
                </tr>

                    <tr>
                        <input type='submit' name='submit' value='update' >
                    </tr>

                                </form>
                <?php 
      
      if(isset($_POST['submit'])){

          //1 get all the details 
         
          $category_id  = $_POST['current_category'];
         


          //2 upload the image if selected

          //check whether upload or not
        

                      //3 remove the image if new image uploaded an

                      //remove img if avaliable
                     



                $sql3 = "UPDATE book SET
                   
                    `category_id`='$category_id' WHERE id=$id";


            $res3 = mysqli_query($conn, $sql3);

            if($res3==true){
                $_SESSION['update'] = '<div class="s">upload</div>';
                header('location:'.SIT.'admin/m-b.php');

            }else{
                $_SESSION['update'] = '<div class="e"> not upload</div>';
                header('location:'.SIT.'admin/m-b.php');


            }



            //redirect to 
           
        }
       

?>