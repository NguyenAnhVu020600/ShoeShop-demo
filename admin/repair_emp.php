<?php
if (session_id() === '') session_start();
require '../config.php';
if(isset($_POST['sua']))
{
    $id_ad = $_SESSION['id_ad'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $q = "UPDATE admin SET username = '$username', email = '$email', phone = '$phone', role = '$role', province = '$province', district = '$district', address = '$address', password = '$password' WHERE id_ad = '$id_ad'";
    $r = $conn->query($q);
    if(!$r) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoQlNV'] = "Thay đổi Thông tin NV Thành Công!";
        $_SESSION['tieude'] = "Quản lý nhân viên";
        unset($_SESSION['id_ad']);
        header ("location:admin_home.php?loadpage=ql_emp.php");
        
    }    
}
?>