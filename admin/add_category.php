

<div class="container">
    <?php if (isset($_POST['add_category'])) {
        $_SESSION['tieude'] = "Thêm loại sản phẩm ";
        header("location:admin_home.php?loadpage=add_category.php");
    }
    ?>
    <div class="row">
        <h3 class="text-justify-center text-info">Nhập tên loại sản phẩm mới</h3>
        <form action="action_add_category.php" method="post">
            <div class="form-group" style="padding-top: 50px;">
                <input type="text" name="name_category" class="form-control" placeholder="Tên loại sản phẩm">
            </div>
            <div class="form-group">
                <input type="submit" name="addlsp" class="btn btn-primary btn-block" value="Thêm loại">
            </div>
        </form>
    </div>
</div>