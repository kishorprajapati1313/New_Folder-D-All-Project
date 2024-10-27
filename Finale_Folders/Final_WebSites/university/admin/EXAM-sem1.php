<?php
include("home/menu.php");

if (isset($_POST['submit'])) {
    $se_id = $_POST['se_id']; 
    $exam_numbers = isset($_POST['exam_number']) ? $_POST['exam_number'] : array();

    for ($i = 0; $i < count($exam_numbers); $i++) {
        $exam_number = mysqli_real_escape_string($conn, $exam_numbers[$i]);
        $en_num = mysqli_real_escape_string($conn, $_POST['en_num'][$i]);

        $sql = "UPDATE exams SET e_num='$exam_number' WHERE en_num='$en_num' AND se_id='$se_id' LIMIT 1";
        $res = mysqli_query($conn, $sql);

        $_SESSION['exam_number'][$en_num] = $exam_number; // Store the entered exam number in session variable
    }

    header("location:".SIT."admin/exam.php");
    exit(); // Terminate the script after redirecting
}
?>

<link rel="stylesheet" type="text/css" href="../css/form.css">
<section id="content">
    <!-- Content for the selected section -->
    <div id="dashboard-section">
        <h2 class="section-title">Add Exam Numbers</h2>
        <form method="post">
            <table class="semester-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>SEMESTER</th>
                        <th>Enrollment Number</th>
                        <th>Exam Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['se_id'])) {
                        $se_id = $_GET['se_id'];
                        switch ($se_id) {
                            case '1':
                            case '2':
                            case '3':
                            case '4':
                            case '5':
                            case '6':
                                $sql = "SELECT DISTINCT en_num FROM exams WHERE se_id='$se_id'";
                                $res = mysqli_query($conn, $sql);
                                if ($res && mysqli_num_rows($res) > 0) {
                                    $sn = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $en_num = $row['en_num'];
                                        $default_exam_number = isset($_SESSION['exam_number'][$en_num]) ? $_SESSION['exam_number'][$en_num] : '';
                                        ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td>Semester-<?php echo $se_id; ?></td>
                                            <td><?php echo $en_num; ?></td>
                                            <td>
                                                <input type="number" name="exam_number[]" style="text-align: center;" value="<?php echo $default_exam_number; ?>">
                                            </td>
                                            <td>
                                                <input type="hidden" name="en_num[]" value="<?php echo $en_num; ?>">
                                                <input type="hidden" name="se_id" value="<?php echo $se_id; ?>">
                                                <input type="submit" name="submit" class="submit-button" value="Next">
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                break;
                            default:
                                echo "<p>Invalid semester</p>";
                                break;
                        }
                    } else {
                        echo "<p>No semester selected</p>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</section>

<?php include("home/footer.php");  ?>
