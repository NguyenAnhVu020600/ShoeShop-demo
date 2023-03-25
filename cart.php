<?php
session_start();
require 'header.php';
require 'layout.php';
// unset($_SESSION['item']);
if(isset($_SESSION['id_user']))
{
    $id_user = $_SESSION['id_user'];
}


?>
<main class="">
    <div id="layout-cart">
        <div class="main-content-cart">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                            <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="index.php" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <span itemprop="item" content="https://runner-inn.myharavan.com/cart"><span itemprop="name">Giỏ hàng (<?php if(!isset($_SESSION['id_user'])) echo '0'; else echo $_SESSION['item'] ?>)</span></span>
                                    <meta itemprop="position" content="2" />
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['item']) || $_SESSION['item'] == 0 ) {
            ?>
                <div class="container">
                    <div class="row layout-cart">
                        <div class="col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-9 col-xs-12">
                                    <h1 class="heading-cart">Giỏ hàng của bạn</h1>

                                    <div class="expanded-message text-center">
                                        Giỏ hàng của bạn đang trống
                                        <p class="link-continue">
                                            <a href="index.php" class="button"><i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-3 col-xs-12 sidebar-cart-fix">
                                    <a href="index.php" class="continue">Tiếp tục mua hàng →</a>
                                    <div class="order-summary-block">
                                        <h2 class="order-summary-title">Thông tin đơn hàng</h2>
                                        <div class="summary-subtotal hidden">
                                            <p class="subtotal">Tạm tính:
                                                <span class="cart-total-price">
                                                    0₫
                                                </span>
                                            </p>
                                            <p class="shipping clearfix">Phí vận chuyển:
                                                <span>---</span>
                                            </p>
                                            
                                        </div>
                                        
                                        <div class="summary-total">
                                            <p>Tổng tiền: <span>0₫</span>
                                            </p>
                                        </div>
                                        <div class="summary-action">
                                            <p>Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
                                            <a class="checkout-btn" href="#">THANH TOÁN</a>
                                        </div>
                                    </div>
                                    <div class="get-code">

                                        <a href="https://m.me/299038867586718?ref=ref_makhuyenmai" target="_blank" class="button btn-check"><span>Click nhận mã giảm giá ngay !</span></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="container">
                    <div class="row layout-cart">
                        <div class="col-md-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-9 col-xs-12">
                                    <h1 class="heading-cart">Giỏ hàng của bạn</h1>

                                    <div class="list-pageform-cart">
                                        <form method="post" id="cartformpage">
                                            <div class="cart-row">
                                                <h2 class="title-number-cart count-cart">
                                                    Bạn đang có <span><?= $_SESSION['item'] ?></span> sản phẩm trong giỏ hàng
                                                </h2>
                                                <div class="table-cart">
                                                    <?php
                                                    include 'config.php';
                                                    $id_user = $_SESSION['id_user'];
                                                    $total = 0;
                                                    //get products
                                                    $queryproduct = "SELECT products.name as 'name',users.id_user,
                                                    products.id_product as 'id_product', products.price as 'price',
                                                    products.thumbnail as 'thumbnail',
                                                    category.name as 'category', orders.id_user, orders.status,
                                                    orders.quantity as 'quantity',orders.id_order,
                                                    orders.size as 'size',
                                                    orders.color as 'color',
                                                    producers.name as 'producer'
                                                    FROM category, products, orders , producers, users
                                                    WHERE orders.id_product = products.id_product AND products.id_category = category.id_category  AND users.id_user = orders.id_user
                                                    AND products.id_producer = producers.id_producer  AND orders.status = 'ordering' AND users.id_user = '$id_user'";
                                                    $result1 = $conn->query($queryproduct);
                                                    $price_total = 0;
                                                    if ($result1->num_rows > 0) {
                                                        // output data of each row
                                                        while ($rowproduct = $result1->fetch_assoc()) {
                                                            $id_productdb = $rowproduct['id_product'];
                                                            $id_order = $rowproduct['id_order'];
                                                            $name_product = $rowproduct['name'];
                                                            $category_product = $rowproduct['category'];
                                                            $producer_product = $rowproduct['producer'];
                                                            $thumbnail_product = $rowproduct['thumbnail'];
                                                            $quantity_product = $rowproduct['quantity'];
                                                            $price_product = $rowproduct['price'];
                                                            $size_product = $rowproduct['size'];
                                                            $color_product = $rowproduct['color'];
                                                            $price_total_product = $price_product * $quantity_product;
                                                            $price_total += $price_total_product;
                                                    ?>
                                                            <div class="item line-item line-item-container" data-variant-id="1040372702">
                                                                <div class="left">
                                                                    <div class="item-img">
                                                                        <a href="/products/adidas-eqt-cushion-adv-north-america">
                                                                            <img src="img/shoes/<?= $thumbnail_product ?>" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="right">
                                                                    <div class="item-info">
                                                                        <a href="/products/adidas-eqt-cushion-adv-north-america">
                                                                            <h3><?= $name_product ?></h3>
                                                                            <div class="item-desc">
                                                                                <input type="hidden" value="<?= $id_productdb ?>" name="id_pr" class="text-size-color" disabled>
                                                                                <input type="text" value="<?= $color_product ?>" name="color_pr" class="text-size-color" disabled> -
                                                                                <input type="text" value="<?= $size_product ?>" name="size_pr" class="text-size-color" disabled>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="item-quan">
                                                                        <div class="quantity-area clearfix">
                                                                            <input type="submit" name="minus" value="-" onclick="minusQuantity()" class="qty-btn minus" style="margin-top: 0px;color:black">
                                                                            <input type="text" name="quantity" id="quantity" min="1" value="<?= $quantity_product ?>" class="quantity-selector" />
                                                                            <input type="submit" name="plus" value="+" onclick="plusQuantity()" class="qty-btn plus" style="margin-top: 0px; color:black">
                                                                            <?php 
                                                                            if(isset($_POST['minus']))
                                                                            {
                                                                                $quantity_product -=1;
                                                                                $q = "UPDATE orders SET quantity ='$quantity_product' WHERE id_product = '$id_productdb' AND id_order = '$id_order'";
                                                                                $r = $conn->query($q);
                                                                                echo "<meta http-equiv='refresh' content='0;url=cart.php?'/>";
                                                                                if($quantity_product ==0)
                                                                                {
                                                                                    $q_delete = "DELETE FROM orders  WHERE id_product = '$id_productdb' AND id_order = '$id_order'";
                                                                                    $r_delete = $conn->query($q_delete);
                                                                                    echo "<meta http-equiv='refresh' content='0;url=cart.php?'/>";
                                                                                }
                                                                            }
                                                                            if(isset($_POST['plus']))
                                                                            {
                                                                                $quantity_product +=1;
                                                                                $q = "UPDATE orders SET quantity ='$quantity_product' WHERE id_product = '$id_productdb' AND id_user = '$id_user' AND size = '$size_product' AND color = '$color_product' AND status = 'ordering'";
                                                                                $r = $conn->query($q);
                                                                                echo "<meta http-equiv='refresh' content='0;url=cart.php?'/>";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        <p>
                                                                            <span><?= $price_product ?></span>

                                                                        </p>
                                                                    </div>
                                                                    <div class="item-total-price">
                                                                        <div class="price">
                                                                            <span class="line-text">Thành tiền:</span>
                                                                            <span class="line-item-total"><?= $price_total_product ?></span>
                                                                        </div>
                                                                        <div class="remove">
                                                                            <a href="delete_order.php?id_product=<?= $id_productdb ?>&size=<?= $size_product ?>&color=<?= $color_product ?>" class="cart">
                                                                                <img src="//theme.hstatic.net/1000375638/1000671808/14/ic_close.png?v=99" />
                                                                            </a>
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
                                            <div class="cart-row">
                                                <div class="row note-block">
                                                    <div class="col-md-5 col-xs-12 cart-left-block">
                                                        <div class="checkout-buttons clearfix">
                                                            <label for="note" class="note-label">Ghi chú đơn hàng</label>
                                                            <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-xs-12 cart-right-block">

                                                        <div class="policy_return">
                                                            <h4>Chính sách Đổi/Trả</h4>
                                                            <ul>
                                                                <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                                                <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                                                <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                                                                <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="col-md-3 col-xs-12 sidebar-cart-fix">
                                    <a href="index.php" class="continue">Tiếp tục mua hàng →</a>
                                    <div class="order-summary-block">
                                        <h2 class="order-summary-title">Thông tin đơn hàng</h2>
                                        <div class="summary-subtotal hidden">
                                            <p class="subtotal">Loại sản phẩm:
                                                <span class="cart-total-price">
                                                    <?= $category_product ?>
                                                </span>
                                            </p>
                                            <p class="subtotal">Thương hiệu:
                                                <span class="cart-total-price">
                                                    <?= $producer_product ?>
                                                </span>
                                            </p>
                                            <p class="subtotal">Tạm tính:
                                                <span class="cart-total-price">
                                                    <?= $price_total ?>
                                                </span>
                                            </p>
                                            <p class="shipping clearfix">Phí vận chuyển:
                                                <span>---</span>
                                            </p>
                                        </div>
                                        <div class="summary-total">
                                            <p>Tổng tiền: <span><?= $price_total ?></span>
                                            </p>
                                        </div>
                                        <div class="summary-action">
                                            <p>Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
                                            <a class="checkout-btn" href="pay.php">THANH TOÁN</a>
                                        </div>
                                    </div>
                                    <div class="get-code">

                                        <a href="https://m.me/299038867586718?ref=ref_makhuyenmai" target="_blank" class="button btn-check"><span>Click nhận mã giảm giá ngay !</span></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</main>
<script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
<script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/owl.carousel/owl.carousel.min.js"></script>
<script src="plugins/uikit/uikit.min.js"></script>
<script src="plugins/uikit/uikit-icons.min.js"></script>
<script src="js/script.js"></script>
<script src="js/home.js"></script>
<script src="js/quantity.js"></script>
<script src="js/size.js"></script>