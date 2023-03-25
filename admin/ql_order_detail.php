
<div class="container">
<form>
    <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if(isset($_GET['id'])=='1')
        {
            $_SESSION['tieude'] = "Quản lý đơn hàng";
            header ("location:admin_home.php?loadpage=ql_order_detail.php");
        } 
        $query = "SELECT * FROM orders, users where users.id_user = orders.id_user ORDER BY orders.transport_date DESC";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <h3 class="text-center text-info">Danh sách đơn hàng</h3>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Mã đơn hàng</th>
            <th>Họ tên khách hàng</th>
            <th>Nhân viên giao</th>
            <th>Nhân viên duyệt</th>
            <th>Ngày đặt</th>
            <th>Ngày giao</th>
            <th>Tình trạng</th>
            <?php
                if($_SESSION['role'] != 'shipper') echo "<th>Tuỳ chọn</th>";
            ?>
        </tr>
        </thead>          
        <tbody>
        <?php $d=0; while ($row = $result->fetch_assoc()) {
            $d++;
            if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            $nvg= $row['nv_giao'];
            $nvd = $row['nv_duyet'];
            $q = "SELECT * FROM orders, admin where '$nvg' = admin.id_ad";
            $r = $conn->query($q);
            if(!$r) echo 'Cau truy van bi sai';
            $row1 = $r->fetch_assoc();
            if($r->num_rows == 0)  $Giao = "";
            else $Giao = $row1['username'];

            $q2 = "SELECT * FROM orders, admin  where '$nvd' =admin.id_ad";
            $r2 = $conn->query($q2);
            if(!$r2) echo 'Cau truy van bi sai';
            $row2 = $r2->fetch_assoc();
            if($r2->num_rows == 0)  $Duyet = "";
            else $Duyet = $row1['username'];
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><?= $row['id_order']; ?></td>
            <td><?= $row['lastname'] .' '. $row['firstname']; ?></td>
            <td><?= $Giao; ?></td>
            <td><?= $Duyet; ?></td>
            <td><?= $row['orderdate']; ?></td>
            <td><?php if($row['transport_date'] == "0000-00-00") echo ""; else echo $row['transport_date'];?></td>
            <td><?= $row['status']; ?></td>
            <?php
            if($_SESSION['role'] != 'shipper')
            {
                $id_order = $row['id_order'];
                echo "<td><a href='order_detail.php?chitietdon=$id_order' class='badge badge-primary p-2'>Chi tiết</a></td>";
            }
            ?> 
        </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
</div>
