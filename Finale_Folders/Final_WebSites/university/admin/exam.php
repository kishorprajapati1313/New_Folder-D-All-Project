<?php include("home/menu.php"); ?>

<style>
    .view-details {
        cursor: pointer;
    }
</style>
<section id="content">
    <!-- Content for the selected section -->
    <?php
    if (isset($_POST['submit'])) {
        $se_id = $_POST['se_id'];
        
        // Redirect the user to exam-sem1.php with se_id
        header("Location:".SIT. "admin/EXAM-sem1.php?se_id=$se_id");
        exit();
    }
    ?>


    <div id="dashboard-section">
        <h2 class="section-title">Exam Overview</h2>
        <div class="dashboard-content">
            <!-- Semester overview table -->
            <table class="semester-table">
                <thead>
                <tr>
                        <th>S.N</th>
                        <?php $sn = 1; ?>
                        <th>Semester</th>
                        <th>Total Student</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $semesters = array(1, 2, 3, 4, 5, 6);
                    foreach ($semesters as $semester) {
                        $sql = "SELECT COUNT(*) AS total_students FROM studen WHERE se_id = '$semester'";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);
                        $count = $row['total_students'];
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td>Semester <?php echo $semester; ?></td>
                            <td><?php echo $count; ?></td>
                            <td>
                                <form method="post"> <!-- Add form tag -->
                                    <input type="hidden" name="se_id" value="<?php echo $semester; ?>">
                                    <input type='submit' class="view-details" name='submit' value='Add Exam No'>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="button-container">
            <form method="post">
                <input type="submit" class="view-details" name="submit_all" value="Add All Data">
            </form>
        </div>
    </div>
</section>

<?php include("home/footer.php");?>
<?php
if (isset($_POST['submit_all'])) {
    $sql = "INSERT INTO exams (en_num, se_id)
            SELECT s.en_num, s.se_id
            FROM studen s
            WHERE s.se_id > 0 AND s.se_id < 7
              AND NOT EXISTS (
                SELECT 1
                FROM exams e
                WHERE e.en_num = s.en_num
              )";

    $result = mysqli_query($conn, $sql); // Execute the SQL query
}
?>
