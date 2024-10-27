<?php include("../co/config.php"); ?>

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
            <table class='subject'>
                <tr>
                    <td><label for="name">Subject Name:</label></td>
                    <td><input type="text" name="sname"></td>
                </tr>
                <tr>
                    <td><label for="email" >Subject Code:</label></td>
                    <td><input type="text" name="scode"></td>
                </tr>
                <tr>
                    <td><label for="number">Semester:</label></td>
                    <td><input type="number" name="se_id" placeholder="enter 1 to 6 digit only"></td>
                </tr>
            </table>

            <div class="submit-container">
                <button class="submit-button" name="submit">Submit</button>
                <button class="new-button t1" name="new-button"><a href="<?php echo SIT; ?>admin/subject.php">Back Page</a></button>
                    <?php
                        if(isset($_POST['submit'])){
                            $sname = $_POST['sname'];
                            $scode = $_POST['scode'];
                            $se_id = $_POST['se_id'];

                            if($se_id > 0 && $se_id < 7){

                                $sql = "INSERT INTO subjects (su_name, su_code, se_id) VALUES ('$sname', '$scode', '$se_id')";
                                $res = mysqli_query($conn, $sql);
                                if($res){
                                    header("location:" .SIT. "admin/SU-form.php");

                                }else{
                                    header("location:" .SIT. "admin/SU-form.php");
                                    echo "<p class='error-message'>Error:Not added successfully.</p>";
                                }


                            }else{
                                echo "<p class='error-message'>Error: Please enter a valid semester (1 to 6 digits only).</p>";
                            
                            }

                        }
                    ?>
                
            </div>
        </form>
    </div>
</body>
</html>


