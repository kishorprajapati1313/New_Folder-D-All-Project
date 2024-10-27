<?php
include('../config/co.php');
session_destroy();

header('location:'.SIT.'admin/login.php');
?>