<?php
session_start();
require 'header.php';
require 'layout.php';
require 'config.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d H:i:s');
if (isset($_POST['final'])) {

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $address = $_POST['address'];
    $pttt = $_POST['pttt'];
    $ptvc = $_POST['ptvc'];

    $queryproduct = "SELECT 
    products.id_product as 'id_product', products.price as 'price',
    orders.id_user, orders.status,
    orders.quantity as 'quantity',
    orders.id_order as 'id_order'
    FROM  products, orders 
    WHERE orders.id_product = products.id_product  AND  orders.status = 'ordering'";
    $result1 = $conn->query($queryproduct);
    $price_total = 0;
    if ($result1->num_rows > 0) {
        while ($rowproduct = $result1->fetch_assoc()) {
            $id_product = $rowproduct['id_product'];
            $id_order = $rowproduct['id_order'];
            $quantity_product = $rowproduct['quantity'];
            $price_product = $rowproduct['price'];
            $price_total_product = $price_product * $quantity_product;
            $price_total += $price_total_product;

            $queryfinal = "UPDATE orders SET province ='$province',district = '$district', address='$address', orderdate='$date', status='ordered'
            WHERE id_order = '$id_order'";
            $resultfinal = $conn->query($queryfinal);
            if($resultfinal === TRUE)
            {
                $querydetail = "INSERT INTO order_details(id_order,id_product,quantity,ptvc,pttt,status)
                VALUES ('$id_order','$id_product','$quantity_product','$ptvc','$pttt','finish')";
                $resultdetail = $conn->query($querydetail);
            }
        }
    }
    
?>
    <div class="container">
        <div class="layout-pay">
            <div class="main-header">
                <ul class="breadcrumb ">
                    <li class="breadcrumb-item">
                        <a href="cart.php">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="pay.php">Phương thức thanh toán</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a>Thank you</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container thanks">
        <div class="row">
            <div class="col s12 m3">
            </div>
            <div class="col s12 m6">
                <div class="card center-align">
                    <div class="card-image">
                        <img src="img/thanks.png" class="responsive-img" alt="">
                    </div>
                    <div class="card-content center-align">
                        <h5>Cảm ơn bạn đã đặt hàng</h5>
                        <p>Đơn hàng của bạn đang được kiểm duyệt :
                        <h3 class="blue-text"><?php echo $_SESSION['username']; ?></h3>
                        </p>
                    </div>
                </div>

                <div class="center-align">
                    <a href="details.php" name ="detail" class="button-rounded blue btn waves-effects waves-light">Chi tiết đơn hàng</a>
                    <a href="index.php" class="button-rounded blue btn waves-effects waves-light">Tiếp tục mua sắm</a>
                </div>
            </div>
            <div class="col s12 m3">
            </div>
        </div>
    </div>
<?php

}
?>
<?php require 'footer.php';?>