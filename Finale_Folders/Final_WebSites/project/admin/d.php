<?php  //d.php means delete

//include constantent.php
include("../config/co.php");

//1 get command delet for the admin
 $id = $_GET['id'];

//2 creat sql query to delet admin
$sql = "DELETE FROM admin WHERE id=$id";

//execute the qurey
$res= mysqli_query($conn,$sql);

//check the query executed successfully or not
if($res==TRUE){//echo "Admin deleted";
    $_SESSION['delete'] = "<div class='s'>Admin deleted successfully</div>";
    header('location:'.SIT.'admin/manage-admin.php');

}else{//echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='e'>admin not deleted</div>";
    header('location:'.SIT.'admin/manage-admin.php');
}

//3 redirect to manage admin page with meassage (success/error)
?>