<div class="container">
<form>
    <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if (isset($_GET['id']) == '1') {
            if($_SESSION['role']=='shipper') header ("location:admin_home.php?loadpage=-1");    
            else
            {
                $_SESSION['tieude'] = "Quản lý đơn hàng đang chờ duyệt";
                header ("location:admin_home.php?loadpage=ql_order.php");
            }
        }

        $query = "SELECT * FROM users, orders where users.id_user = orders.id_user and orders.status = 'ordered' ORDER BY orders.orderdate DESC";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <h3 class="text-center text-info">Danh sách đơn hàng</h3>
    <?php if(isset($_SESSION['thongbaoQLdon_chuaduyet']))
        {
            echo '<div>
            <span style="color:red">'.$_SESSION['thongbaoQLdon_chuaduyet'].'</span>
            </div>';
            unset($_SESSION['thongbaoQLdon_chuaduyet']);
        } ?>
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
            <th></th>
        </tr>
        </thead>          
        <tbody>
        <?php $d=0; while ($row = $result->fetch_assoc()) {
            $d++;
            if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><?= $row['id_order']; ?></td>
            <td><?= $row['lastname'] .' '.$row['firstname']; ?></td>
            <td></td>
            <td></td>
            <td><?= $row['orderdate']; ?></td>
            <td></td>
            <td><?= $row['status']; ?></td>
            <td><a href="order_browsing.php?duyet=<?= $row['id_order'];?>" class="badge badge-primary p-2">Duyệt đơn</a></td>            
        </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
</div>