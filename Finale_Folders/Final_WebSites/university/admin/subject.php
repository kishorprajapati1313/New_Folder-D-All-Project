<?php include("home/menu.php"); ?>

<section id="content">
    <!-- Content for the selected section -->
    
    
    <div id="dashboard-section">
      
        <div id="dashboard-section">
    <h2 class="section-title">
        <span style="float: left;">
            <button class="add-student-button"><a href="<?php echo SIT; ?>admin/SU-form.php" class="button-link">Add Subject</a></button>
        </span>
        <h1>Subject Overview</h1>
       
    </h2>
        <div class="dashboard-content">
            <!-- Semester overview table -->
            <table class="semester-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Semester</th>
                        <th>Subjects</th>
                        <th>Subject Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;

                    $sql = "SELECT se_id, su_name, su_code,su_id FROM subjects order by se_id asc , su_code asc";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $su_id    = $row['su_id'];
                            $semester = "Semester " . $row['se_id'];
                            $subject = $row['su_name'];
                            $subjectCode = $row['su_code'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $semester; ?></td>
                                <td><?php echo $subject; ?></td>
                                <td><?php echo "BCA-" .$subjectCode; ?></td>
                                <td ><a href="<?php echo SIT; ?>admin/SU-delete.php?su_id=<?php echo $su_id; ?>" class="view-details" >Delete Subject</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <!-- Add rows for additional subjects -->
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include("home/footer.php"); ?>
