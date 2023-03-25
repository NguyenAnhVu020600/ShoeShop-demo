<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.jpg" class="logo-top" alt="">
        </a>
        <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="collection.php">BỘ SƯU TẬP</a>
                </li>
                <li class="nav-item lisanpham">
                    <a class="nav-link" href="#">SẢN PHẨM
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub_menu">
                        <?php 
                        require 'config.php';
                        $query ="SELECT * FROM producers";
                        $result =$conn->query($query);
                        if ($result->num_rows !=0) {
                            while ($row = $result->fetch_assoc()){
                                $id_producer = $row['id_producer'];
                                $producer=$row['name'];
                                ?>
                                <li class="">
                                    <a href="search.php?id=<?=$id_producer;?>&word=<?=$producer;?>">
                                        <?=$producer;?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="introduce.php">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
        <?php
        if (!isset($_SESSION['id_user'])) {
        ?>
            <div class="icon-ol">
                <a class="toggle_icon" data-bs-toggle="collapse" href="#search">
                    <i class="fas fa-search layout_icon" style="color: black"></i>
                </a>
                <form method="post" action="search.php">
                    <div id="search" class="collapse simple-search layout_icon">
                        <input type="text" name="word" placeholder="Tìm kiếm sản phẩm" />
                        <button type="submit" name="search"><i class="fas fa-search "></i></button>
                    </div>
                </form>

                <a style="color: #272727" href="cart.php">
                    <i class="fas fa-shopping-cart layout_icon"></i>
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon "></span>
                </button>

                <a style="color: #272727;" href="login.php">
                    <i class="fas fa-user-alt layout_icon"></i>
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="icon-ol" >
                <a class="" data-bs-toggle="collapse" href="#search">
                    <i class="fas fa-search" style="color: black"></i>
                </a>
                <form method="post" action="search.php">
                    <div id="search" class="collapse simple-search">
                        <input type="text" name="word" placeholder="Tìm kiếm sản phẩm" />
                        <button type="submit" name="search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <a style="color: #272727" href="cart.php" class="icon-2">
                    <i class="fas fa-shopping-cart"></i>
                    <sup style="top:-10px; right:6px;color:red;font-weight:bold">
                        <?php
                        require 'config.php';
                        $id_user = $_SESSION['id_user'];
                        $querycount = "SELECT * FROM orders WHERE id_user = '$id_user' AND status='ordering'";
                        $resultcount = $conn->query($querycount);
                        $item = $resultcount->num_rows;
                        $_SESSION['item'] = $item;
                        if ($item > 0) echo $item;
                        ?>
                    </sup>
                </a>
            </div>
            <div class="username">
                &nbsp;
                <a style="color: #272727" href="#">
                    <i><?= $_SESSION['username'] ?></i>
                </a>
                &nbsp;
                <a href="logout.php" class="">
                    <i class="fa fa-sign-out" style="color: black"></i>
                </a>
            </div>
            
        <?php
        }
        ?>
    </div>
</nav>