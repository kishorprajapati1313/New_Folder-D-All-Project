<?php 
include("../co/config.php");

        if(isset($_GET['su_id'])){
           $su_id = $_GET['su_id'];

           $sql = "DELETE from subjects where su_id='$su_id' ";
           $res = mysqli_query($conn, $sql);

           if($res){
            header("location:".SIT."admin/subject.php");
           }else{
            echo "<p class='error-message'>Error: Subject not deleted.</p>";
            header("location:".SIT."admin/SU_delete.php");
           }
            
        }



?>