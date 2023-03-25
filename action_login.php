<?php
session_start();

if (isset($_POST['login'])) {
    require 'config.php';
    $email = $_POST['email'];
    $password = ($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['lastname'].' '.$row['firstname'] ;
        $_SESSION['address'] = $row['address'];
        $_SESSION['phone'] = $row['phone'];
        header('location:index.php');
    }
    else
    {
        $query_ad = "SELECT * FROM admin WHERE email = '$email' and password='$password'";
        $result_ad = $conn->query($query_ad);
        $rowad = $result_ad->fetch_assoc();

        if ($result_ad->num_rows == 1) {
            $_SESSION['id_ad'] = $rowad['id_ad'];
            $_SESSION['username'] = $rowad['username'];
            $_SESSION['role'] = $rowad['role'];
            header("location:./admin/admin_home.php");
            if($_SESSION['role']=='shipper') header("location:./admin/shipper_home.php");
        }
    }
    
}
?>
