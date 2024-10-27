<?php include('p/menu.php')  ?>


    <div class="main">
    <div class="wrapper">
        <h1>DASHBORD</h1><br>

        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
       
    ?><br>

        <div class="col text">
            <?php
            $sql = "SELECT * FROM ca";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1><br>
            Category
        </div>

        <div class="col text">
        <?php
            $sql2 = "SELECT * FROM book";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1><br>
            Book
        </div>

        <div class="col text">
        <?php
            $sql3 = "SELECT * FROM `order`";
            $res3 = mysqli_query($conn, $sql3);
            $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1><br>
            Total Otder
        </div>

        <div class="col text">
        <?php
            $sql4 = "SELECT SUM(TOTAL) AS Total FROM `order` WHERE status='Delivered'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            $t_r = $row4['Total'];
            ?>

            <h1>$<?php echo $t_r; ?></h1><br>
            Revenue
        </div>
    <div class="c"></div>
        </div>
   </div>   


<?php include('p/f.php')  ?>
    