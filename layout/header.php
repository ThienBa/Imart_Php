<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url(); ?>">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="public/js/app.js" type="text/javascript"></script>
    <script src="public/js/search_form.js" type="text/javascript"></script>
    <script src="public/js/fillter_product.js" type="text/javascript"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="trang-chu.html" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="san-pham/danh-sach-san-pham.html" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="bai-viet/danh-sach-bai-viet.html" title="">Bài viết</a>
                                </li>
                                <li>
                                    <a href="trang/gioi-thieu-1.html" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="trang/lien-he-2.html" title="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="trang-chu.html" title="" id="logo" class="fl-left"><img src="public/images/logo.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="search_header" class="search_header" id="s"
                                    placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s" name="btn_search">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span
                                        id="num"><?php if(isset($_SESSION['cart']) && $_SESSION['cart']['info']['num_order'] > 0) echo $_SESSION['cart']['info']['num_order']; ?></span>
                                </div>
                                <?php if(isset($_SESSION['cart'])){ ?>
                                <div id="dropdown">
                                    <p class="desc">Có <span><?php echo $_SESSION['cart']['info']['num_order'] ?> sản
                                            phẩm</span> trong giỏ hàng</p>
                                    <ul class="list-cart">
                                        <?php foreach($_SESSION['cart']['buy'] as $item){ ?>
                                        <li class="clearfix">
                                            <a href="<?php echo $item['url_detail'] ?>" title="" class="thumb fl-left">
                                                <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="<?php echo $item['url_detail'] ?>" title=""
                                                    class="product-name"><?php echo $item['product_name'] ?></a>
                                                <p class="price"><?php echo currency_format($item['product_price']); ?>
                                                </p>
                                                <p class="qty">Số lượng: <span><?php echo $item['qty']; ?></span></p>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">Tổng:</p>
                                        <p class="price fl-right">
                                            <?php echo currency_format($_SESSION['cart']['info']['total']); ?></p>
                                    </div>
                                    <dic class="action-cart clearfix">
                                        <a href="gio-hang/danh-sach-gio-hang.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ
                                            hàng</a>
                                        <a href="thanh-toan/chi-tiet-thanh-toan.html" title="Thanh toán"
                                            class="checkout fl-right">Thanh toán</a>
                                    </dic>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>