<?php
require 'header.php';
require 'layout.php';
?>

<div class="container-login">
    <div class="content">
        <div id="large-header" class="large-header">
            <h1>Login Form</h1>
            <div class="main-agileits">
                <!--form-stars-here-->
                <div class="form-w3-agile">
                    <h2>Login Now</h2>
                    <form action="action_login.php" method="post">
                        <div class="form-sub-w3">
                            <input type="text" name="email" placeholder="Email " required="" />
                            <div class="icon-w3">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-sub-w3">
                            <input type="password" name="password" placeholder="Password" required="" />
                            <div class="icon-w3">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </div>
                        </div>
                        <p class="p-bottom-w3ls">Forgot Password?<a class href="#">Click here</a></p>
                        <p class="p-bottom-w3ls1">New User?<a class href="register.php"> Register here</a></p>
                        <div class="clear"></div>
                        <div class="red-text">
                            <?php
                            if (isset($_GET['id']) == '1') {
                                echo "<p>Nhập sai tài khoản hoặc mật khẩu !</p>";
                            }
                            ?>
                        </div>
                        <div class="submit-w3l">
                            <input type="submit" value="Login" name="login">
                        </div>
                    </form>
                    <div class="social w3layouts">
                        <div class="heading">
                            <h5>Or Login with</h5>
                            <div class="clear"></div>
                        </div>
                        <div class="icons">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!--//form-ends-here-->
            </div><!-- copyright -->
            <div class="copyright w3-agile">
                <p> © 2017 Clean Login Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
            </div>
        </div>
    </div>
</div>