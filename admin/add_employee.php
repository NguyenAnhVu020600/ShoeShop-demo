
<div class="container">
    <?php
    if (session_id() === '') session_start();
    if (isset($_GET['id']) == '1') {
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['tieude'] = "Thêm Nhân viên";
            header("location:admin_home.php?loadpage=add_employee.php");
        } else header("location:admin_home.php?loadpage=-1");
    }
    ?>
    <div class="row">
        <h3 class="text-justify-center text-info">Nhập thông tin của nhân viên mới</h3>
        <form weight=50% method="post" action="action_add_emp.php">
            <div class="form-group" style="padding-top: 50px;">
                <input type="text" name="username" class="form-control" value="<?php if (isset($Tennv)) echo $Tennv; ?>" placeholder="Nhập họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" value="<?php if (isset($Email)) echo $Email; ?>" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" value="<?php if (isset($Sdt)) echo $Sdt; ?>" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <input type="radio" name="role" value="admin"> Quản trị viên&emsp;<input type="radio" name="role" value="employee"> Nhân viên CSKH&emsp;<input type="radio" name="role" value="shipper"> Nhân viên giao hàng
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" value="<?php if (isset($Pas)) echo $Pas; ?>" placeholder="Tạo mật khẩu">
            </div>
            <div class="form-group">
                <input type="password" name="confirm_pass" class="form-control" value="<?php if (isset($Repas)) echo $Repas; ?>" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="form-group">
                <select class="form-control province" name="province" placeholder="Chọn tỉnh/thành phố" require>
                    <option selected> Chọn tỉnh / thành </option>
                    <?php
                    require '../config.php';
                    $query = "SELECT * FROM province";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id_province = $row['id_province'];
                            $name = $row['name'];
                    ?>
                            <option value="<?= $id_province ?>"><?= $name ?></option>
                    <?php
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                
                <select class="form-control district" name="district" placeholder="Chọn quận/huyện" require>
                    <option selected> Chọn quận / huyện </option>

                </select>
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" value="<?php if (isset($Sdt)) echo $Sdt; ?>" placeholder="Nhập địa chỉ">
            </div>
            <?php
            if (isset($_SESSION['thongbaoAddNV'])) {
                echo '<div class="form-group">
            <span style="color:red">' . $_SESSION['thongbaoAddNV'] . '</span>
            </div>';
                unset($_SESSION['thongbaoAddNV']);
            }
            ?>
            <div class="form-group">
                <input type="submit" name="add_emp" class="btn btn-primary btn-block" value="Thêm Nhân viên">
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="./js/provice.js"> </script>
