<?php
if(isset($_GET['xoalsp']))
{
    require '../config.php';
    $id_category = $_GET['xoalsp'];
    $q = "DELETE FROM category WHERE id_category = '$id_category'";
    $r = $conn->query($q);
    if(!$r) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoAddNSP'] = "Xóa Nhóm SP Thành Công!";
        $_SESSION['tieude'] = "Quản lý sản phẩm";
        header ("location:admin_home.php?loadpage=ql_product.php");
    }
}
?>