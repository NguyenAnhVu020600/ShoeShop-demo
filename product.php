<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:login.php');
}
else
{
    require 'header.php';
    require 'layout.php';
    $id_product = $_GET['id_product'];
    $id_user = $_SESSION['id_user'];
}

?>

<div id="product" class="productDetail-page">
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li>
                            <a href="index.php">
                                <span">Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="product.php">
                                <span>Sản phẩm</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row product-detail-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row product-detail-main pr_style_03">
                <div class="col-md-7 col-sm-12 col-xs-12 ">
                    <div class="product-gallery">
                        <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                            <div class="product-gallery__thumbs thumb-fix">
                                <?php
                                include 'config.php';
                                $querypic = "SELECT picture, id_product FROM pictures WHERE id_product = '$id_product'";
                                $result_pic = $conn->query($querypic);
                                if ($result_pic->num_rows > 0) {
                                    $dem = 1;
                                    while ($rowpic = $result_pic->fetch_assoc()) {
                                        $pics = $rowpic['picture'];
                                        if ($dem == 1) {
                                    ?>
                                            <div class="product-gallery__thumb active" id="<?= $dem ?>">
                                                <a class="product-gallery__thumb-placeholder" href="javascript:void(0);">
                                                    <img src="img/detailproduct/<?= $pics ?>" onclick="next_pic(this) ">
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="product-gallery__thumb" id="<?= $dem ?>">
                                                <a class="product-gallery__thumb-placeholder" href="javascript:void(0);" >
                                                    <img src="img/detailproduct/<?= $pics ?>" onclick="next_pic(this)">
                                                </a>
                                            </div>
                                    <?php
                                        }
                                        $dem++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="product-image-detail box__product-gallery scroll hidden-xs">
                            <?php
                            $querypic = "SELECT picture, id_product FROM pictures WHERE id_product = '$id_product'";
                            $result_pic = $conn->query($querypic);
                            if ($result_pic->num_rows > 0) {
                                $dem = 1;
                                while ($rowpic = $result_pic->fetch_assoc()) {
                                    $pics = $rowpic['picture'];
                            ?>
                                    <div class="product-image-detail box__product-gallery">
                                        <ul id="sliderproduct" class="site-box-content slide_product">
                                            <li class="product-gallery-item gallery-item current " id="<?= $dem ?>">
                                                <img class="product-image-feature " src="img/detailproduct/<?= $pics ?>" id="imgBox">
                                            </li>
                                        </ul>
                                    </div>
                            <?php
                                    $dem++;
                                }
                            }
                            ?>
                            <div class="product-image__button">
                                <div id="product-zoom-in" class="product-zoom icon-pr-fix " aria-label="Zoom in" title="Zoom in">
                                    <span class="zoom-in" aria-hidden="true">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width: 30px; height: 30px;" xml:space="preserve">
                                            <polyline points="6,14 9,11 14,16 16,14 11,9 14,6 6,6 " />
                                            <polyline points="22,6 25,9 20,14 22,16 27,11 30,14 30,6 " />
                                            <polyline points="30,22 27,25 22,20 20,22 25,27 22,30 30,30 " />
                                            <polyline points="14,30 11,27 16,22 14,20 9,25 6,22 6,30 " />
                                        </svg>
                                    </span>
                                </div>
                                <div class="gallery-index icon-pr-fix"><span class="current">1</span> / <span class="total">4</span></div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
                    <div class="product-content-desc-1">
                        <?php
                        $queryproduct = "SELECT id_product ,name, price, description, id_picture
                            FROM products WHERE id_product = '$id_product'";
                        $result1 = $conn->query($queryproduct);
                        if ($result1->num_rows > 0) {
                            // output data of each row
                            while ($rowproduct = $result1->fetch_assoc()) {
                                $id_productdb = $rowproduct['id_product'];
                                $name_product = $rowproduct['name'];
                                $price_product = $rowproduct['price'];
                                $id_pic = $rowproduct['id_picture'];
                                $description = $rowproduct['description'];
                            }
                        }
                        ?>
                        <div class="product-title">
                            <h1><?= $name_product ?></h1>
                        </div>
                        <div class="product-price" id="price-preview"><span class="pro-price">Giá: <?php echo number_format("$price_product");?>đ</span></div>
                        <form id="add-item-form" method="post"  class="variants clearfix">
                            
                            <div class="select-swatch clearfix">
                                
                                <div id="variant-swatch-0" class="swatch clearfix">
                                <div class="header" style="background: white; color: #272727;">
                                <?php
                                $querycolor = "SELECT * FROM color WHERE id_product = '$id_product'";
                                $result_color = $conn->query($querycolor);
                                if ($result_color->num_rows > 0) {
                                    while ($rowcolor = $result_color->fetch_assoc()) {
                                        $color = $rowcolor['color'];
                                        $id_color = $rowcolor['id_color'];
                                        ?>
                                            <span><?=$color?></span> &ensp;
                                        <?php
                                    }
                                }
                                ?>
                                </div>
                                    
                                    <div class="select-swap">
                                        <?php
                                        $querycolor = "SELECT * FROM color WHERE id_product = '$id_product'";
                                        $result_color = $conn->query($querycolor);
                                        $dem=1;
                                        if ($result_color->num_rows > 0) {
                                            while ($rowcolor = $result_color->fetch_assoc()) {
                                                $color = $rowcolor['color'];
                                                $id_color = $rowcolor['id_color'];
                                                if($dem==1)
                                                {
                                                    ?>
                                                    <div class="n-sd swatch-element color active">
                                                        <input id="swatch-<?=$color?>" type="radio" name="color" value="<?=$color?>"  checked>
                                                        <label class="<?=$color?> swatch-element-color sd" for="swatch-<?=$color?>">
                                                            <span><?=$color?></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <div class="n-sd swatch-element color">
                                                            <input id="swatch-<?=$color?>" type="radio" name="color" value="<?=$color?>"  >
                                                            <input type="radio" name="color" value="12345"  >
                                                            <label class="<?=$color?> swatch-element-color sd" for="swatch-<?=$color?>">
                                                                <span><?=$color?></span>
                                                            </label>
                                                        </div>
                                                    <?php
                                                }
                                                $dem++;
                                            }
                                        }
                                        ?>

                                    </div>
                                    
                                </div>

                                <div id="variant-swatch-1" class="swatch clearfix" data-option="option2" data-option-index="1">
                                    <div class="select-swap">
                                        <?php
                                        $querysize = "SELECT size, id_product FROM size WHERE id_product = '$id_product'";
                                        $result_size = $conn->query($querysize);
                                        if ($result_size->num_rows > 0) {
                                            $dem = 1;
                                            while ($rowsize = $result_size->fetch_assoc()) {
                                                $size = $rowsize['size'];
                                                if ($dem == 1) {
                                        ?>
                                                    <div data-value="<?= $size ?>" class="n-sd swatch-element active">
                                                        <input id="swatch-1-<?= $size ?>" type="radio" name="size" value="<?= $size ?>" checked />
                                                        <label class="swatch-element-item" for="swatch-1-<?= $size ?>">
                                                            <span><?= $size ?></span>
                                                        </label>

                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div data-value="<?= $size ?>" class="n-sd swatch-element">
                                                        <input id="swatch-1-<?= $size ?>" type="radio" name="size" value="<?= $size ?>" />
                                                        <label class="swatch-element-item" for="swatch-1-<?= $size ?>">
                                                            <span><?= $size ?></span>
                                                        </label>
                                                    </div>
                                        <?php
                                                }
                                                $dem++;
                                            }
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <div class="selector-actions">
                                <div class="quantity-area clearfix">
                                    <input type="button" value="-" onclick="minusQuantity()" class="qty-btn minus">
                                    <input type="text" id="quantity" name="quantity" value ="1" min="1" class="quantity-selector">
                                    <input type="button" value="+" onclick="plusQuantity()" class="qty-btn plus">
                                </div>
                                
                                <div class="wrap-addcart clearfix">
                                    <div class="row-flex">
                                        <?php
                                        if (isset($_POST['add'])) {
                                            $quantity_pr = $_POST['quantity'];
                                            $size = $_POST['size'];
                                            $color = $_POST['color'];
                                            $querybuy = "SELECT * FROM orders WHERE id_product = '$id_product' AND id_user='$id_user' AND status='ordering' AND size = '$size' AND color = '$color'";
                                            $resultbuy=$conn->query($querybuy);
                                            if($resultbuy->num_rows == 0)
                                            {
                                                $q = "INSERT INTO orders (id_product,quantity,size,color ,status, id_user)
                                                VALUES ('$id_product','$quantity_pr','$size','$color','ordering', '$id_user')";
                                                $r=$conn->query($q);
                                                if($r === True)
                                                {
                                                    echo "<meta http-equiv='refresh' content='0;url=product.php?id_product=$id_product' />";
                                                }
                                                else echo "lỗi";
                                            }
                                            else
                                            {
                                                $row=$resultbuy->fetch_assoc();
                                                $sl = $row['quantity'] + $quantity_pr;
                                                $q = "UPDATE orders SET quantity ='$sl' WHERE id_product = '$id_product' AND id_user = '$id_user' AND size = '$size' AND color = '$color' AND status = 'ordering'";
                                                $r = $conn->query($q);
                                                if(!$r) echo "truy vấn lỗi";
                                                echo "<meta http-equiv='refresh' content='0;url=product.php?id_product=$id_product' />";
                                            }                  
                                        }
                                        if (isset($_POST['buy'])) {
                                            $quantity_pr = $_POST['quantity'];
                                            $size = $_POST['size'];
                                            $color = $_POST['color'];
                                            $querybuy = "SELECT * FROM orders WHERE id_product = '$id_product' AND id_user='$id_user' AND status='ordering' AND size = '$size' AND color = '$color'";
                                            $resultbuy=$conn->query($querybuy);
                                            if($resultbuy->num_rows == 0)
                                            {
                                                $q = "INSERT INTO orders (id_product,quantity,size,color ,status, id_user)
                                                VALUES ('$id_product','$quantity_pr','$size','$color','ordering', '$id_user')";
                                                $r=$conn->query($q);
                                                if($r === True)
                                                {
                                                    echo "<meta http-equiv='refresh' content='0;url=pay.php?id_product=$id_product' />";
                                                }
                                                else echo "lỗi";
                                            }
                                            else
                                            {
                                                $row=$resultbuy->fetch_assoc();
                                                $sl = $row['quantity'] + $quantity_pr;
                                                $q = "UPDATE orders SET quantity ='$sl' WHERE id_product = '$id_product' AND id_user = '$id_user' AND size = '$size' AND color = '$color' AND status = 'ordering'";
                                                $r = $conn->query($q);
                                                if(!$r) echo "truy vấn lỗi";
                                                echo "<meta http-equiv='refresh' content='0;url=pay.php?id_product=$id_product'/>";
                                            }                  
                                        }
                                        
                                        ?>
                                        <button type="submit" name="add" class="button btn-addtocart addtocart-modal">Thêm vào</button>
                                        <button type="submit" name="buy" class="buy-now button" style="display: block;">Mua ngay</button> 
                                    </div>

                                    <a href="" target="_blank" class="button btn-check" style="color: #ffffff;text-decoration:none;"><span>Click nhận mã giảm giá ngay!</span></a>

                                </div>
                            </div>
                        </form>
                        <div class="product-description">
                            <div class="title-bl">
                                <h2>Mô tả</h2>
                            </div>
                            <div class="description-content">
                                <div class="description-productdetail">
                                    <?= $description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-zoom11">
    <div class="product-zom">
        <div class="divclose">
            <i class="fa fa-times-circle"></i>
        </div>
        <div class="owl-carousel owl-theme owl-product1">
            <?php
            $querypic = "SELECT picture, id_product FROM pictures WHERE id_product = '$id_product'";
            $result_pic = $conn->query($querypic);
            if ($result_pic->num_rows > 0) {
                while ($rowpic = $result_pic->fetch_assoc()) {
                    $pics = $rowpic['picture'];
            ?>
                    <div class="item"><img src="img/detailproduct/<?= $pics ?>" alt="">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
    require 'footer.php';
    ?>
<script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
<script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/owl.carousel/owl.carousel.min.js"></script>
<script src="plugins/uikit/uikit.min.js"></script>
<script src="plugins/uikit/uikit-icons.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
<script src="js/slide.js"></script>
<script src="js/home.js"></script>
<script src="js/quantity.js"></script>
<script src="js/next_pic.js"></script>