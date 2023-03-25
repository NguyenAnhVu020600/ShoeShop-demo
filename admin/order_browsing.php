<div class="container">
    <?php
    if (session_id() === '') session_start();
    require '../config.php';
    if (isset($_GET['duyet'])) {
        $_SESSION['id_order'] = $_GET['duyet'];
        $_SESSION['tieude'] = "Duyệt đơn hàng";
        header("location:admin_home.php?loadpage=order_browsing.php");
    }
    $id_order = $_SESSION['id_order'];
    $query = "SELECT * FROM orders, users where users.id_user = orders.id_user and orders.id_order = '$id_order' ";
    $result = $conn->query($query);
    if (!$result) echo 'Cau truy van bi sai';
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <h3 class="text-justify-center text-info">Duyệt đơn hàng</h3>
        <form weight=50% method="post" action="action_order_browsing.php">
            <div class="form-group" style="padding-top: 50px;">
                <span>Mã đơn hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['id_order']; ?>">
            </div>
            <div class="form-group">
                <span>Tên khách hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['lastname'] . ' ' . $row['firstname']; ?>">
            </div>
            <div class="form-group">
                <span>Nhân viên duyệt</span>
                <input type="text" readonly disabled class="form-control" value="<?= $_SESSION['id_ad']; ?>">
            </div>
            <div class="form-group">
                <span>Nhân viên giao</span>
                <?php
                $query2 = "SELECT * FROM admin where role = 'shipper'";
                $result2 = $conn->query($query2);
                if (!$result2) echo 'Cau truy van bi sai';
                ?>
                <select name="nhanviengiao">
                    <option selected="selected">--Chọn--</option>
                    <?php while ($row2 = $result2->fetch_assoc()) { ?>
                        <option value="<?= $row2['id_ad'] ?>"><?= $row2['username'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <span>Ngày đặt</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['orderdate']; ?>">
            </div>
            <div class="form-group">
                <span>Ngày giao</span>
                <input type="date" name="ngaygiao" class="form-control" min="<?= $row['orderdate']; ?>" />
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
                <input type="submit" name="DuyetDonHang" class="btn btn-primary btn-block" value="Duyệt đơn">
            </div>
        </form>
    </div>
</div>