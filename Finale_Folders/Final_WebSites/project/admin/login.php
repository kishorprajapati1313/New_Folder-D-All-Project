<?php include("../config/co.php");  ?>

<html>
<head><title>login booking system</title>
<link rel='stylesheet' href='../css/admin.css'>
</head>
<body>
    <div class='login'>
    <h1 class='text'>Login</h1><br>
    <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message'])){
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
    ?>
    
    <form action='' method='post' class='text'>
        username:<br><input type='text' name='username' placeholder='enter your username'><br><br>
        password:<br><input type='password' name='password' placeholder='enter your password'><br><br>
        <input type='submit' name='submit' value='login' class='btn'><br><br>
    </form>

    <p class='text'>created by <a href='#'>kishor</a></p>
    

</div>


<?php
    if(isset($_POST['submit'])){
         $username = mysqli_real_escape_string($conn, $_POST['username']);
         $raw_password =   md5($_POST['password']);

         $password =  mysqli_real_escape_string($conn, $raw_password);

         $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
         $res=mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);
         if($count==1){
            $_SESSION['login']="<div class='s'>login successfull</div>";
            $_SESSION['user']=$username;
            header('location:'.SIT.'admin/');
         }else{
            $_SESSION['login']="<div class='e'>login fail</div>";
            header('location:'.SIT.'admin/login.php');


         }
    }

?>

</body>
</html>


