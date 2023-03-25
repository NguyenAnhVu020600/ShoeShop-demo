<?php
require '../config.php';
if(isset($_GET['xoasp']))
{
    $id_product = $_GET['xoasp'];
    $q = "DELETE FROM products WHERE id_product = '$id_product'";
    $r = $conn->query($q);
    if(!$r) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoAddSP'] = "Xóa SP Thành Công!";
        $_SESSION['tieude'] = "Quản lý sản phẩm";
        header ("location:admin_home.php?loadpage=ql_product.php");
    }
}
?>