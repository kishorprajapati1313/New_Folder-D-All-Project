<?php include("p/menu.php");  ?>
<div class='main'>
    <div class='wrapper'>
        <h1>change password</h1><br><br>
        <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }?>
        <form action='' method='POST'>
            <table class='tbl-30'>
                <tr>
                    <td>Old password:</td>
                    <td><input type='password' name='c_p' placeholder='old password'></td>
                </tr>
                <tr>
                    <td>New password:</td>
                    <td><input type='password' name='n_p' placeholder='new password'></td>

                </tr>
                <tr>
                    <td>Conform_password</td>
                    <td>
                        <input type='password' name='co_p' placeholder='conform password'>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type='hidden' name='id' value='<?php echo $id;?>'>
                        <input type='submit' name='submit' value='change password' class='btn-s'>
                    </td>
                </tr>
            </table>


        </form>

    </div>
</div>


<?php include("p/f.php");  ?>
<?php 
        if(isset($_POST['submit'])){
            // get the from form
            $id= mysqli_real_escape_string($conn,$_POST['id']);
            $c_p= mysqli_real_escape_string($conn,md5($_POST['c_p']));
            $n_p= mysqli_real_escape_string($conn,md5($_POST['n_p']));
            $co_p= mysqli_real_escape_string($conn,md5($_POST['co_p']));

            //check the user with current id and password exists or not
            $sql="SELECT * FROM admin WHERE id=$id AND password='$c_p'";

            //execute the query
            $res= mysqli_query($conn, $sql);
            if($res==true){
                $count=mysqli_num_rows($res);
                if($count==1){
                    //echo "user found";
                    if($n_p==$co_p){
                        //echo 'password is match';
                        $sql2="UPDATE admin SET
                        password='$n_p'
                        WHERE id = $id
                        ";
                        $res2=mysqli_query($conn, $sql2);

                        if($res2==true){
                            $_SESSION['change-pwd'] ="<div class='s'>password change successfully</div>";
                            header('location:'.SIT.'admin/manage-admin.php');   
                        }else{
                            $_SESSION['change-pwd'] ="<div class='e'>password change fail</div>";
                            header('location:'.SIT.'admin/manage-admin.php'); 
                        }
                    }else{
                        $_SESSION['pwd-not-match'] ="<div class='e'>password not match</div>";
                        header('location:'.SIT.'admin/manage-admin.php');   
                    }

                }else{
                    $_SESSION['user-not-found'] ="<div class='e'>user not found</div>";
                    header('location:'.SIT.'admin/manage-admin.php');
                }
            }

            // cheak the new password and conform new password match

            //change password if all above is true
        }
?>