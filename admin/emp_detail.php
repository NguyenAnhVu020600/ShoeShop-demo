
<div class="container">
    <?php 
    if (session_id() === '') session_start();
    require '../config.php';
    if(isset($_GET['id_ad']))
    {
        $_SESSION['id_ad'] = $_GET['id_ad'];   
        $_SESSION['tieude'] = "Xem/Sửa thông tin nhân viên";
        header ("location:admin_home.php?loadpage=emp_detail.php");
    }
    ?>
    <div class="row">
    <h3  class="text-justify-center text-info">Thông tin của nhân viên</h3>
    <?php
    $id_ad = $_SESSION['id_ad'];
    $query = "SELECT * FROM admin where id_ad = '$id_ad'";
    $result = $conn->query($query);
    if(!$result) echo 'Cau truy van bi sai';
    $row = $result->fetch_assoc();
    ?>
    <form method="post" action="repair_emp.php">
        <div class="form-group" style="padding-top: 50px;">
        <span>Mã nhân viên</span>
        <input type="text" readonly disabled class="form-control" value="<?= $row['id_ad'] ?> ">
        </div>    
        <div class="form-group">
        <span>Họ tên nhân viên</span>
        <input type="text" name="username" class="form-control" value="<?= $row['username'] ?> ">
        </div>
        <div class="form-group">
        <div class="form-group">
        <span>Email</span>
        <input type="text" name="email" class="form-control" value="<?= $row['email'] ?>">
        </div>
        <div class="form-group">
        <span>Số điện thoại</span>
        <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>">
        </div>
        <div class="form-group">
        <h5>Quyền nhân viên</h5>
        <input type="radio" name="role" <?php if($row['role']=='admin') echo "checked" ?> value="admin"> Quản trị viên&emsp;<input type="radio" name="role" <?php if($row['role']=='employee') echo "checked" ?> value="enployee">Nhân viên CSKH&emsp;<input type="radio" name="role" <?php if($row['role']=='shipper') echo "checked" ?> value="shipper">Nhân viên giao hàng
        </div>
        <div class="form-group">
        <span>Tỉnh/Thành phố</span>
        <div class="form-group">
                <select class="form-control province" name="province" placeholder="Chọn tỉnh/thành phố" require>
                    <option selected> Chọn tỉnh / thành </option>
                    <?php
                    require '../config.php';
                    $query1 = "SELECT * FROM province";
                    $result1 = $conn->query($query1);
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                            $id_province = $row1['id_province'];
                            $name = $row1['name'];
                            if($row['province'] == $id_province){
                                ?>
                                <option selected value="<?= $id_province ?>"> <?=$name?> </option>
                                <?php
                            }
                            else
                            {
                                ?>
                                <option value="<?= $id_province ?>"> <?=$name?> </option>
                                <?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php 
        $id_district = $row['district'];
        $query_district = "SELECT * FROM district WHERE id_district = $id_district";
        $result_district = $conn->query($query_district);
        $row_district = $result_district->fetch_assoc();
        $id = $row_district['id_district'];
        $district = $row_district['name'];
        ?>
        <div class="form-group">
            <select class="form-control district" name="district" placeholder="Chọn quận/huyện" require>
                <option selected value="<?= $id?>"><?= $district ?> </option>
            </select>
        </div>
        <div class="form-group">
        <span>Địa Chỉ</span>
        <input type="text" name="address" class="form-control" value="<?= $row['address'] ?>" >
        </div>
        <div class="form-group">
        <span>Mật Khẩu</span>
        <input type="text" name="password" class="form-control" value="<?= md5($row['password']) ?>" >
        </div>
        <div class="form-group">
        <a href='admin_home.php?loadpage=ql_emp.php' class='badge badge-primary p-2'>Quay về</a>
        <input type="submit" name="sua" style='background-color: #6be56d;' value="Lưu thay đổi">        
        <a style='background-color: #fc3232;' href='delete_emp.php?id_ad=<?=$id_ad;?>' class='badge badge-primary p-2'>Xóa NV</a>              
        </div>
    </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="./js/provice.js"> </script>
