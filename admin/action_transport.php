<?php
require '../config.php';
if(isset($_GET['dagiao']))
{
    $id_order = $_GET['dagiao'];
    $query = "UPDATE orders SET status ='paid' WHERE id_order = '$id_order'";
    $result = $conn->query($query);
    if(!$result) echo 'Cau truy van bi sai';
    else
    {    
        header ("location:shipper_home.php");        
    }
}
?>
