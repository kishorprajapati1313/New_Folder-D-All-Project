
 <?php include('p/menu.php');     //u stand for upadate admin ?>
<div class='main'>
<div class='wrapper'>
    <h1>Update Admin</h1><br><br>
    <?php 
        //get id of selected admin 
        $id = $_GET['id'];

        //create sql query to g et the details
        $sql = "SELECT * FROM admin WHERE id=$id";

        //execute query
        $res= mysqli_query($conn,$sql);

        //check the query is executed or not
        if($res==true){   // check the data is available or not
            $count=mysqli_num_rows($res);
            //check we have admin data or not
            if($count==1){
                //get the details
                //echo "admin avaliable";
                $row=mysqli_fetch_assoc($res);
                $name=$row['name'];
                $username=$row['username'];

            }else{
                //redirect to manage admin page
                header('location:'.SIT.'admin/manage-admin.php');
            }
            

        }

    ?>

    <form action='' method='POST'>
    <table class='tbl-30'>
    <tr>
                <td>Full name:</td>
                <td><input type="text" name="name" value='<?php echo $name;?>'></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name='username' value='<?php echo $username;?>'></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type='hidden' name='id' value='<?php echo $id ?>'>
                    <input type='submit' name='submit' value='update admin' class='btn-s'>
                </td>
            </tr>
</table>
</form>

</div>
</div>

<?php 
//check submit butten is clicked or not
if(isset($_POST['submit'])){
    //echo "butten clicked";  //get the value from form to update
     $id = mysqli_real_escape_string($conn,$_POST['id']);
     $name= mysqli_real_escape_string($conn,$_POST['name']);
     $username= mysqli_real_escape_string($conn,$_POST['username']);
    //sql query to update admin
    $sql = "UPDATE admin SET
    name='$name',
    username ='$username'
    WHERE id='$id' 
    ";

    //execute query
    $res=mysqli_query($conn, $sql);

    if($res==true){
        $_SESSION['update']= "<div class='s'>Admin updated successfully</div>";
        header('location:'.SIT.'admin/manage-admin.php');
    }else{
        $_SESSION['update']= "<div class='e'>Admin updated fail</div>";
        header('location:'.SIT.'admin/manage-admin.php');

    }

}


?>
<?php include('p/f.php');?>

