<?php
session_start();
require 'header.php';
require 'layout.php';
?>

<div class="container-login">
    <div class="content">
        <div id="large-header" class="large-header">
            <h1>Register Form</h1>
            <div class="main-agileits1">
                <!--form-stars-here-->
                <div class="form-w3-agile">
                    <h2>Register Now</h2>
                    <form action="action_register.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="text" name="firstname" placeholder="Firstname" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="text" name="lastname" placeholder="Lastname" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="text" name="email" placeholder="Email " required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="text" name="phone" placeholder="Phone" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="password" name="password" placeholder="Password" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3">
                                    <input type="password" name="confirm_password" placeholder="Confirm Password" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 col-12">
                                <div class="form-sub-w3" style="text-align:center">
                                    <input type="text" name="address" placeholder="Address" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-map-marker " aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                        include 'action_register.php';
                        if (isset($_SESSION['thongbaoregister'])) {
                            echo '<div style="color:red; text-align:center">
                            <span>* ' . $_SESSION['thongbaoregister'] . '</span>
                            </div>';
                            unset($_SESSION['thongbaoregister']);
                        } ?>
                        <div class="submit-w3l">
                            <input type="submit" value="Register" name="register">
                        </div>

                    </form>
                    <div class="social w3layouts">
                        <p class="p-bottom-w3ls2">User? <a class href="login.php"> Login here</a></p>
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