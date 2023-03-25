<div class="container">
<form>
    <?php
        require '../config.php';
        $id_ad = $_SESSION['id_ad'];
        $query = "SELECT * FROM orders, users where orders.nv_giao = '$id_ad' and orders.status ='transport' and users.id_user = orders.id_user ORDER BY orders.transport_date";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <h3 class="text-center text-info">Đơn hàng cần giao</h3>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Mã đơn hàng</th>
            <th>Họ tên khách hàng</th>
            <th>Nhân viên duyệt</th>
            <th>Ngày đặt</th>
            <th>Ngày giao</th>
            <th></th>
        </tr>
        </thead>          
        <tbody>
        <?php $d=0; while ($row = $result->fetch_assoc()) {
            $id_order = $row['id_order'];$d++;
            if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            $nvg= $row['nv_giao'];
            $nvd = $row['nv_duyet'];

            $q2 = "SELECT * FROM orders, admin where admin.id_ad = '$nvd'";
            $r2 = $conn->query($q2);
            if(!$r2) echo 'Cau truy van bi sai';
            $row2 = $r2->fetch_assoc();
            if($r2->num_rows == 0)  $Duyet = "";
            else $Duyet = $row2['username'];
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><?= $row['id_order']; ?></td>
            <td><?= $row['lastname'].' '.$row['firstname'] ?></td>
            <td><?= $Duyet; ?></td>
            <td><?= $row['orderdate']; ?></td>
            <td><?php if($row['transport_date'] == "0000-00-00") echo ""; else echo $row['transport_date'];?></td>
            <td><a href='ship_detail.php?chitietdonship=<?=$id_order?>' class='badge badge-primary p-2'>Chi tiết</a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
</div>