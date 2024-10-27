<?php include('p/menu.php'); ?>

<div class='main'>
    <div class="wrapper">
        <h1 >ADD Book</h1><br><br>
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
        <form method='POST' action='' enctype='multipart/form-data'>
            <table class='tbl-30'>
             <tr>                                         <td>Title:</td>
                    <td>
                        <input type='text' name='title' placeholder='enter book nmae'>
                    </td>
                </tr>

                <tr>                                     <td>Description:</td>
                    <td >
                        <textarea name='description' cols='20' rows='6' placeholder='description of book'>
                    </textarea>    </td>
                </tr>

                <tr>                                     <td>Price:</td>
                    <td>     <input type='number' name='price'>                                             </td>
                </tr>

                <tr>                              <td>Select image</td>

                    <td>        <input type='file' name='image' >                                                      </td>
                </tr>
                <tr>                                <td>Category</td>
                    <td><select name='category'>
                        <?php
                        //category from database
                        $sql="SELECT * FROM ca WHERE active='yes'";
                        $res=mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $category_id = $rows['id'];
                                $category_title=$rows['title'];
                                ?>
                                <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                <?php  
                            }

                        }else{
                            ?>
                            <option value='0'>no category found</option>
                            <?php
                        }

                        ?>
                     

            </select>                                                                                          </td>
        </tr>
        <tr>                                    <td>Fectured</td>
        <td> <input type='radio' name='fectured' value='yes'>yes
            <input type='radio' name='fectured' value='no'>no                                                   </td>
        </tr>
        <tr>                                    <td>Active</td>
        <td> <input type='radio' name='active' value='yes'>yes
            <input type='radio' name='active' value='no'>no                                                   </td>
        </tr>
        <tr>
            <td COLSPAN='2'><input type='submit' name='submit' value='ADD Book' class='btn-s'></td>
        </tr>

        </table>
        </form>

       <?php
        if(isset($_POST['submit'])){
           $title = mysqli_real_escape_string($conn,$_POST['title']);
           $description= mysqli_real_escape_string($conn,$_POST['description']);
           $price =  mysqli_real_escape_string($conn,$_POST['price']);
           $category_id=  mysqli_real_escape_string($conn,$_POST['category']);

           if(isset($_POST['fectured'])){
            $fectured = $_POST['fectured'];
           }else{
            $fectured = "no";
           }
           if(isset($_POST['active'])){
            $active= $_POST['active'];
           }else{
            $active = "no";
           }
           //get the image button clicked or not
           if(isset($_FILES['image']['name'])){
              $image_name = $_FILES['image']['name'];

                //image selected or not
                    if($image_name!=""){
                        //image selected
                        $ext = end(explode('.',$image_name));  //old image name would be first.jpg

                        $image_name = "book-name".rand(0000,9999).".".$ext;   //new name will be "book name -890.jpg"

                        //upload the image-name
                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/book/".$image_name;

                            //image move to our folder
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false){
                            $_SESSION['upload'] = "<div class='e'>not upload the image</div>";
                            header('location:'.SIT.'admin/add-book.php');
                            die();
                        }
                    }
           }else{
            $image_name="";
           }

           //Now we have insert data into the data base
           $sql2="INSERT INTO `book`( `title`, `description`, `price`, `image_name`, `category_id`, `fectured`, `active`) VALUES
            ('$title','$description','$price','$image_name','$category_id','$fectured','$active')";


            $res2 = mysqli_query($conn,$sql2);
            if($res2==true){
                $_SESSION['add']="<div class='s'>book added successfully</div>";
                header('location:'.SIT.'admin/m-b.php');
            } else{
                $_SESSION['add']="<div class='s'>book added fail</div>";
                header('location:'.SIT.'admin/m-b.php');
            }
        }
       ?>
       
    </div>

</div>

<?php include('p/f.php');  ?>