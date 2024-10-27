<?php
include("../co/config.php");

function suggestEnrollmentNumber($current_en_num, $conn) {
    $query = "SELECT MAX(en_num) as max_en_num FROM studen";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $max_en_num = $row['max_en_num'];

    if ($max_en_num >= $current_en_num) {
        $suggest_en_num = $max_en_num + 1;
        return $suggest_en_num;
    } else {
        return $current_en_num;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
<div class="form-container">
  <form class="my-form" method="post">
    <h2>Student Registration Form</h2>
    <table>
      <tr>
        <td class="semester-label">Semester:</td>
        <td class="semester-value"><?php $se_id = isset($_POST['se_id']) ? $_POST['se_id'] : (isset($_GET['se_id']) ? $_GET['se_id'] : ''); echo $se_id; ?></td>
        <input type="hidden" name="se_id" value="<?php echo $se_id; ?>"> <!-- Add this hidden field -->
      </tr>
      <tr>
        <td><label for="name">First Name:</label></td>
        <td><input type="text" name="fname"></td>
      </tr>
      <tr>
        <td><label for="email">Second Name:</label></td>
        <td><input type="text" name="sname"></td>
      </tr>
      <tr>
        <td><label for="message">Last Name:</label></td>
        <td><input type="text" name="lname"></td>
      </tr>
      <tr>
        <td>Gender:</td>
        <td class="radio-label">
          <input type='radio' name='gender' value='male' required>male</td>
          <td><input type='radio' name='gender' value='female' required>female</td>
        </td>
      </tr>
      <tr>
        <td><label for="number">Enrollment Number:</label></td>
        <td><input type="number" name="en_num" placeholder="<?php echo suggestEnrollmentNumber('', $conn); ?>"></td>
      </tr>
    </table>


    <?php
    if(isset($_POST['submit'])){
        $fname      = $_POST['fname'];
        $lname      = $_POST['lname'];
        $sname      = $_POST['sname'];
        $gender     = $_POST['gender'];
        $se_id      = $_POST['se_id']; // Retrieve the se_id value from the hidden field
        $full_name  = $fname . ' ' . $sname . ' ' . $lname;
        $en_num     = $_POST['en_num'];

        $check = "SELECT COUNT(*) as count FROM studen WHERE en_num = '$en_num'";
        $res2  = mysqli_query($conn, $check);
        $row   = mysqli_fetch_assoc($res2);
        $count = $row['count'];

        if($count > 0){
            $suggest_en_num = suggestEnrollmentNumber($en_num, $conn);
            echo "<p class='message error-message'>Error: Enrollment number already exists.</p>";
            echo "<div class='suggest-container'>Suggested Enrollment Number: <span class='suggested-en-num'>$suggest_en_num</span></div>";
        } else {
            $sql = "INSERT INTO studen SET fname='$fname', sname='$sname', lname='$lname', full_name='$full_name', gender='$gender', en_num='$en_num'";
            $res = mysqli_query($conn, $sql);

            if ($se_id > 1) {
              $sql = "UPDATE studen set se_id='$se_id'  WHERE en_num='$en_num'";
              $res = mysqli_query($conn, $sql);
              header("location:".SIT."admin/student.php");
              exit(); // Add this line to stop further execution of the code
          }

            if($res){
                echo "<p class='message success-message'>Student added successfully</p>";
                header("location:".SIT."admin/ST-form.php");
            } else {
                echo "<p class='message error-message'>Error: not added successfully</p>";
                header("location:".SIT."admin/ST-form.php");
            }
        }
    }
    ?>

    <div class="submit-container">
      <button class="submit-button" name="submit">Submit</button>
      <button class="new-button" name="new-button" style="float:right "><a href="<?php echo SIT; ?>admin/student.php">Back Page</a></button>
    </div>
  </form>
</div>

</body>
</html>

