<div class="container">
    <div class="row">
        <h3 class="text-justify-center text-info">Thông tin của khách hàng</h3>
        <br/>
        <?php
        require '../config.php';
        if (session_id() === '') session_start();
        if (isset($_GET['id_user'])) {
            $_SESSION['id_user'] = $_GET['id_user'];
            header("location:admin_home.php?loadpage=cus_detail.php");
        }

        $id_user = $_SESSION['id_user'];
        $query = "SELECT * FROM users where id_user = '$id_user'";
        $result = $conn->query($query);
        if (!$result) echo 'Cau truy van bi sai';
        $row = $result->fetch_assoc();
        ?>
        <form method="post">
            <div class="form-group" style="padding-top: 50px;">
                <span>Mã khách hàng</span>
                <input type="text" readonly disabled class="form-control" value="<?= $row['id_user'] ?> ">
            </div>
            <div class="form-group">
                <span>Họ tên khách hàng</span>
                <input type="text" name="username" class="form-control" value="<?= $row['lastname'] . ' ' . $row['firstname'] ?> ">
            </div>
            <div class="form-group">
                <span>Email</span>
                <input type="text" name="email" class="form-control" value="<?= $row['email'] ?>">
            </div>
            <div class="form-group">
                <span>Số điện thoại</span>
                <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>">
            </div>
            <div class="form-group">
                <span>Địa chỉ khách hàng</span>
                <input type="text" name="address" class="form-control" value="<?= $row['address'] ?>">
            </div>

            <div class="form-group">
                <span>Mật Khẩu</span>
                <input type="text" name="password" class="form-control" value="<?= md5($row['password']) ?>">
            </div>
            <div class="form-group">
                <a href='admin_home.php?loadpage=ql_user.php' class='badge badge-primary p-2'>Quay về</a>
                <input type="submit" name="fix" style='background-color: #6be56d;' value="Lưu thay đổi">
                <a style='background-color: #fc3232;' href='delete_cus.php?id_user=<?= $id_user; ?>' class='badge badge-primary p-2'>Xóa khách hàng</a>
            </div>
        </form>
    </div>
</div>