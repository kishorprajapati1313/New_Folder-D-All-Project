<?php include("co/config.php");  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Online Exam Results</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Online Exam Results</h1>
    <form method="POST" action="">
      <label for="examNumber">Enter your exam number:</label>
      <input type="text" id="examNumber" name="e_num" pattern="[0-9]+" placeholder="Please enter only exam number values" required>
      <button type="submit" name='submit' class="cool-button">Get Results</button>
    </form>
  </div>
</body>
</html>




<?php
    if(isset($_POST['submit'])){
      $e_num = $_POST['e_num'];

      header("location:".SIT."mark.php?e_num=$e_num");
      
    }




?>





