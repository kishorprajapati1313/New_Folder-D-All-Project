<?php
include("../config/co.php");

   if(isset($_GET['id']) && isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name !='' ){
            $path="../images/book/".$image_name;

            $remove = unlink($path);

            if($remove == false){
                $_SESSION['upload'] = "<div class='e'>fail to remove </div>";
                header ('location:'.SIT.'admin/m-b.php');
                die();
            }
        }

        $sql = "DELETE FROM book WHERE id=$id";

        $res= mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = "<div class='s'>successfully deleted food</div>";
            header ('location:'.SIT.'admin/m-b.php');
        }else{
            $_SESSION['delete'] = "<div class='e'>fail to delete</div>";
            header ('location:'.SIT.'admin/m-b.php');
        }
   }
   else{
        $_SESSION['un'] = "<div class='e'>unauthorize access</div>";
        header ('location:'.SIT.'admin/m-b.php');
   }


?>