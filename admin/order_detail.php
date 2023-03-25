<div class="container">
    <?php
    if (session_id() === '') session_start();
    require '../config.php';
    if (isset($_GET['chitietdon'])) {
        $_SESSION['id_order'] = $_GET['chitietdon'];
        $_SESSION['tieude'] = "Xem thông tin đơn hàng";
        header("location:admin_home.php?loadpage=order_detail.php");
    }
    $id_order = $_SESSION['id_order'];
    $query = "SELECT * FROM orders, users where users.id_user = orders.id_user and orders.id_order = '$id_order' ";
    $result = $conn->query($query);
    if (!$result) echo 'Cau truy van bi sai';
    $row = $result->fetch_assoc();

    ?>
    <div class="row">
        <h3 class="text-justify-center text-info">Chi tiết đơn hàng</h3>
        <form weight=50% action="action.php" method="post">
            <div class="form-group" style="padding-top: 50px;">
                <span>Mã đơn hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['id_order']; ?>">
            </div>
            <div class="form-group">
                <span>Tên khách hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['lastname'] . ' ' . $row['firstname']; ?>">
            </div>
            <div class="form-group">
                <span>Số điện thoại</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['phone']; ?>">
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
                $q2 = "SELECT * FROM orders, admin where '$nvd' =admin.id_ad";
                $r2 = $conn->query($q2);
                if (!$r2) echo 'Cau truy van bi sai';
                $row2 = $r2->fetch_assoc();
                $Duyet = $row2['username'];
            }
            if ($nvg == "") {
                $Giao = "";
            } else {
                $q = "SELECT * FROM orders, admin where '$nvg' = admin.id_ad";
                $r = $conn->query($q);
                if (!$r) echo 'Cau truy van bi sai';
                $row1 = $r->fetch_assoc();
                $Giao = $row1['username'];
            }
            ?>
            <div class="form-group" style="padding-top: 50px;">
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
                        <th>Số Lượng SP</th>
                        <th>Size</th>
                        <th>color</th>
                        <th>Giá 1 sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $d = 0;
                    $t = 0;
                    while ($row3 = $r->fetch_assoc()) {
                        $d++;
                        $t += $row3['price'] * $row3['quantity'];
                        if ($d % 2 == 1) $bg = "#b0e5e5";
                        else $bg = "white";
                    ?>
                        <tr bgcolor="<?php echo $bg; ?>">
                            <td><?= $row3['id_order']; ?></td>
                            <td><?= $row3['name']; ?></td>
                            <td><?= $row3['quantity']; ?></td>
                            <td><?= $row3['size']; ?></td>
                            <td><?= $row3['color']; ?></td>
                            <td><?= $row3['price']; ?></td>
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
                <a style="background-color:red" href='admin_home.php?loadpage=ql_order_detail.php' class="btn btn-primary btn-block">Quay về</a>
            </div>
        </form>
    </div>
</div>