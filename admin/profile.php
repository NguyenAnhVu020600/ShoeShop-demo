<div class="container">
    <form>
        <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if (isset($_GET['id']) == '1') {
            $_SESSION['tieude'] = "Thông tin nhân viên";
            header ("location:admin_home.php?loadpage=profile.php");
        }
        $id_ad = $_SESSION['id_ad'];
        $query = "SELECT* FROM admin WHERE id_ad = '$id_ad'";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
        $row = $result->fetch_assoc()
        ?>
        <table class="table table-hover" id="data-table">
            <tr>
                <th colspan=2><center><h1 >Thông tin nhân viên</h1></center></th>
            </tr>
            <tr><td><h2>Mã nhân viên:</h2></td> <td><h2><?= $row['id_ad'] ?></h2></td></tr>
            <tr><td><h2>Tên nhân viên:</h2></td> <td><h2><?= $row['username'] ?></h2></td></tr>
            <tr><td><h2>Email:</h2></td> <td><h2><?= $row['email']; ?></h2></td></tr>
            <?php
            $province = $row['province'];
                $q ="SELECT * FROM province WHERE id_province = '$province'";
                $r = $conn->query($q);
                $row1 = $r ->fetch_assoc();
            ?>
            <tr><td><h2>Tỉnh/Thành Phố:</h2></td> <td><h2><?= $row1['name']; ?></h2></td></tr>
            <?php
            $district = $row['district'];
                $q ="SELECT * FROM district WHERE id_district = '$district'";
                $r = $conn->query($q);
                $row1 = $r ->fetch_assoc();
            ?>
            <tr><td><h2>Quận/Huyện:</h2></td> <td><h2><?= $row1['name']; ?></h2></td></tr>
            <tr><td><h2>Địa Chỉ:</h2></td> <td><h2><?= $row['address']; ?></h2></td></tr>
            <tr><td><h2>Số điện thoại:</h2></td> <td><h2><?= $row['phone']; ?></h2></td></tr>
            
            <tr><td><h2>Quyền:</h2></td> <td><h2><?= $row['role']; ?></h2></td></tr>
        </table>
        <div class="form-group">
        <a href="change_pass.php?pass=1" class="btn btn-primary btn-block">Đổi mật khẩu</a>        
        </div>
    </form>
</div>