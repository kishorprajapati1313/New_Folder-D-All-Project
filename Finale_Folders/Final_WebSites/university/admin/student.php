<?php include("home/menu.php"); ?>

<section id="content">
    <!-- Content for the selected section -->
    
    
    <div id="dashboard-section">
      
       
        <h1>Semester Overview</h1>
       
    </h2>
        <div class="dashboard-content">
            <!-- Semester overview table -->
            <table class="semester-table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Total Students</th>
                        <th>Total Girls</th>
                        <th>Total Boys</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    

                  
                        // Query to get the count of total students, girls, and boys for the current semester
                        $sql = "SELECT
                        COUNT(*) AS total_students,
                        COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                        COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                        se_id   FROM studen  WHERE se_id = '1'";
                        
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                        $total_students = $row['total_students'];
                        $total_girls    = $row['total_girls'];
                        $total_boys     = $row['total_boys'];
                        $semester       = $row['se_id'];
            
                        ?>
                        <tr>
                            <td><?php echo "Semster-1"  ?></td>
                            <td><?php echo $total_students; ?></td>
                            <td><?php echo $total_girls; ?></td>
                            <td><?php echo $total_boys; ?></td>
                             <td><a href="<?php echo SIT; ?>admin/ST-sem1.php" class="view-details">View Details</a></td>
                        <?php
                    
                    ?>
               
                    <?php
                        // Query to get the count of total students, girls, and boys for the current semester
                        $sql = "SELECT
                        COUNT(*) AS total_students,
                        COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                        COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                        se_id   FROM studen  WHERE se_id = '2'";
                        
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                        $total_students = $row['total_students'];
                        $total_girls    = $row['total_girls'];
                        $total_boys     = $row['total_boys'];
                        $semester       = $row['se_id'];
            
                        ?>
                        <tr>
                            <td><?php echo "Semster-2" ?></td>
                            <td><?php echo $total_students; ?></td>
                            <td><?php echo $total_girls; ?></td>
                            <td><?php echo $total_boys; ?></td>
                             <td><a href="<?php echo SIT; ?>admin/ST-sem2.php" class="view-details">View Details</a></td>
                        <?php
                    
                    ?>
               
                <?php
                    

                  
                    // Query to get the count of total students, girls, and boys for the current semester
                    $sql = "SELECT
                    COUNT(*) AS total_students,
                    COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                    COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                    se_id   FROM studen  WHERE se_id = '3'";
                    
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $total_students = $row['total_students'];
                    $total_girls    = $row['total_girls'];
                    $total_boys     = $row['total_boys'];
                    $semester       = $row['se_id'];
        
                    ?>
                    <tr>
                        <td><?php echo "Semster-3"  ?></td>
                        <td><?php echo $total_students; ?></td>
                        <td><?php echo $total_girls; ?></td>
                        <td><?php echo $total_boys; ?></td>
                         <td><a href="<?php echo SIT; ?>admin/ST-sem3.php" class="view-details">View Details</a></td>
                    <?php
                
                ?>
          
            <?php
                    

                  
                    // Query to get the count of total students, girls, and boys for the current semester
                    $sql = "SELECT
                    COUNT(*) AS total_students,
                    COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                    COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                    se_id   FROM studen  WHERE se_id = '4'";
                    
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $total_students = $row['total_students'];
                    $total_girls    = $row['total_girls'];
                    $total_boys     = $row['total_boys'];
                    $semester       = $row['se_id'];
        
                    ?>
                    <tr>
                        <td><?php echo "Semster-4"  ?></td>
                        <td><?php echo $total_students; ?></td>
                        <td><?php echo $total_girls; ?></td>
                        <td><?php echo $total_boys; ?></td>
                         <td><a href="<?php echo SIT; ?>admin/ST-sem4.php" class="view-details">View Details</a></td>
                    <?php
                
                ?>
           
            <?php
                    

                  
                    // Query to get the count of total students, girls, and boys for the current semester
                    $sql = "SELECT
                    COUNT(*) AS total_students,
                    COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                    COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                    se_id   FROM studen  WHERE se_id = '5'";
                    
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $total_students = $row['total_students'];
                    $total_girls    = $row['total_girls'];
                    $total_boys     = $row['total_boys'];
                    $semester       = $row['se_id'];
        
                    ?>
                    <tr>
                        <td><?php echo "Semster-5"  ?></td>
                        <td><?php echo $total_students; ?></td>
                        <td><?php echo $total_girls; ?></td>
                        <td><?php echo $total_boys; ?></td>
                         <td><a href="<?php echo SIT; ?>admin/ST-sem5.php" class="view-details">View Details</a></td>
                    <?php
                
                ?>
           
            <?php
                    

                  
                    // Query to get the count of total students, girls, and boys for the current semester
                    $sql = "SELECT
                    COUNT(*) AS total_students,
                    COUNT(CASE WHEN gender = 'female' THEN 1 END) AS total_girls,
                    COUNT(CASE WHEN gender = 'male' THEN 1 END) AS total_boys,
                    se_id   FROM studen  WHERE se_id = '6'";
                    
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $total_students = $row['total_students'];
                    $total_girls    = $row['total_girls'];
                    $total_boys     = $row['total_boys'];
                    $semester       = $row['se_id'];
        
                    ?>
                    <tr>
                        <td><?php echo "Semster-6"  ?></td>
                        <td><?php echo $total_students; ?></td>
                        <td><?php echo $total_girls; ?></td>
                        <td><?php echo $total_boys; ?></td>
                         <td><a href="<?php echo SIT; ?>admin/ST-sem6.php" class="view-details">View Details</a></td>
                    <?php
                
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include("home/footer.php"); ?>
