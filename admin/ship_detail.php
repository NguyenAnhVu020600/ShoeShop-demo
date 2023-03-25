

<div class="container">
    <?php
    if (session_id() === '') session_start();
    require '../config.php';
    if (isset($_GET['chitietdonship'])) {
        $_SESSION['id_order'] = $_GET['chitietdonship'];
        $_SESSION['tieude'] = "Thông tin đơn hàng cần giao";
        header("location:shipper_home.php?loadpage=ship_detail.php");
    }
    
    $id_order = $_SESSION['id_order'];
    $query = "SELECT * FROM orders, users where users.id_user = orders.id_user and orders.id_order = '$id_order'";
    $result = $conn->query($query);
    if (!$result) echo 'Cau truy van bi sai';
    $row = $result->fetch_assoc();

    ?>
    <div class="row">
        <h3 class="text-justify-center text-info">Chi tiết đơn hàng</h3>
        <form weight=50%  method="post">
            <div class="form-group" style="padding-top: 50px;">
                <span>Mã đơn hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['id_order']; ?>">
            </div>
            <div class="form-group">
                <span>Tên khách hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['lastname'].' '.$row['firstname']; ?>">
            </div>
            <div class="form-group">
                <span>Số điện thoại</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['phone']; ?>">
            </div>
            <?php 
            $province = $row['province'];
            $query1 ="SELECT * FROM province WHERE id_province = '$province'";
            $result1 = $conn->query($query1);
            $row1 = $result1->fetch_assoc();
            ?>
            <div class="form-group">
                <span>Tỉnh/Thành Phố</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row1['name']; ?>">
            </div>
            <?php 
    
            $district = $row['district'];
            $query2 ="SELECT * FROM district WHERE id_district = '$district'";
            $result2 = $conn->query($query2);
            $row2 = $result2->fetch_assoc();
            ?>
            <div class="form-group">
                <span>Quận/Huyện</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row2['name']; ?>">
            </div>
            <div class="form-group">
                <span>Địa chỉ giao</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['address']; ?>">
            </div>
            <?php
            $nvg = $row['nv_giao'];
            $nvd = $row['nv_duyet'];
            if ($nvd == "") {
                $Duyet = "";
            } else {
                $q3 = "SELECT * FROM orders, admin where admin.id_ad = '$nvd'";
                $r3 = $conn->query($q3);
                if (!$r3) echo 'Cau truy van bi sai';
                $row3 = $r3->fetch_assoc();
                $Duyet = $row3['username'];
            }
            if ($nvg == "") {
                $Giao = "";
            } else {
                $q = "SELECT * FROM orders, admin where '$nvg' =admin.id_ad";
                $r = $conn->query($q);
                if (!$r) echo 'Cau truy van bi sai';
                $row4 = $r->fetch_assoc();
                $Giao = $row4['username'];
            }
            ?>
            <div class="form-group">
                <span>Nhân viên duyệt</span>
                <input type="text" readonly disabled class="form-control" value="<?= $Duyet; ?>">
            </div>
            <div class="form-group">
                <span>Nhân viên giao</span>
                <input type="text" readonly disabled class="form-control" value="<?= $Giao; ?>">
            </div>
            <div class="form-group">
                <span>Ngày đặt</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['orderdate']; ?>">
            </div>
            <div class="form-group">
                <span>Ngày giao</span>
                <input type="text" readonly disabled class="form-control" value="<?php if ($row['transport_date'] == "0000-00-00") echo "";
                                                                                    else echo $row['transport_date']; ?>">
            </div>
            <h2>Danh sách sản phẩm</h2>
            <table class="table table-hover" id="data-table">
                <?php

                $q = "SELECT orders.id_order,products.id_product,products.name,orders.size,orders.color,
            products.price,order_details.quantity,orders.id_user
            FROM order_details,products,orders
            where order_details.id_product = products.id_product  AND products.id_product = orders.id_product  
            AND orders.id_order = order_details.id_order AND order_details.id_order = '$id_order'";
                $r = $conn->query($q);
                if (!$r) echo 'Cau truy van bi sai';
                ?>
                <thead>
                    <tr bgcolor="#95f461">
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số Lượng</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Giá 1 sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $d = 0;
                    $t = 0;
                    while ($row5 = $r->fetch_assoc()) {
                        $d++;
                        $t += $row5['price'] * $row3['quantity'];
                        if ($d % 2 == 1) $bg = "#b0e5e5";
                        else $bg = "white";
                    ?>
                        <tr bgcolor="<?php echo $bg; ?>">
                            <td><?= $row5['id_order']; ?></td>
                            <td><?= $row5['name']; ?></td>
                            <td><?= $row5['quantity']; ?></td>
                            <td><?= $row5['size']; ?></td>
                            <td><?= $row5['color']; ?></td>
                            <td><?= $row5['price']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="form-group">
                <span>Tổng số tiền cần thanh toán</span>
                <input type="text" readonly disabled class="form-control" value="<?= $t; ?>">
            </div>
            <div class="form-group">
                <?php
                if ($_SESSION['role'] == 'shipper') {
                    echo "<a href='action_transport.php?dagiao=$id_order' class='btn btn-primary btn-block'>Đã giao</a>";
                }
                ?>
                <a style="background-color:red" href='adminHome.php?loadpage=QLDon.php' class="btn btn-primary btn-block">Quay về</a>
            </div>
        </form>
    </div>
</div>