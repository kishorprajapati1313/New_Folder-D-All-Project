<?php
include("../co/config.php");

?>

<section id="content">
    <?php 
    if(isset($_GET['se_id'])){
        $se_id = $_GET['se_id'];

        // Add code to display student details for the selected se_id
        switch ($se_id) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="../css/form.css">
                </head>
                <body>
                    <div class="form-container">
                        <form class="my-form" method="post">
                            <h2>Student Registration Form</h2>
                            <table>
                                <tr>
                                    <td class="semester-label">Semester:</td>
                                    <td class="semester-value"><?php echo $se_id; ?></td>
                                    <input type="hidden" name="se_id" value="<?php echo $se_id; ?>">
                                </tr>
                                <tr>
                                    <td><label for="en_num">Enrollment Number:</label></td>
                                    <td><input type="number" name="en_num" value="" required></td>
                                </tr>

                                <?php
                                // Retrieve subject names for the selected se_id
                                $sql = "SELECT su_id, su_name FROM subjects WHERE se_id = '$se_id'";
                                $res = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $su_id = $row['su_id'];
                                    $su_name = $row['su_name'];
                                    ?>
                                    <tr>
                                        <td><label for="<?php echo $su_id; ?>"><?php echo $su_name; ?>:</label></td>
                                        <td><input type="number" name="marks[<?php echo $su_id; ?>]" value="0"></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <div class="submit-container">
                                <button class="submit-button" name="submit">Submit</button>
                                <button class="new-button" name="new-button" style="float:right"><a href="<?php echo SIT; ?>admin/result.php">Back Page</a></button>
                            </div>
                        </form>
                    </div>
                </body>
                </html>
                <?php
                break;
            default:
                // Handle invalid se_id
                // Your code here
                break;
        }
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
        $se_id = $_POST['se_id'];
        $en_num = $_POST['en_num'];
        $marks = $_POST['marks'];

        foreach ($marks as $su_id => $mark) {
            // Check if the subject record already exists for the provided en_num
            $sql = "SELECT * FROM marks WHERE se_id = '$se_id' AND en_num = '$en_num' AND su_id = '$su_id'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);

            if ($row) {
                // Update the mark for the existing record
                $sql = "UPDATE marks SET mark = '$mark' WHERE se_id = '$se_id' AND en_num = '$en_num' AND su_id = '$su_id'";
                $res = mysqli_query($conn, $sql);
            } else {
                // Insert a new record for the subject
                $sql = "INSERT INTO marks (se_id, en_num, su_id, mark) VALUES ('$se_id', '$en_num', '$su_id', '$mark')";
                $res = mysqli_query($conn, $sql);
            }
        }

        // Redirect to the next student by en_num within the same semester
        header("Location:".SIT."admin/Result-1.php?se_id=$se_id");
        exit();
    }
    ?>
</section>

<?php include("home/footer.php"); ?>