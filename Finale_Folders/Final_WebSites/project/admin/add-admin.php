<?php include("p/menu.php")  ?>


<div class="main">
    <div class="wrapper">
        <h1>Add Admin</h1>   <br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>

        <form action="" method="post">
        <TABLE class="tbl-30">
            <tr>
                <td>Full name:</td>
                <td><input type="text" name="name" id='full_name' placeholder="enter your name"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name='username' placeholder="enter your username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name='password' placeholder="enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type='submit' name='submit' value='add admin' class='btn-s'>
                </td>
            </tr>
        </TABLE>


        </form>
    </div></div>
</div>



<?php include("p/f.php")   ?>

<?php
if(isset($_POST['submit']))
{
    // get data from the form
    $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
   
    //input data into database
    $sql = "INSERT INTO admin SET
        name='$name',
        username='$username',
        password='$password'
    ";
    //GO TO CONSTANT.PHP
    //excuting and saving into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());


    //cheack data inserated and display meesage
    if($res==TRUE){
       $_SESSION['add'] = "Admin added successfully";
        header("location:".SIT.'admin/manage-admin.php');
    }else{
        $_SESSION['add'] = "Admin added fail";
        header("location:".SIT.'admin/add-admin.php');
    }

}


?>

