<?php 
include('../config/co.php');
   
if(isset($_GET['id']) && isset($_GET['image_name'])){

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name !='' ){
        $path="../images/ca/".$image_name;

        $remove = unlink($path);

        if($remove == false){
            $_SESSION['upload'] = "<div class='e'>fail to remove </div>";
            header ('location:'.SIT.'admin/m-c.php');
            die();
        }
    }

        $sql = "DELETE FROM `ca` WHERE id=$id";

        $res=mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] ="<div class='s'>deleted successfully</div>";
            header('location:'.SIT.'admin/m-c.php');

        }else{
            $_SESSION['delete'] ="<div class='e'>deleted failed</div>";
            header('location:'.SIT.'admin/m-c.php');

        }
    }

?>
