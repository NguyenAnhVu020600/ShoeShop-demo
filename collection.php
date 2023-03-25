<?php
session_start();
require 'header.php';
require 'layout.php';
require 'config.php';
?>
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="img/slideshow_5.jpg" style="width:100%">
        <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
        <img src="img/slideshow_4.jpg" style="width:100%">
        <div class="text">Caption Two</div>
    </div>
    <div class="mySlides fade">
        <img src="img/slideshow_3.jpg" style="width:100%">
        <div class="text">Caption Three</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<div class="breadcrumb-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li>
                        <a href="index.php">
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="collection.php">
                            <span>Danh mục</span>
                        </a>
                    </li>
                    <li>
                        <span><span style="color: #777777">Tất cả sản phẩm</span></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--List Prodct-->
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
            <div class="wrap-filter">
                <div class="box_sidebar">
                    <div class="block left-module">
                        <div class=" filter_xs">
                            <div class="group-menu">
                                <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                    Danh mục sản phẩm
                                    <span><i class="fa fa-angle-down" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"></i></span>
                                </div>
                                <div class="block_content layered-category collapse" id="collapseExample1">
                                    <div class="layered-content card card-body" style="border:0;padding:0">
                                        <ul class="menuList-links">
                                            <li class=""><a href="index.php" title="Trang chủ"><span>Trang chủ</span></a></li>
                                            <li class=" active "><a href="collection.php" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                                            <li class=""><a href="introduce.php" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                                            <li class=""><a href="blog.php" title="Blog"><span>Blog</span></a></li>
                                            <li class=""><a href="contact.php" title="Liên hệ"><span>Liên hệ</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="layered">
                                <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                    Bộ lọc sản phẩm
                                    <span><i class="fa fa-angle-down" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"></i></span>
                                </p>
                                <div class="block_content collapse" id="collapseExample2">
                                    <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                                        <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                        <div class="layered-content bl-filter filter-brand">
                                            <ul class="check-box-list">
                                                <li>
                                                    <input type="checkbox" id="data-brand-p1" value="Khác">
                                                    <label for="data-brand-p1">Khác</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="group-filter" aria-expanded="true">
                                        <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                        <div class="layered-content bl-filter filter-price">
                                            <ul class="check-box-list">
                                                <li>
                                                    <input type="checkbox" id="p1">
                                                    <label for="p1">
                                                        <span>Dưới</span> 500,000₫
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="p2">
                                                    <label for="p2">
                                                        500,000₫ - 1,000,000₫
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="p3">
                                                    <label for="p3">
                                                        1,000,000₫ - 1,500,000₫
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="p4">
                                                    <label for="p4">
                                                        2,000,000₫ - 5,000,000₫
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="p5">
                                                    <label for="p5">
                                                        <span>Trên</span> 5,000,000₫
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="group-filter" aria-expanded="true">
                                        <div class="layered_subtitle dropdown-filter"><span>Màu sắc</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                        <div class="layered-content filter-color s-filter">
                                            <ul class="check-box-list">
                                                <li>
                                                    <input type="checkbox" id="data-color-p1">
                                                    <label for="data-color-p1" style="background-color: #fb4727"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p2">
                                                    <label for="data-color-p2" style="background-color: #fdfaef"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p3">
                                                    <label for="data-color-p3" style="background-color: #3e3473"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p4">
                                                    <label for="data-color-p4" style="background-color: #ffffff"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p5">
                                                    <label for="data-color-p5" style="background-color: #75e2fb"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p6">
                                                    <label for="data-color-p6" style="background-color: #cecec8"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p7">
                                                    <label for="data-color-p7" style="background-color: #6daef4"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p8">
                                                    <label for="data-color-p8" style="background-color: #000000"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p9">
                                                    <label for="data-color-p9" style="background-color: #e2262a"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p10">
                                                    <label for="data-color-p10" style="background-color: #ee8aa1"></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="data-color-p11">
                                                    <label for="data-color-p11" style="background-color: #4a5250"></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="group-filter" aria-expanded="true">
                                        <div class="layered_subtitle dropdown-filter"><span>Kích thước</span><span class="icon-control"><i class="fa fa-minus"></i></span></div>
                                        <div class="layered-content filter-size s-filter">

                                            <ul class="check-box-list clearfix">

                                                <li>
                                                    <input type="checkbox" id="data-size-p1">
                                                    <label for="data-size-p1">35</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" id="data-size-p2">
                                                    <label for="data-size-p2">36</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" id="data-size-p3">
                                                    <label for="data-size-p3">37</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" id="data-size-p4">
                                                    <label for="data-size-p4">38</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" id="data-size-p5">
                                                    <label for="data-size-p5">39</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" id="data-size-p6">
                                                    <label for="data-size-p6">40</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="wrap-collection-title row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <h1 class="title">
                        Tất cả sản phẩm
                    </h1>
                    <div class="alert-no-filter"></div>
                </div>
                <div class="col-md-4 d-sm-none d-md-block d-none d-sm-block" style="float: left">
                    <div class="option browse-tags">
                        <span class="custom-dropdown custom-dropdown--grey">
                            <select class="sort-by custom-dropdown__select">
                                <option value="price-ascending">Giá: Tăng dần</option>
                                <option value="price-descending">Giá: Giảm dần
                                </option>
                                <option value="title-ascending">Tên: A-Z</option>
                                <option value="title-descending">Tên: Z-A</option>
                                <option value="created-ascending">Cũ nhất
                                </option>
                                <option value="created-descending">Mới nhất
                                </option>
                                <option value="best-selling">Bán chạy nhất
                                </option>
                                <option value="quantity-descending">Tồn kho: Giảm dần</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                require 'config.php';
                $query = "SELECT * FROM products";
                $result = $conn->query($query);
                if (!$result) echo "cau truy van bi sai";
                if ($result->num_rows != 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id_product = $row['id_product'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $thumbnail = $row['thumbnail'];
                        $thumbnail_2 = $row['thumbnail_2'];
                    ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                            <div class="product-block">
                                <div class="product-img fade-box">
                                    <a href="product.php?id_product=<?= $id_product;  ?>" class="img-resize">
                                        <img src="img/shoes/<?= $thumbnail; ?>" class="lazyloaded">
                                        <img src="img/shoes/<?= $thumbnail_2 ?>" class="lazyloaded">
                                    </a>
                                    <div class="button-add">
                                        <button type='submit' href="product.php?id_product=<?= $id_product;  ?>" class="action">Mua ngay</button>
                                        <button type='submit' href="product.php?id_product=<?= $id_product;  ?>" class="action add-to-cart">Thêm vào giỏ</button>
                                    </div>
                                </div>
                                <div class="product-detail clearfix">
                                    <div class="pro-text">
                                        <a href="#" inspiration pack><?= $name ?></a>
                                    </div>
                                    <div class="pro-price">
                                        <a><?php echo number_format("$price"); ?>đ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
<script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="js/home.js"></script>
<script src="js/script.js"></script>
<script src="js/slide.js"></script>
<script src="plugins/uikit/uikit.min.js"></script>
<script src="plugins/uikit/uikit-icons.min.js"></script>