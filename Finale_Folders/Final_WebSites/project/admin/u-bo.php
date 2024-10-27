<?php include("p/menu.php"); ?>

<div class="main">
    <div class="wrapper">
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
            <table class='tbl-30'>
                <tr>
                    <td>Title:</td>
                    <td><input type='text' name='title' value='<?php echo $title; ?>'></td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td><textarea name='description' cols='30' rows='5' ><?php echo $description; ?></textarea></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td><input type='number' name='price' value='<?php echo $price; ?>'></td>
                </tr>

                <tr>
                    <td>Current image</td>
                    <td>
                        <?php
                                if($current_image == ""){
                                    echo '<div class="e">image not avaliable</div>';
                                }else{
                                    ?>
                                    <img src='<?php echo SIT; ?>images/book/<?php echo $current_image; ?>' width='50px' height='20px'>
                                    <?php
                                }

?>
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td><input type='file' name='image'></td>
                </tr>

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
                    <td>Fectured:</td>
                    <td><input <?php if($fectured=='yes'){echo "checked";}?> type='radio' name='fectured' value='yes'>yes
                    <input <?php if($fectured=='no'){echo "checked";}?> type='radio' name='fectured' value='no'  >no</td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td><input <?php if($active=='yes'){echo "checked";} ?> type='radio' name='active' value='yes'>yes
                    <input <?php if($active=='no'){echo "checked";} ?> type='radio' name='active' value='no'>no</td>
</tr>

<tr>
    
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
       <input type='hidden' name='current_image' value='<?php echo $current_image; ?>'>
        
        <td><input type='submit' name='submit' value='update-book' class='btn-s'></td>
    
</tr>
            </table>
        </form>
        <?php 
      
        if(isset($_POST['submit'])){

            //1 get all the details 
            $id = $_POST['id'];
            $title = mysqli_real_escape_string($conn,$_POST['title']);
            $description = mysqli_real_escape_string($conn,$_POST['description']);
            $price = mysqli_real_escape_string($conn,$_POST['price']);
            $current_image =  $_POST['current_image'];
            $category_id  = mysqli_real_escape_string($conn,$_POST['category']);
            $fectured = mysqli_real_escape_string($conn,$_POST['fectured']);
            $active = mysqli_real_escape_string($conn,$_POST['active']);


            //2 upload the image if selected

            //check whether upload or not
            if(isset($_FILES['image']['name'])){
                    //button clicked
                    $image_name = $_FILES['image']['name'];  //new image

                    //file is avaliable or not
                    if($image_name!=''){
                        //image avaliable
                        $ext = end(explode('.', $image_name));
                        $image_name = 'category'.rand(0000,9999).'.'.$ext;

                        //get the source path
                        $src_path = $_FILES['image']['tmp_name'];

                        $dest_path = "../images/book/".$image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        //check image upload or nt
                        if($upload==false){
                            $_SESSION['upload'] = '<div class="e">not upload the img</div>';
                            header('location:'.SIT.'admin/m-b.php');
                            die();
                        }

                        //3 remove the image if new image uploaded an

                        //remove img if avaliable
                        if($current_image!=''){
                            //avaliable
                            $remove_path = "../images/book/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove==false){
                                $_SESSION['remove-failed'] = '<div class="e">not upload</div>';
                                header('location:'.SIT.'admin/m-b.php');
                                die();
                            }
                        }
                    }
                    else{
                        $image_name = $current_image;

                    }

            }else{
                $image_name = $current_image;
            }


            //4 update the book 
            $sql3 = "UPDATE book SET
                    `title`='$title',`description`='$description',`price`='$price',
                    `category_id`='$category_id',`fectured`='$fectured',`active`='$active',`image_name`='$image_name' WHERE id=$id";


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

    </div>

</div>





<?php  include("p/f.php");  ?>