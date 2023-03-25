<?php
if(isset($_POST['addlsp']))
{
    require '../config.php';
    $category = $_POST['name_category'];
    $query = "INSERT INTO category (name)VALUES('$category')";
        if($conn->query($query)==true)
        {
            $_SESSION['thongbaoAddNSP'] = "Thêm nhóm sản phẩm mới thành công!";
            header ("location:admin_home.php?loadpage=ql_product.php");
        }
        else "thất bại";
}
?>