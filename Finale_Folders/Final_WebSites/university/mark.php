<?php
include("co/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Mark Sheet</title>
  <link rel="stylesheet" type="text/css" href="css/mark.css">
</head>
<body>
  <header>
    <h1>KADI SRAVE VIDIYALAY University</h1>
  </header>
  <div class="container">
    <div class="mark-sheet">
      <h1>Mark Sheet</h1>
      <?php
      if (isset($_GET['e_num'])) {
        $e_num = $_GET['e_num'];

        // Remove quotes from e_num
        $e_num = str_replace("'", "", $e_num);

        // Retrieve se_id and en_num from exams table
        $sql = "SELECT se_id, en_num
                FROM exams
                WHERE e_num = '$e_num'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $se_id = $row['se_id'];
          $en_num = $row['en_num'];

          // Fetch additional information based on se_id and en_num
          $studentSql = "SELECT full_name
                         FROM studen
                         WHERE se_id = '$se_id' AND en_num = '$en_num'";
          $studentResult = mysqli_query($conn, $studentSql);
          if ($studentResult && mysqli_num_rows($studentResult) > 0) {
            $studentRow = mysqli_fetch_assoc($studentResult);
            $studentName = $studentRow['full_name'];

            // Display the retrieved values
            echo "<h3>Student Name: $studentName</h3>";
            echo "<h4>Semester: $se_id</h4>";
           
            echo "<h4>Exam Number: $e_num</h4>";

            // Retrieve subject IDs and marks from marks table
            $marksSql = "SELECT su_id, mark
                         FROM marks
                         WHERE en_num = '$en_num'";
            $marksResult = mysqli_query($conn, $marksSql);
            if ($marksResult && mysqli_num_rows($marksResult) > 0) {
              echo "<table>";
              echo "<tr>
                      <th>Subject</th>
                      <th>Marks</th>
                      <th>CPI</th>
                      <th>CL/CO</th>
                    </tr>";

              $totalMarks = 0;
              $totalSubjects = mysqli_num_rows($marksResult);

              while ($marksRow = mysqli_fetch_assoc($marksResult)) {
                $subjectID = $marksRow['su_id'];
                $grade = $marksRow['mark'];

                // Retrieve subject name based on subject ID
                $subjectSql = "SELECT su_name
                               FROM subjects
                               WHERE su_id = '$subjectID'";
                $subjectResult = mysqli_query($conn, $subjectSql);
                if ($subjectResult && mysqli_num_rows($subjectResult) > 0) {
                  $subjectRow = mysqli_fetch_assoc($subjectResult);
                  $subjectName = $subjectRow['su_name'];

                  // Calculate GPA based on grade
                  $gpa = calculateGPA($grade);

                  // Calculate CPI
                  $cpi = ($grade / 100) * 10;

                  // Determine CL/CO based on CPI
                  $clco = $cpi > 2.9 ? "CL" : "CO";

                  // Display subject name, grade, CPI, and CL/CO
                  echo "<tr>
                          <td>$subjectName</td>
                          <td>$grade</td>
                          <td>$cpi</td>
                          <td>$clco</td>
                        </tr>";

                  // Sum up the marks for average calculation
                  $totalMarks += $grade;
                }
              }
              echo "</table>";

              // Calculate average marks and grade
              $averageMarks = $totalMarks / 50;
              $averageGPA = calculateGPA($averageMarks);

              echo "<p><h3>CPI: <span>$averageMarks</span></h3></p>";
              echo "<h3> Grade: <span>$averageGPA</span></h3>";
            } else {
              echo "<p>No marks found for the provided enrollment number.</p>";
            }
          } else {
            echo "<p>Student data not found.</p>";
          }
        } else {
          echo "<p>No data found for the provided exam number.</p>";
        }
      } else {
        echo "<p>Exam number not provided.</p>";
      }
            
      function calculateGPA($grade) {
        // Implement your logic to calculate GPA based on grade
        // Example calculation for demonstration purposes only
       if ($grade >= 9.0) {
        return 'A+';
       }
       elseif ($grade >= 7.5) {
          return 'A';
        } elseif ($grade >= 6.5) {
          return 'A-';
        } elseif ($grade >= 5.5) {
          return 'B+';
        } elseif ($grade >= 4.5) {
          return 'B';
        } elseif ($grade >= 3.5) {
          return 'B-';
        } else {
          return 'F';
        }
      }
      ?>
    </div>
  </div>
</body>
</html>
