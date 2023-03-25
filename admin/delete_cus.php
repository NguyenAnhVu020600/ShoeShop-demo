<?php
require '../config.php';
if(isset($_GET['id_user']))
{
    $id_user = $_GET['id_user'];
    $q = "DELETE FROM users WHERE id_user = '$id_user'";
    $r = $conn->query($q);
    if(!$r) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoQlKH'] = "Xóa khách hàng Thành Công!";
        header ("location:admin_home.php?loadpage=ql_user.php");
    }
}
?>