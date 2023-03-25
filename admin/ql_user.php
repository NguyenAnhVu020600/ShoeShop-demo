<div class="container">
<form method="POST" >
    <div class="form-group">
        <table>
            <tr>
                <td colspan =3><input size=200px type="text" name="timQLKH" class="form-control" placeholder="Tìm kiếm..."></td>
                <td><input  type="submit" name="timkiemQLKH" class="btn btn-primary btn-block" value="Tìm kiếm"></td>
            </tr>
        </table>
                
    </div>
    <h3 class="text-center text-info">Danh sách khách hàng</h3>
    <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if (isset($_GET['id']) == '1') {
            if ($_SESSION['role'] == 'admin') {
                $_SESSION['tieude'] = "Quản lý khách hàng";
                header("location:admin_home.php?loadpage=ql_user.php");
            } else header("location:admin_home.php?loadpage=-1");
        }

        if(isset($_SESSION['thongbaoQlKH']))
        {
            echo '<div class="form-group">
            <span style="color:red">'.$_SESSION['thongbaoQlKH'].'</span>
            </div>';
            unset($_SESSION['thongbaoQlKH']);
        }
        // if(isset($_SESSION['timkiemQLKH']))
        // {
        //     $key = $_SESSION['timkiemQLKH'];
        //     $query = "SELECT * FROM khachhang WHERE makh like '$key' or tenkh like '$key' or email_kh like '$key' or sdt like '$key' or diachi like '$key' or tendangnhap like '$key'";
        //     unset($_SESSION['timkiemQLKH']);
        // }
        
        $query = "SELECT * FROM users";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Mã khách hàng</th>
            <th>Họ tên khách hàng</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Mật Khẩu</th>
            <?php
                if($_SESSION['role'] != 'Shipper') echo "<th>Tuỳ chọn</th>";
            ?>
            
        </tr>
        </thead>          
        <tbody>
        <?php
        
        $d=0;
        
        
            while ($row = $result->fetch_assoc()) {
                $d++;
                if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            ?>
            <tr bgcolor="<?php echo $bg; ?>">
                <td><?= $row['id_user']; ?></td>
                <td><?= $row['lastname'] .' '. $row['firstname']?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= md5($row['password']); ?></td>
                <?php
                if($_SESSION['role'] != 'shipper')
                {
                    $id_user = $row['id_user'];
                    echo "<td><a href='cus_detail.php?id_user=$id_user' class='badge badge-primary p-2'>Chi tiết</a> 
                    <a style='background-color: #fc3232;' href='delete_cus.php?id_user=$id_user' class='badge badge-primary p-2'>Xóa KH</a></td>";
                } 
                ?>  
            </tr>
            <?php 
            } 
        ?>
        </tbody>
    </table>
    
</form>
</div>