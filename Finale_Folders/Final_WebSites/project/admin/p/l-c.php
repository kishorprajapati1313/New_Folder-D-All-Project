<?php
if(!isset($_SESSION['user'])){
$_SESSION['no-login-message']='<div class="e text">please login to access admin</div>';
header('location:'.SIT.'admin/login.php');
}

?>