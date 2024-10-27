<?php include('p/menu.php') ?>
<div class='main'>
    <div class='wrapper'>
        <h1>ADD category</h1><br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
       
        ?><br><br>
        <form action='' method='POST' enctype='multipart/form-data'>
            <table class='tbl-30'>
                <tr>
                    <td>Title: </td>
                    <td><input type='text' name='title'  placeholder='caregory title'></td>
                </tr>

                <tr>                              <td>Select image</td>

<td>        <input type='file' name='image' >                                                      </td>
</tr>
               
                <tr>
                    <td>Featured:</td>
                    <td><input type='radio' name='featured' value='yes'>yes  
                    <input type='radio' name='featured' value='no'>no       </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input type='radio' name='active' value='yes'>yes
                    <input type='radio' name='active' value='no'>no       </td>
                </tr>

                <TR>
                    <td colspan='2'><input type='submit' name='submit' value='ADD category' class='btn-s'>
                    </td>
                </TR>
            </table>

        </form>
        <?php 
            if(isset($_POST['submit'])){
                //echo 'clicked';

                //get value 
                $title= mysqli_real_escape_string($conn,$_POST['title']);

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
      
                      //image selected or not
                          if($image_name!=""){
                              //image selected
                              $ext = end(explode('.',$image_name));  //old image name would be first.jpg
      
                              $image_name = "category".rand(0000,9999).".".$ext;   //new name will be "book name -890.jpg"
      
                              //upload the image-name
                              $src = $_FILES['image']['tmp_name'];
      
                              $dst = "../images/ca/".$image_name;
      
                                  //image move to our folder
                              $upload = move_uploaded_file($src, $dst);
      
                              if($upload==false){
                                  $_SESSION['upload'] = "<div class='e'>not upload the image</div>";
                                  header('location:'.SIT.'admin/add-ca.php');
                                  die();
                              }
                          }
                 }else{
                  $image_name="";
                 }

                if(isset($_POST['featured'])){
                    //get value
                    $featured = $_POST['featured'];
                }else{   //set defualt value
                    $featured='no';
                }
                if(isset($_POST['active'])){
                    //get value
                    $active = $_POST['active'];
                }else{
                    $active = 'no';
                }
    
              

                // creat SQL query to inser database
                $sql = " INSERT INTO `ca` SET
                title='$title',
                featured = '$featured',
                image_name = '$image_name',
                active = '$active'
               
                ";
                //execute the query and save in database
                $res = mysqli_query($conn, $sql);
                //check query executed or not
                if($res==true){
                    $_SESSION['add']="<div class='s'>category successfully.</div>";
                    header('location:'.SIT.'admin/m-c.php');
                }else{
                    $_SESSION['add']="<div class='e'>category fail.</div>";
                    header('location:'.SIT.'admin/add-cat.php');

                }
            }
        ?>


    </div>

</div>



<?php include('p/f.php')  ?>

