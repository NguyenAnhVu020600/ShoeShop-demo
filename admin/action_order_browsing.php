<?php
if (session_id() === '') session_start();
require '../config.php';
if(isset($_POST['DuyetDonHang']))
{
    $id_order = $_SESSION['id_order'];
    $nv_giao = $_POST['nhanviengiao'];
    $nv_duyet = $_SESSION['id_ad'];
    $ngaygiao = $_POST['ngaygiao'];
    $query = "UPDATE orders SET transport_date ='$ngaygiao',nv_giao = '$nv_giao', nv_duyet = '$nv_duyet',status ='transport' WHERE id_order = '$id_order' ";
    $result = $conn->query($query);
    if(!$result) echo 'Cau truy van bi sai';
    else
    {
        $_SESSION['thongbaoQLdon_chuaduyet'] = "Duyệt thành công!";
        $_SESSION['tieude'] = "Quản lý đơn hàng đang chờ duyệt";
        unset($_SESSION['id_order']);
        header ("location:admin_home.php?loadpage=ql_order.php");
    }    
}
?>