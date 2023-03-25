<?php
session_start();
require 'header.php';
require 'layout.php';
require 'config.php';
if(isset($_GET['id']) && $_GET['word'])
{
    $word = $_GET['word'];
    $id=$_GET['id'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $queryproduct = "SELECT * FROM products WHERE name LIKE '%$word%' ORDER BY id_product DESC LIMIT {$start}, 16";
    $result = $conn->query($queryproduct);
    $count = $result->num_rows;
}

if (isset($_POST['search'])) {
    $word = $_POST['word'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $queryproduct = "SELECT * FROM products WHERE name LIKE '%$word%' ORDER BY id_product DESC LIMIT {$start}, 16";
    $result = $conn->query($queryproduct);
    $count = $result->num_rows;
}
?>
<div class="searchPage" id="layout-search">
    <div class="container">
        <div class="row pd-page">
            <div class="col-md-12 col-xs-12">
                <div class="heading-page">
                    <h1>Tìm kiếm</h1>
                    <p class="subtxt">Có <span><?=$count?> sản phẩm</span> cho tìm kiếm</p>
                </div>
                <div class="wrapbox-content-page">
                    <div class="content-page" id="search">
                        <p class="subtext-result"> Kết quả tìm kiếm cho <strong>"<?= $word ?>"</strong>. </p>

                        <div class="results content-product-list ">
                            <div class=" search-list-results row">
                                <?php


                                //pages
                                $total = $conn->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
                                $pages = ceil($total / $perpage);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($rowproduct = $result->fetch_assoc()) {
                                        $id_product = $rowproduct['id_product'];
                                        $name_product = $rowproduct['name'];
                                        $price_product = $rowproduct['price'];
                                        $thumbnail_product = $rowproduct['thumbnail'];
                                        $thumbnail_2_product = $rowproduct['thumbnail_2'];
                                ?>
                                        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                                            <div class="product-block">
                                                <div class="product-img fade-box">
                                                    <a href="product.php?id_product=<?= $id_product;  ?>" class="img-resize">
                                                        <img src="img/shoes/<?= $thumbnail_product; ?>" class="lazyloaded">
                                                        <img src="img/shoes/<?= $thumbnail_2_product ?>" class="lazyloaded">
                                                    </a>
                                                    <div class="button-add">
                                                        <button type='submit' href="product.php?id_product=<?= $id_product;  ?>" class="action">Mua ngay</button>
                                                        <button type='submit' href="product.php?id_product=<?= $id_product;  ?>" class="action add-to-cart">Thêm vào giỏ</button>
                                                    </div>
                                                </div>
                                                <div class="product-detail clearfix">
                                                    <div class="pro-text">
                                                        <a href="#" inspiration pack><?= $name_product ?></a>
                                                    </div>
                                                    <div class="pro-price">
                                                        <a><?php echo number_format("$price_product"); ?>đ</a>
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
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>