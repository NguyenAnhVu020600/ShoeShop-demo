<?php
require '../config.php';
if(isset($_POST['add_emp']))
{
    $pass = $_POST['password'];
    $repass = $_POST['confirm_pass'];
    if($pass == $repass)
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $Email = $_POST['email'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $address = $_POST['address'];
        $role = $_POST['role'];
        
        $q = "SELECT * FROM admin WHERE email = '$email'";
        $r = $conn->query($q);
        if($r->num_rows == 0)
        {
            $query = "INSERT INTO admin(username,email,password,phone,province,district,address,role)
            VALUES('$username','$Email','$pass','$phone','$province','$district','$address','$role')";
            if($conn->query($query)==true)
            {
                
                $_SESSION['thongbaoQlNV'] = "Thêm nhân viên thành công!";
                header ("location:admin_home.php?loadpage=ql_emp.php");
            }
        }
        else
        {
            session_start();
            $_SESSION['thongbaoAddNV'] = "Email đã có người sử dụng!";
            header ("location:admin_home.php?loadpage=add_employee.php");
        }
        
    }
    else {
        session_start();
        $_SESSION['thongbaoAddNV'] = "Mật khẩu không kớp! vui lòng nhập lại.";
        header ("location:admin_home.php?loadpage=add_employee.php");
    }
}
