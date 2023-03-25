<?php

require 'config.php';

if(isset($_POST['register']))
{
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $username= $_POST['lastname'].' '.$_POST['firstname'] ;

    if($password == $confirm_password)
    {
        $q = "SELECT * FROM users WHERE email = '$email'";
        $r = $conn->query($q);
        if($r->num_rows == 0)
        {
            $query = "INSERT INTO users (firstname,lastname,email,address,password,phone)
            VALUES ('$firstname','$lastname','$email','$address','$password','$phone')";
            if ($conn->query($query) === TRUE) {
            ?>
            <div class="container thanks">
                <div class="row">
                    <div class="col s12 m3">
                    </div>
                    <div class="col s12 m6">
                        <div class="card center-align">
                            <div class="card-image">
                                <img src="img/tich-xanh.png" class="responsive-img" alt="">
                            </div>
                            <div class="card-content center-align">
                                <h5>Xin chào</h5>
                                <h3 class="blue-text"><?php echo $username; ?></h3>
                                </p>
                            </div>
                        </div>
                        <div class="center-align">
                            <a href="login.php" class="button-rounded blue btn waves-effects waves-light">Hãy đăng nhập</a>
                        </div>
                    </div>
                    <div class="col s12 m3">
                    </div>
                </div>
            </div>
            <?php
            }
        }
        else
            {
                session_start();
                $_SESSION['thongbaoregister'] = "Email này đã có người sử dụng!";
                header ("location:register.php");
            }
    } 
    else {
        session_start();
        $_SESSION['thongbaoregister'] = "Mật khẩu không khớp! vui lòng nhập lại.";
        header("location:register.php");
    }
    
    $conn->close();
}
?>