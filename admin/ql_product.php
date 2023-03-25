<div class="container">
<form method="POST" action="add_category.php">
    <div class="form-group">
        <table>
            <tr>
                <td colspan =3><input size=200px type="text" name="timQLSP" class="form-control" placeholder="Tìm kiếm..."></td>
                <td><input  type="submit" name="timkiemQLSP" class="btn btn-primary btn-block" value="Tìm kiếm"></td>
            </tr>
        </table>      
                
    </div>
    <?php
        if (session_id() === '') session_start();
        require '../config.php';
        if (isset($_GET['id']) == '1') {
            if ($_SESSION['role'] == 'admin') {
                $_SESSION['tieude'] = "Quản lý sản phẩm";
                header("location:admin_home.php?loadpage=ql_product.php");
            } else header("location:admin_home.php?loadpage=-1");
        }
        // if(isset($_SESSION['timkiemQLSP']))
        // {
        //     $key = $_SESSION['timkiemQLSP'];
        //     $query = "SELECT * FROM nhomsp WHERE manhom LIKE '$key' OR tennhom LIKE '$key'";
        //     $q = "SELECT * FROM sanpham,nhomsp WHERE sanpham.manhom = nhomsp.manhom and (masp LIKE '$key' or nhomsp.tennhom LIKE '$key' or tensp LIKE '$key' or mota LIKE '$key'  ) ORDER BY sanpham.soluong";
        //     unset($_SESSION['timkiemQLSP']);
        // } 
        
        $query = "SELECT * FROM category";
        $q = "SELECT products.id_product,products.name as 'product',products.id_category, category.id_category,category.name,
        products.price,products.inventory,products.thumbnail
        FROM products,category WHERE products.id_category = category.id_category";
        $result = $conn->query($query);
        if(!$result) echo 'Cau truy van bi sai';
    ?>
    <h3 class="text-center text-info">Danh sách loại sản phẩm</h3>
    <?php if(isset($_SESSION['thongbaoAddNSP']))
        {
            echo '<div class="form-group">
            <span style="color:red">'.$_SESSION['thongbaoAddNSP'].'</span>
            </div>';
            unset($_SESSION['thongbaoAddNSP']);
        } ?>
    <div class="form-group">
        <input  type="submit" name="add_category" class="btn btn-primary btn-block" value="Thêm loại sản phẩm">            
    </div>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Mã Loại sản phẩm</th>
            <th>Tên Loại</th>
            <?php
                if($_SESSION['role'] != 'shipper') echo "<th>Tuỳ chọn</th>";
            ?>
        </tr>
        </thead>          
        <tbody>
        <?php $d=0; while ($row = $result->fetch_assoc()) {$d++;
            if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><?= $row['id_category']; ?></td>
            <td><?= $row['name']; ?></td>
            <?php
            if($_SESSION['role'] != 3)
            {
                $id_category = $row['id_category'];
                echo "<td><a style='background-color: #ff7070;' class='btn btn-primary' href='delete_category.php?xoalsp=$id_category'>Xóa</a></td>";
                                
            } 
            ?>        
        </tr>
        <?php } ?>
        </tbody>
    </table>    
    <h3 class="text-center text-info">Danh sách sản phẩm</h3>
    <?php if(isset($_SESSION['thongbaoAddSP']))
        {
            echo '<div class="form-group">
            <span style="color:red">'.$_SESSION['thongbaoAddSP'].'</span>
            </div>';
            unset($_SESSION['thongbaoAddSP']);
        } ?>
    <div class="form-group">
        <input  type="submit" name="goAddSanpham" class="btn btn-primary btn-block" value="Thêm sản phẩm">            
    </div>
    <table class="table table-hover" id="data-table">
        <thead>
        <tr bgcolor="#95f461">
            <th>Ảnh minh họa</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <!-- <th style="text-align: center;">Mô tả</th> -->
            <th>Số lượng tồn</th>
            <th>Tên loại </th>
            <?php
                if($_SESSION['role'] != 'shipper') echo "<th>Tuỳ chọn</th>";
            ?>
        </tr>
        </thead>    
        <tbody>
        <?php
            $r = $conn->query($q);
            if(!$r) echo 'Cau truy van bi sai';
            $d=0; while ($row2 = $r->fetch_assoc()) {$d++;
            if($row2['inventory']==0) $bg="#f27171";
            else
            {
                if($d%2==1) $bg="#b0e5e5"; else $bg= "white";
            }            
            ?>
        <tr bgcolor="<?php echo $bg; ?>">
            <td><img style="width: 100px;" src="../img/shoes/<?= $row2['thumbnail']; ?>" ></td>
            <td><?= $row2['id_product']; ?></td>
            <td><?= $row2['product']; ?></td>
            <td><?= $row2['price']; ?></td>
            <!-- <td><?= $row2['description']; ?></td> -->
            <td><?= $row2['inventory']; ?></td>
            <td><?= $row2['name']; ?></td> 
            <?php
            if($_SESSION['role'] != 'shipper')
            {
                $id_product = $row2['id_product'];
                echo "<td><a href='product_detail.php?chitietsp=$id_product' class='badge badge-primary p-2'>Chi tiết</a>
                <a style='background-color: #fc3232;' href='delete_product.php?xoasp=$id_product' class='badge badge-primary p-2'>Xóa SP</a></td>";
            }
            ?>   
        </tr>
        <?php } ?>
        </tbody>
    </table>
    
</form>
</div>