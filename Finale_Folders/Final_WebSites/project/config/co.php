<?php
//start session
session_start();


//create constant
    define('SIT','http://localhost/project/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','booking');
 

//excute query and save in database     (res= if true value=true)
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD)  or die(mysqli_error());  //$conn= connectdatabase
    $db_select = mysqli_select_db($conn , DB_NAME) or die(mysqli_error());


?>