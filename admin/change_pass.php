
<div class="container">
    <form method="POST" action="action_change.php">
        <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if(isset($_GET['pass'])==1)
        {    
            $_SESSION['tieude'] = "Đổi mật khẩu";
            header ("location:admin_home.php?loadpage=change_pass.php");
        }
        if(isset($_SESSION['error']) && $_SESSION['error'] ==1)
        {
            echo '<script type="text/javascript">alert("'.'Mật khẩu không khớp!'.'")</script>';
            unset($_SESSION['error']);
        }
        ?>
        <table class="table table-hover" id="data-table">
        <tr>
            <th colspan=2><center><h1 >Thay đổi mật khẩu</h1></center></th>
        </tr>
        <tr><td style="width:650px"><h2 style="text-align: right;">Mật khẩu mới:</h2></td> <td><input style="text-align: left; height: 25px;width: 200px;" name="newpass" type="password" required ></td></tr>
        <tr><td style="width:650px"><h2 style="text-align: right;">Nhập lại mật khẩu:</h2></td> <td><input style="text-align: left; height: 25px;width: 200px;" name="renewpass" type="password" required ></td></tr>
        </table>
        <div class="form-group">
        <input class="btn btn-primary btn-block" type="submit" name="change" value="Đổi" >
        </div>
    </form>
</div>