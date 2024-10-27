<?php include("home/menu.php"); ?>
<?php
if (isset($_POST['end_semester'])) {
    $sql2 = "SELECT COUNT(*) as count, se_id FROM studen WHERE se_id = 2";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $count = $row2['count'];

    if ($count > 0) {
        $n_sem = $row2['se_id'] + 1;

        $sql3 = "UPDATE studen SET se_id = '$n_sem' WHERE se_id = 2";
        $res3 = mysqli_query($conn, $sql3);

        if ($res3 == true) {
            header("location:".SIT."admin/student.php");
            exit();
        }
    }
}
?>


<section id="content">
    <!-- Content for the selected section -->
    
    <div id="dashboard-section">
    <h2 class="section-title">
        <span style="float: left;">
            <button class="add-student-button"><a href="<?php echo SIT; ?>admin/ST-form.php?se_id=2" class="button-link">Add Student</a></button>
        </span>
        Semester 2
        <span style="float: right;">
        <form method="post">
        <button class="end-sem-button" type="submit" name="end_semester">End Sem</button>
        </span>
</form>
    </h2>
   
    </div>

        <div class="dashboard-content">
            <!-- Student details table -->
            <table class="student-table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Enrollment Number</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php
                        $sql = "SELECT * FROM studen where se_id='2' ";
                        $res = mysqli_query($conn, $sql);
                        if($res == true){
                            $count = mysqli_num_rows($res);
                            $sn = 1;

                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $en_num = $row['en_num'];
                                    $full_name = $row['full_name'];
                                    $gender = $row['gender'];

                            ?>
                            <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $en_num; ?></td>
                            <td><?php echo $full_name;  ?></td>
                            <td><?php echo $gender;  ?></td>
                            <td>
                                <button class="view-details-button" onclick="openModal(1)"><span>View Student</span></button>
                            </td>
                            </tr>
                            <?php
                                }
                            } else {


                            }

                        }


?>          
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Student Details</h3>
        <div id="student-info"></div>
    </div>
</div>

<script>
    // Get the modal element
    let modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    let closeBtn = document.getElementsByClassName("close")[0];

    // Function to open the modal and fetch student details
    function openModal() {
        // TODO: Fetch student details using the studentId parameter
        // and populate the "student-info" <div> with the details

        // Display the modal
        modal.style.display = "block";
    }
    

    // Function to close the modal when the close button is clicked
    closeBtn.onclick = function() {
        modal.style.display = "none";
    };

    // Function to close the modal when the user clicks outside the modal content
    window.onclick = function() {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>

<?php include("home/footer.php"); ?>




