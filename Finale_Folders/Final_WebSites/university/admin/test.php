<tr>
                    <?php

                    $sql =  "SELECT COUNT(*) AS total_students FROM studen  WHERE se_id = '2'";
                    $res =  mysqli_query($conn, $sql);
                    $row =  mysqli_fetch_assoc($res);
                    $count = $row['total_students'];
                    ?>

                        <tr>
                        <td><?php echo $sn++; ?></td>
                        <td>Semester 2</td>
                        <td><?php echo $count; ?></td>
                        <td><a href="<?php echo SIT; ?>admin/EXAM-sem1.php" class="view-details">Add Exam No</a></td>
                    </tr>
                    <?php

                        $sql =  "SELECT COUNT(*) AS total_students FROM studen  WHERE se_id = '3'";
                        $res =  mysqli_query($conn, $sql);
                        $row =  mysqli_fetch_assoc($res);
                        $count = $row['total_students'];
                        ?>

                            <tr>
                            <td><?php echo $sn++; ?></td>
                            <td>Semester 3</td>
                            <td><?php echo $count; ?></td>
                            <td><a href="<?php echo SIT; ?>admin/EXAM-sem1.php" class="view-details">Add Exam No</a></td>
                        </tr>
                        <?php

                        $sql =  "SELECT COUNT(*) AS total_students FROM studen  WHERE se_id = '4'";
                        $res =  mysqli_query($conn, $sql);
                        $row =  mysqli_fetch_assoc($res);
                        $count = $row['total_students'];
                        ?>

                            <tr>
                            <td><?php echo $sn++; ?></td>
                            <td>Semester 4</td>
                            <td><?php echo $count; ?></td>
                            <td><a href="<?php echo SIT; ?>admin/EXAM-sem1.php" class="view-details">Add Exam No</a></td>
                        </tr>
                        <?php

                        $sql =  "SELECT COUNT(*) AS total_students FROM studen  WHERE se_id = '5'";
                        $res =  mysqli_query($conn, $sql);
                        $row =  mysqli_fetch_assoc($res);
                        $count = $row['total_students'];
                        ?>

                            <tr>
                            <td><?php echo $sn++; ?></td>
                            <td>Semester 5</td>
                            <td><?php echo $count; ?></td>
                            <td><a href="<?php echo SIT; ?>admin/EXAM-sem1.php" class="view-details">Add Exam No</a></td>
                        </tr>
                        <?php

                            $sql =  "SELECT COUNT(*) AS total_students FROM studen  WHERE se_id = '6'";
                            $res =  mysqli_query($conn, $sql);
                            $row =  mysqli_fetch_assoc($res);
                            $count = $row['total_students'];
                            ?>

                                <tr>
                                <td><?php echo $sn++; ?></td>
                                <td>Semester 6</td>
                                <td><?php echo $count; ?></td>
                                <td><a href="<?php echo SIT; ?>admin/EXAM-sem1.php" class="view-details">Add Exam No</a></td>
                            </tr>
