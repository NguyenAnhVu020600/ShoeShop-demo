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
                        <a href="blog.php">
                            <span>Tin tức</span>
                        </a>
                    </li>

                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
            <div class="sidebar-blog">
                <div class="news-latest">
                    <div class="sidebarblog-title title_block">
                        <h2>Bài viết mới nhất</h2>
                    </div>
                    <div class="list-news-latest layered">
                        <div class="item-article clearfix">
                            <div class="post-image">
                                <a href="">
                                    <img src="img/blog/n-1.jpg" alt="Adidas Falcon nổi bật mùa Hè với phối màu color block"></a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="">Adidas Falcon nổi bật mùa Hè với phối màu color block</a>
                                </h3>
                                <span class="author">
                                    <a href="">Be Nguyen</a>
                                </span>
                                <span class="date">
                                    11.06.2019
                                </span>
                            </div>
                        </div>
                        <div class="item-article clearfix">
                            <div class="post-image">
                                <a href=""><img src="img/blog/n-2.jpg" alt="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner"></a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="">Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner</a>
                                </h3>
                                <span class="author">
                                    <a href="">Be Nguyen</a>
                                </span>
                                <span class="date">
                                    11.06.2019
                                </span>
                            </div>
                        </div>
                        <div class="item-article clearfix">
                            <div class="post-image">
                                <a href=""><img src="img/blog/n-3.jpg" alt="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt"></a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="">Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt</a>
                                </h3>
                                <span class="author">
                                    <a href="">Runner Inn</a>
                                </span>
                                <span class="date">
                                    11.06.2019
                                </span>
                            </div>
                        </div>
                        <div class="item-article clearfix">
                            <div class="post-image">
                                <a href=""><img src="img/blog/n-4.jpg" alt="Bài viết mẫu"></a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="">Bài viết mẫu</a>
                                </h3>
                                <span class="author">
                                    <a href="">Runner Inn</a>
                                </span>
                                <span class="date">
                                    10.06.2019
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-blog">
                    <div class="group-menu">
                        <div class="sidebarblog-title title_block">
                            <h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
                        </div>
                        <div class="layered-category">
                            <ul class="menuList-links">
                                <li class=""><a href="index.php" title="Trang chủ"><span>Trang chủ</span></a></li>
                                <li class=""><a href="collection.php" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                                <li class="has-submenu level0 ">
                                    <a title="Sản phẩm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Sản phẩm <span class="icon-plus-submenu" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></span></a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body" style="border:0">
                                            <ul class="menu-product">
                                                <li><a href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a></li>
                                                <li><a href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a></li>
                                                <li><a href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class=""><a href="introduce.php" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                                <li class="active"><a href="blog.php" title="Blog"><span>Blog</span></a></li>
                                <li class=""><a href="contact.php" title="Liên hệ"><span>Liên hệ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="heading-page clearfix">
                <h1>Tin tức</h1>
            </div>
            <div class="blog-content">
                <div class="list-article-content blog-posts">
                    <!-- Begin: Nội dung blog -->
                    <article class="blog-loop">
                        <div class="blog-post row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <a href="detailblog.html" class="blog-post-thumbnail" title="Adidas Falcon nổi bật mùa Hè với phối màu color block" rel="nofollow">
                                    <img src="img/blog/n-1.jpg" alt="Adidas Falcon nổi bật mùa Hè với phối màu color block">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <h3 class="blog-post-title">
                                    <a href="detailblog.html" title="Adidas Falcon nổi bật mùa Hè với phối màu color block">Adidas Falcon nổi bật mùa Hè với phối màu color block</a>
                                </h3>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: Huni</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2019-06-11">11.06.2019</time>
                                    </span>
                                </div>
                                <p class="entry-content">Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng chừng...</p>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="blog-post row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <a href="detailblog.html" class="blog-post-thumbnail" title="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner" rel="nofollow">
                                    <img src="img/blog/n-2.jpg" alt="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <h3 class="blog-post-title">
                                    <a href="detailblog.html" title="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner">Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner</a>
                                </h3>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: Huni</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2019-06-11">11.06.2019</time>
                                    </span>
                                </div>
                                <p class="entry-content">Là một trong những đôi giày chạy bộ tốt nhất vào những năm 1994, 1995, Saucony&nbsp;Aya Runner vừa có màn trở lại vô cùng ấn...</p>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="blog-post row">

                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <a href="detailblog.html" class="blog-post-thumbnail" title="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt" rel="nofollow">
                                    <img src="img/blog/n-3.jpg" alt="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <h3 class="blog-post-title">
                                    <a href="detailblog.html" title="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt">Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt</a>
                                </h3>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: Huni</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2019-06-11">11.06.2019</time>
                                    </span>
                                </div>
                                <p class="entry-content">Là một trong những mẫu giày retro có nhiều phối màu gradient đẹp nhất từ trước đến này,&nbsp;Nike Vapormax Plus vừa có màn trở lại...</p>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="blog-post row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <a href="detailblog.html" class="blog-post-thumbnail" title="Bài viết mẫu" rel="nofollow">
                                    <img src="img/blog/n-4.jpg" alt="Bài viết mẫu">
                                </a>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <h3 class="blog-post-title">
                                    <a href="detailblog.html" title="Bài viết mẫu">Bài viết mẫu</a>
                                </h3>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: Huni</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2019-06-10">10.06.2019</time>
                                    </span>
                                </div>
                                <p class="entry-content">Đây là trang blog của cửa hàng. Bạn có thể dùng blog để quảng bá sản phẩm mới, chia sẻ trải nghiệm của khách hàng,...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="sortpagibar pagi clearfix text-center">
                    <div id="pagination" class="clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="page-node current">1</span>
                            <a class="page-node" href="">2</a>
                            <a class="next" href="">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31 10" style="enable-background:new 0 0 31 10; width: 31px; height: 10px;" xml:space="preserve">
                                    <polygon points="31,5 25,0 25,4 0,4 0,6 25,6 25,10 "></polygon>
                                </svg> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="js/slide.js"></script>