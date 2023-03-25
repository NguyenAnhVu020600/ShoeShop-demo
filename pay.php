<?php
session_start();
require 'header.php';
require 'layout.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="./js/provice.js"> </script>
<div class="container">
    <form method="post" action="final.php">
        <div class="layout-pay">
            <div class="main-header">
                <ul class="breadcrumb ">
                    <li class="breadcrumb-item">
                        <a href="cart.php">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="pay.php">Phương thức thanh toán</a>
                    </li>
                </ul>
            </div>
            <a href="index.php" class="logo">
                <h1 class="logo-text">Sneaker Shop</h1>
            </a>
            <div class="col-md-12 col-xs-12">

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                        <!-- <div class="sidebar"> -->
                        <div class="sidebar-content">
                            <div class="order-summary order-summary-is-collapsed">
                                <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                                <div class="order-summary-sections">
                                    <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
                                        <table class="product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'config.php';
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
                                                        <input name="quantity" value="<?= $quantity_product ?>" style="display:none">
                                                        <input name="size" value="<?= $size_product ?>" style="display:none">
                                                        <input name="color" value="<?= $color_product ?>" style="display:none">
                                                        <input name="id_product" value="<?= $id_product ?>" style="display:none">
                                                        <input name="price_total" value="<?= $total?>" style="display:none">
                                                        <input name="id_order" value="<?= $id_order?>" style="display:none">
                                                        <tr class="product" data-product-id="1020275745" data-variant-id="1040377813">
                                                            <td class="product-image" width="200px">
                                                                <img class="product-thumbnail-image" width="150px" src="img/shoes/<?= $thumbnail_product ?>" />
                                                            </td>
                                                            <td>
                                                                <span class="product-thumbnail-quantity" ><?= $quantity_product ?></span>
                                                                
                                                            </td>
                                                            <td class="product-description">
                                                                <span class="product-description-name order-summary-emphasis"><?= $name_product ?></span><br />

                                                                <span class="product-description-variant order-summary-small-text">
                                                                    <?= $color_product ?> - <?= $size_product ?>
                                                                </span>
                                                            </td>
                                                            <td class="product-price">
                                                                <span class="order-summary-emphasis"><?php echo number_format("$price_total_product"); ?>đ</span>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                                        <div class="fieldset">
                                            <div class="field  ">
                                                <div class="field-input-btn-wrapper">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label">Mã giảm giá</label>
                                                        <input placeholder="Mã giảm giá" class="field-input" type="text" name="magiamgia" value="" />
                                                    </div>
                                                    <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                        <span class="btn-content">Sử dụng</span>
                                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                                        <table class="total-line-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="total-line total-line-subtotal">
                                                    <td class="total-line-name">Tạm tính</td>
                                                    <td class="total-line-price">
                                                        <span class="order-summary-emphasis" data-checkout-subtotal-price-target="480000000">
                                                            <?php echo number_format("$price_total"); ?>đ
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="total-line total-line-shipping">
                                                    <td class="total-line-name">Phí vận chuyển</td>
                                                    <td class="total-line-price">
                                                        <span class="order-summary-emphasis" data-checkout-total-shipping-target="0">
                                                            30,000đ
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="total-line-table-footer">
                                                <tr class="total-line">
                                                    <td class="total-line-name payment-due-label">
                                                        <span class="payment-due-label-total">Tổng cộng</span>
                                                    </td>
                                                    <td class="total-line-name payment-due">
                                                        <span class="payment-due-price">
                                                            <?php $total = $price_total + 30000;
                                                            echo number_format("$total"); ?>đ
                                                        </span>
                                                        <span class="checkout_version" display:none data_checkout_version="3">
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-12">
                        <div class="mainpay-content">
                            <div id="checkout_order_information_changed_error_message" class="hidden" style="margin-bottom:15px">
                                <p class="field-message field-message-error alert alert-danger"><svg x="0px" y="0px" viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve">
                                        <g>
                                            <path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027 c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236 c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209 S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972 c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723 c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843 C160.878,195.732,152.878,187.723,143.036,187.723z" />
                                        </g>
                                    </svg> <span></span></p>
                            </div>
                            <div class="step">
                                <div class="step-sections " step="1">
                                    <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Thông tin giao hàng</h2>
                                        </div>
                                        <div class="section-content section-customer-information no-mb">
                                            <div class="fieldset">
                                                <div class="field">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label">Họ và tên</label>
                                                        <input placeholder="Họ và tên" class="field-input" type="text" name="username" value="<?= $_SESSION['username'] ?> " require/>
                                                        <input type="text" name="id_user" value="<?= $_SESSION['id_user'] ?>" style="display:none">
                                                    </div>
                                                </div>
                                                <div class="field  field-two-thirds  ">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label" for="checkout_user_email">Email</label>
                                                        <input autocomplete="false" placeholder="Email" class="field-input" type="email" name="email" value="<?= $_SESSION['email'] ?>" require/>
                                                    </div>
                                                </div>
                                                <div class="field field-required field-third  ">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label" for="billing_address_phone">Số điện thoại</label>
                                                        <input autocomplete="false" placeholder="Số điện thoại" class="field-input" maxlength="15" type="tel" name="phone" value="<?= $_SESSION['phone'] ?>" require/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-content">
                                            <div class="fieldset">
                                                <div id="form_update_shipping_method" class="field default">
                                                    <input name="utf8" type="hidden" value="✓">
                                                    <div class="content-box mt0">
                                                        <div class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary ">
                                                            <div class="field field-show-floating-label  field-half ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <label class="field-label"> Tỉnh / thành </label>
                                                                    <select class="field-input province" name="province" require>
                                                                        <option selected> Chọn tỉnh / thành </option>
                                                                        <?php
                                                                        require 'config.php';
                                                                        $query = "SELECT * FROM province";
                                                                        $result = $conn->query($query);
                                                                        if ($result->num_rows > 0) {
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                $id_province = $row['id_province'];
                                                                                $name = $row['name'];
                                                                        ?>
                                                                                <option value="<?= $id_province ?>"><?= $name ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="field field-show-floating-label  field-half ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <label class="field-label">Quận / huyện</label>
                                                                    <select class="field-input district" name="district" require>
                                                                        <option selected> Chọn quận / huyện </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="field">
                                                                <div class="field-input-wrapper">
                                                                    <input placeholder="Địa chỉ" class="field-input" type="text" name="address" value="<?= $_SESSION['address'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div id="div_location_country_not_vietnam" class="section-customer-information ">
                                                                <div class="field field-half">
                                                                    <div class="field-input-wrapper field-input-wrapper-select">
                                                                        <label class="field-label">Phương thức thanh toán</label>
                                                                        <select class="field-input" name="pttt" require>
                                                                            <options disable> Phương thức thanh toán</options>
                                                                            <option>Thanh toán khi nhận hàng</option>
                                                                            <option>Thanh toán bằng MoMo</option>
                                                                            <option>Thanh toán qua Vietcombank</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="field field-half">
                                                                    <div class="field-input-wrapper field-input-wrapper-select">
                                                                        <label class="field-label" for="shipping_method">Phương thức vận chuyển</label>
                                                                        <select class="field-input" name="ptvc" require>
                                                                            <options disable> Phương thức vận chuyển</options>
                                                                            <option>Giao hàng tiết kiệm (Vận chuyển thường)</option>
                                                                            <option>Lex VN (Vận chuyển Nhanh)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="change_pick_location_or_shipping">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="step-footer">
            <button type="submit" name="final" class="step-footer-continue-btn btn">
                <span class="btn-content">Hoàn tất đặt hàng</span>
                <i class="btn-spinner icon icon-button-spinner"></i>
            </button>
            <a class="step-footer-previous-link" style="width:100px" href="cart.php">
                Giỏ hàng
            </a>
        </div>
        <div class="mainpay-footer footer-powered-by">
            Powered by Haravan
        </div>
    </form>
</div>