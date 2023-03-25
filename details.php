<?php
session_start();

require 'header.php';
require 'layout.php';
require 'config.php';
?>

<div class="container">
    <div class="layout-pay">
        <div class="main-header">
            <ul class="breadcrumb ">
                <li class="breadcrumb-item">
                    <a href="cart.php">Giỏ hàng</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="pay.php">Thanh toán</a>
                </li>
                <li class="breadcrumb-item ">
                    <a>Chi tiết đơn hàng</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container table">
    <table>
        <thead>
            <tr>
                <th >Hình ảnh</th>
                <th >Tên sản phẩm</th>
                <th >Số lượng</th>
                <th >Màu sắc</th>
                <th >Size</th>
                <th >Giá</th>
                <th >Tỉnh/Thành phố</th>
                <th >Quận/Huyện</th>
                <th >Địa chỉ</th>
            </tr>
        </thead>
        <tbody class="scroll">
            <?php
            $id_user = $_SESSION['id_user'];
            $price_total=0;
            $querydetails = "SELECT products.name as 'name_product',products.thumbnail,products.price,
            orders.quantity,province.name as 'province',district.name as 'district' ,orders.color,orders.size,orders.address
            FROM orders,products,province,district
            WHERE products.id_product = orders.id_product AND province.id_province = orders.province
            AND district.id_district = orders.district AND id_user = '$id_user' AND orders.status = 'ordered'";
            $result = $conn->query($querydetails);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($rowdetails = $result->fetch_assoc()) {
                    $product_details = $rowdetails['name_product'];
                    $thumbnail_details = $rowdetails['thumbnail'];
                    $quantity_details = $rowdetails['quantity'];
                    $price_details = $rowdetails['price'];
                    $province_details = $rowdetails['province'];
                    $district_details = $rowdetails['district'];
                    $color_details = $rowdetails['color'];
                    $size_details = $rowdetails['size'];
                    $address_details = $rowdetails['address'];
                    $price_product = $price_details * $quantity_details;
                    $price_total += $price_product;
                    $total = $price_total +30000;
                    ?>
                        <tr>
                            <td class="product-image" width="200px">
                                <img class="product-thumbnail-image" width="150px" src="img/shoes/<?= $thumbnail_details ?>" />
                            </td>
                            <td><?= $product_details; ?></td>
                            <td><?= $quantity_details; ?></td>
                            <td><?= $color_details; ?></td>
                            <td><?= $size_details; ?></td>
                            <td><?php echo number_format("$price_product"); ?> VNĐ</td>
                            <td><?= $province_details; ?></td>
                            <td><?= $district_details; ?></td>
                            <td><?= $address_details; ?></td>
                        </tr>

                    <?php 
                    }
                }
                
            ?>
            <tr>
                <td>Thành tiền:</td>
                <td style="color:red"><h4><?php echo number_format("$total"); ?></h4>VNĐ</td>
            </tr>
            <div class="left-align">
                <h5>Hoá đơn của khách hàng <?=$_SESSION['username']?></h5>
            </div>
        </tbody>
    </table>
    <div class="right-align">
        <p>Cảm ơn bạn đã tin tưởng © Sneaker Shop <?= date('Y'); ?></p>
    </div>

    <a href="index.php" class="button-rounded blue btn waves-effects waves-light">Trang chủ</a>
</div>


