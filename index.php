<?php
session_start();
require 'header.php';
require 'layout.php';
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
<div class="content">
    <div class="container">
        <div class="hot_sp" style="padding-bottom: 10px;">
            <h2 style="text-align:center;padding-top: 10px">
                <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm bán chạy</a>
            </h2>
            <div class="view-all" style="text-align:center;padding-top: -10px;">
                <a style="color: black;text-decoration: none" href="">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <?php
            require 'config.php';
            $query = "SELECT
            products.id_product as 'id_product',
            products.name as 'name',
            products.price as 'price',
            products.thumbnail as 'thumbnail',
            products.thumbnail_2 as 'thumbnail_2',

            SUM(orders.quantity) as 'total',
            orders.status,
            orders.id_product

            FROM products, orders
            WHERE products.id_product = orders.id_product AND orders.status = 'paid'
            GROUP BY products.id_product
            ORDER BY SUM(orders.quantity) DESC LIMIT 8";
            $result = $conn->query($query);
            if (!$result) echo "cau truy van bi sai";
            if ($result->num_rows != 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_product = $row['id_product'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $thumbnail = $row['thumbnail'];
                    $thumbnail_2 = $row['thumbnail_2'];
                    $total = $row['total'];
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
                                <div class="pro-total">
                                    <a class="white-text"><i class='bx bx-cart-alt'></i> <?= $total; ?></a>
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
    <section class="section wrapper-home-banner">
        <div class="container-fluid" style="padding-bottom: 50px;">
            <div class="container" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image fade-box">
                                    <img class="lazyloaded" src="img/shoes/block_home_category1_grande.jpg" alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p>Bộ sưu tập</p>
                                    <h2>
                                        Đại sứ thương hiệu
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image fade-box">
                                    <img class="lazyloaded" src="img/shoes/block_home_category2_grande.jpg" alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p>Bộ sưu tập</p>
                                    <h2>
                                        Thương hiệu
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image">
                                    <img class="lazyloaded" src="img/shoes/block_home_category3_grande.jpg" alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p></p>
                                    <h2>
                                        Blog
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <div class="container">
            <div class="hot_sp">
                <h2 style="text-align:center;">
                    <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới</a>
                </h2>
                <div class="view-all" style="text-align:center;">
                    <a style="color: black;text-decoration: none" href="collection.php">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <?php
            $query_pro = "SELECT *  FROM products LIMIT 8";
            $result_pro = $conn->query($query_pro);
            if ($result_pro->num_rows != 0) {
                while ($row_pro = $result_pro->fetch_assoc()) {
                    $id_product_pro = $row_pro['id_product'];
                    $name_pro = $row_pro['name'];
                    $price_pro = $row_pro['price'];
                    $thumbnail_pro = $row_pro['thumbnail'];
                    $thumbnail_2_pro = $row_pro['thumbnail_2'];
            ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                        <div class="product-block">
                            <div class="product-img fade-box">
                                <a href="product.php?id_product=<?= $id_product_pro; ?> " class="img-resize">
                                    <img src="img/shoes/<?= $thumbnail_pro ?>" class="lazyloaded">
                                    <img src="img/shoes/<?= $thumbnail_2_pro ?>" class="lazyloaded">
                                </a>
                            </div>
                            <div class="product-detail clearfix">
                                <div class="pro-text">
                                    <a style=" color: black; font-size: 14px;text-decoration: none;" href="#">
                                        <?= $name_pro ?>
                                    </a>
                                </div>
                                <div class="pro-price">
                                    <p class=""><?php echo number_format("$price_pro") ?>đ</p>
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
<?php
require 'footer.php';
?>
<script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
<script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="js/home.js"></script>
<script src="js/script.js"></script>
<script src="js/slide.js"></script>
<script src="plugins/uikit/uikit.min.js"></script>
<script src="plugins/uikit/uikit-icons.min.js"></script>