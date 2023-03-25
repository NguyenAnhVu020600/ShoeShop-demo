<?php
if(isset($_POST['change']))
{
    if (session_id() === '') session_start();
    require '../config.php';
    $id_ad = $_SESSION['id_ad'];
    $pass = $_POST['newpass'];
    $repass = $_POST['renewpass'];
    if($pass == $repass)
    {
        
        $q = "UPDATE admin SET password = '$pass' WHERE id_ad = '$id_ad'";
        $result = $conn->query($q);
        if(!$result) echo "truy vấn sai";
        if($result === TRUE)
        {
            $_SESSION['tieude'] = "Thông tin nhân viên";
            $_SESSION['done'] = 1;
            header ("location:admin_home.php?loadpage=profile.php");
        }
    }
    else
    {
        $_SESSION['error'] = 1;
        header ("location:admin_home.php?loadpage=change_pass.php");
    }
}
?>