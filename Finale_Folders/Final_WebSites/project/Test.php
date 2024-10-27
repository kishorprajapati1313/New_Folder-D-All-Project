// Login
<?php
if (isset($_POST['u_login'])) {
    $u_username = $_POST['u_username'];
    $u_password = $_POST['u_password'];

    // Select user with the given username and matching password
    $select_query = "SELECT * FROM customer_mst WHERE C_nm='$u_username' AND C_pwd='$u_password'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $u_ip = getIPAddress();

    // cart item
    $select_query_cart = "SELECT * FROM cart WHERE ip_add='$u_ip'";
    $select_cart_result = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart_result);

    if ($row_count == 1) {
        $_SESSION['username'] = $u_username;

        // No need to check the password here since it's already included in the query
        if ($row_count_cart == 0) {
            echo "<script>alert('Login successfully - No cart items')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        } else {
            echo "<script>alert('Login successfully - With cart items')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>