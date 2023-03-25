<?php
    if (session_id() === '') session_start();
    require '../config.php';
    if(isset($_GET['chitietsp']))
    {
        $_SESSION['id_product'] = $_GET['chitietsp'];
        $_SESSION['tieude'] = "Xem/Sửa thông tin sản phẩm";
        header ("location:admin_home.php?loadpage=product_detail.php");
    }
    
    $id_product = $_SESSION['id_product'];
    $query = "SELECT products.id_product,products.name as 'product',products.price,products.thumbnail,
    category.id_category,category.name,products.id_category,products.inventory
    FROM products,category 
    where products.id_category = category.id_category and id_product = '$id_product'";
    $result = $conn->query($query);
    if(!$result) echo 'Cau truy van bi sai';
    $row = $result->fetch_assoc();
?>
<div class="row">
    <div class="container">
    <center><h3  class="text-justify-center text-info">Nhập thông tin sản phẩm</h3></center>
        <div class="row">        
        <form action="action.php" method="post" enctype="multipart/form-data">
            <div class="form-group" style="text-align:center">
            <center><img style="width: 400px" src="../img/shoes/<?=$row['thumbnail'];?>"></center>
            </div>
            <div class="form-group">
            <span>Mã sản phẩm</span>
            <input readonly disabled type="text" class="form-control" value="<?= $row['id_product'] ?>" >
            </div>
            <div class="form-group">
            <span>Tên sản phẩm</span>
            <input type="text" name="tensp" class="form-control" value="<?= $row['product'] ?>" >
            </div>
            <div class="form-group">
            <span>Đơn giá</span>
            <input required type="number" name="dongia" class="form-control" value="<?= $row['price'] ?>" >
            </div>
            <div class="form-group">
            <span>Số lượng trong kho</span>
            <input required type="number" name="soluong" class="form-control" value="<?= $row['inventory'] ?>" >
            </div>
            <div class="form-group">
            <span>Nhóm sản phẩm</span>
            <?php
            $query2 = "SELECT * FROM category";
            $result2 = $conn->query($query2);
            if(!$result2) echo 'Cau truy van bi sai';
            ?>
            <select name="category">
                <option value="<?= $row['id_category'] ?>" selected="selected"><?= $row['name']?></option>
                <?php while ($row2 = $result2->fetch_assoc()) { ?>
                    <option value="<?= $row2['id_category'] ?>" ><?= $row2['name'] ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="form-group">
            <span>Hình ảnh</span><input type="hidden" name="thumbnail" value="<?=$row['thumbnail'];?>">
                <br><input type="file" name="hinh" class="custom-file">
            </div>
            
            <a href='adminHome.php?loadpage=QLSanpham.php' class='badge badge-primary p-2'>Quay về</a>
            <input type="submit" name="suaSP" style='background-color: #6be56d;' value="Lưu thay đổi">        
            <a style='background-color: #fc3232;' href='action.php?xoaSP=<?=$Masp;?>' class='badge badge-primary p-2'>Xóa sp</a>              
        </form>
        </div>
    </div>
</div>