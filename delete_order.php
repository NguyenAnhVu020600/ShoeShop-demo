<?php
    session_start();
    require_once 'config.php';
    
    if (isset($_GET['id_product']) && isset($_GET['size']) && isset($_GET['color']))
    {
        $id_product=$_GET['id_product'];
        $id_user = $_SESSION['id_user'];
        $size = $_GET['size'];
        $color = $_GET['color'];
        
        $query_delete = "DELETE FROM orders WHERE id_user = '$id_user' AND id_product = '$id_product' AND status = 'ordering' AND size = '$size' AND color='$color'";
        $result_delete = $conn->query($query_delete);
        $_SESSION['item'] -= 1;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header('Location: login.php');
    }
?>

