<?php include('p/menu.php')  ?>

    <div class="main">
    <div class="wrapper">
        <h1>Manage Admin</h1><br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['user-not-found'])){
            echo $_SESSION['user-not-found'];
            unset ($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pwd-not-match'])){
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['change-pwd'])){
            echo $_SESSION['change-pwd'];
            unset ($_SESSION['change-pwd']);
        }
        ?><br><br>
        <a href="add-admin.php" class="btn b">ADD Admin</a><br><br>

        <table class="tbl">
            <tr>
                <th>S.N</th>
                <th>Full-Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
            $sql="SELECT * FROM admin";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                $sn=1;
                if($count>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $name=$rows['name'];
                        $username=$rows['username'];
                        ?>
                        
             <tr>
                <td><?php echo $sn++;  ?></td>
                <td><?php echo $name;  ?></td>
                <td><?php echo $username;  ?></td>
                <td>
                    <a href='<?php echo SIT;  ?>admin/password.php?id=<?php echo $id; ?>' class='btn'>change passwored</a>
                    <a href="<?php echo SIT;  ?>admin/u.php?id=<?php echo $id; ?>" class="btn-s ">Update Admin</a>
                    <a href="<?php echo SIT; ?>admin/d.php?id=<?php echo $id;  ?>" class="btn-d"> Delete Admin</a>
                </td>
            </tr>
                        <?php
                    }
                } else{
                    
                }
            }

            ?>
           
           
        </table>

    </div>
    </div>   
    

  <?php include('p/f.php')   ?>



