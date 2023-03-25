<div class="container">
<form method="POST">
<center>
<div class="form-group">
        <table>
            <tr>
                <td colspan =3><input size=200px type="text" name="timQLNV" class="form-control" placeholder="Tìm kiếm..."></td>
                <td><input  type="submit" name="timkiemQLNV" class="btn btn-primary btn-block" value="Tìm kiếm"></td>
            </tr>
        </table>
    </div>
    <h3 class="text-center text-info">Danh sách nhân viên</h3>
    <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if (isset($_GET['id']) == '1') {
            if ($_SESSION['role'] == 'admin') {
                $_SESSION['tieude'] = "Quản lý nhân viên";
                header("location:admin_home.php?loadpage=ql_emp.php");
            } else header("location:admin_home.php?loadpage=-1");
        }
        
        if(isset($_SESSION['thongbaoQlNV']))
        {
            echo '<div class="form-group">
            <span style="color:red">'.$_SESSION['thongbaoQlNV'].'</span>
            </div>';
            unset($_SESSION['thongbaoQlNV']);
        }
        // if(isset($_SESSION['timkiemQLNV']))
        // {
        //     $key = $_SESSION['timkiemQLNV'];
        //     $query = "SELECT * FROM nhanvien WHERE manv like '$key' or hotennv like '$key' or email_nv like '$key' or sdt like '$key' or tendangnhap like '$key'";
        //     unset($_SESSION['timkiemQLNV']);
        // } 
        
        $query = 'SELECT * FROM admin';
        $d=0;
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Mã Nhân viên</th>
            <th>Họ tên nhân viên</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
            <th>Số điện thoại</th>
            <th>Tỉnh/Thành phố</th>
            <th>Quận/huyện</th>
            <th>Địa chỉ</th>
            <th>Phân quyền</th>
            <?php
                if($_SESSION['role'] == 'admin') echo "<th>Tuỳ chọn</th>";
            ?>
            
        </tr>
        </thead>          
        <tbody>
        <?php while ($row = $result->fetch_assoc()) {
            $d++;
            if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><?= $row['id_ad']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= md5($row['password']); ?></td>
            <td><?= $row['phone']; ?></td>
            <td><?= $row['province']; ?></td>
            <td><?= $row['district']; ?></td>
            <td><?= $row['address']; ?></td>
            <td><?= $row['role']; ?></td>
            <?php
            if($_SESSION['role'] == 'admin')
            {
                $id_ad = $row['id_ad'];
                echo "<td><a href='emp_detail.php?id_ad=$id_ad' class='badge badge-primary p-2'>Chi tiết</a> 
                <a style='background-color: #fc3232;' href='delete_emp.php?id_ad=$id_ad' class='badge badge-primary p-2'>Xóa NV</a></td>";
            } 
            ?>           
        </tr>
        <?php } ?>
        </tbody>
    </table>
</center>
</form>
</div>