<?php include('p/menu.php'); ?>
<div class='main'>
    <div class='wrapper'>
        <h1>Update Category</h1><br><br>

        <?php
         if(isset($_GET['id'])){
            $id=$_GET['id'];
         $sql= "SELECT * FROM ca WHERE id=$id";
            $res = mysqli_query($conn, $sql);
           if($res==true){
            $count = mysqli_num_rows($res);

            if($count==1){
                $row = mysqli_fetch_assoc($res);
                
                $title= $row['title'];
                $current_image = $row['image_name'];
                $featured= $row['featured']; 
                $active= $row['active'];


            }else{
                $_SESSION['no-category-found']= "<div class='e'>category not found</div>";
                header('location:'.SIT.'admin/m-c.php');
            }
        }
    
        }
        else{

            header('location:'.SIT.'admin/m-c.php');
        }
    
        ?>
        <form action='' method='POST'  enctype='multipart/form-data'>
        <table class='tbl-30'>
            <tr>
                <td>title</td><td><input type='text' name='title' value='<?php echo $title; ?>'></td>
            </tr>

            <tr>
                    <td>Current image</td>
                    <td>
                        <?php
                                if($current_image == ""){
                                    echo '<div class="e">image not avaliable</div>';
                                }else{
                                    ?>
                                    <img src='<?php echo "http://localhost/project/"; ?>images/ca/<?php echo $current_image; ?>' width='50px' height='20px'>
                                    <?php
                                }

?>
                    </td>
                </tr>

                <tr>
                    <td>Selet Image:</td>
                    <td><input type='file' name='image'></td>
                </tr>


            <tr>
                <td>featured</td><td>
                    <input <?php if($featured=='yes'){echo "checked";}?> type='radio' name='featured' value='yes'>yes
                    <input <?php if($featured=='no'){echo "checked";}?> type='radio' name='featured' value='no'>no
                </td>
            </tr>
            <tr>
                <td>Active</td><td>
                    <input  <?php if($active=='yes'){echo "checked";}?> type='radio' name='active' value='yes'>yes
                    <input   <?php if($active=='no'){echo "checked";}?> type='radio' name='active' value='no'>no
                </td>
            </tr>
            <tr>
                <td>
                <input type='hidden' name='id' value='<?php echo $id;?>'>    
                <input type='hidden' name='current_image' value='<?php echo $current_image; ?>'>
                <input type='submit' name='submit' value='update-category' class='btn-s'></td>
            </tr>

        </table>
        </form>
    </div>
</div>
<?php 
if (isset($_POST['submit']))
{
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $title= mysqli_real_escape_string($conn,$_POST['title']);
    $current_image = $_POST['current_image'];
    $featured= mysqli_real_escape_string($conn,$_POST['featured']); 
    $active= mysqli_real_escape_string($conn,$_POST['active']);

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

            $dest_path = "../images/ca/".$image_name;

            $upload = move_uploaded_file($src_path, $dest_path);

            //check image upload or nt
            if($upload==false){
                $_SESSION['upload'] = '<div class="e">not upload the img</div>';
                header('location:'.SIT.'admin/m-c.php');
                die();
            }

            //3 remove the image if new image uploaded an

            //remove img if avaliable
            if($current_image!=''){
                //avaliable
                $remove_path = "../images/ca/".$current_image;
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

    $sql="UPDATE ca SET 
    featured='$featured',
    active='$active',
    title='$title',
    image_name='$image_name'
    WHERE id=$id";

         $res = mysqli_query($conn, $sql);
         if($res==true){
            $_SESSION['update']= "<div class='s'>category updated successfully</div>";
            header('location:'.SIT.'admin/m-c.php');
        }else{
            $_SESSION['update']= "<div class='e'>category updated fail</div>";
            header('location:'.SIT.'admin/m-c.php');
    
        }
    

}

?>

<?php include('p/f.php');  ?>