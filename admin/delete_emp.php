<?php
require '../config.php';
if(isset($_GET['id_ad']))
{
    $id_ad = $_GET['id_ad'];
    $q = "DELETE FROM admin WHERE id_ad = '$id_ad'";
    $r = $conn->query($q);
    if(!$r) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoQlNV'] = "Xóa khách hàng Thành Công!";
        header ("location:admin_home.php?loadpage=ql_emp.php");
    }
}
?>