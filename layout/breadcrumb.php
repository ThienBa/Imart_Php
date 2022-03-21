<div class="section" id="breadcrumb-wp">
    <div class="wp-inner">
        <div class="section-detail">
            <ul class="list-item clearfix">
                <li>
                    <a href="?" title="">Trang chủ</a>
                </li>
                <li>
                    <?php
        if ($_GET['mod'] == 'product') {
        ?>
                    <a href="san-pham/danh-sach-san-pham.html">Sản phẩm</a>
                    <?php
        } else if ($_GET['mod'] == 'post') {
        ?>
                    <a href="bai-viet/danh-sach-bai-viet.html">Bài viết</a>
                    <?php
        } else if (($_GET['mod'] == 'page') && ($_GET['action'] == 'detail') && ($_GET['id'] == 1)){
        ?>
                    <a href="trang/gioi-thieu-1.html">Giới thiệu</a>
                    <?php
        }else if (($_GET['mod'] == 'page') && ($_GET['action'] == 'detail') && ($_GET['id'] == 2)){
        ?>
                    <a href="trang/lien-he-2.html">Liên hệ</a>
                    <?php   
        } else if (($_GET['mod'] == 'cart')&&(($_GET['action'] == 'checkout'))) {
        ?>
                    <a href="thanh-toan/chi-tiet-thanh-toan.html">Thanh toán</a>
                    <?php
        } else if ($_GET['mod'] == 'cart') {
        ?>
                    <a href="gio-hang/danh-sach-gio-hang.html">Giỏ hàng</a>
                    <?php
        }else if (($_GET['mod'] == 'buy_now')&&(($_GET['action'] == 'checkout'))) {
        ?>
                    <a href="thanh-toan-mua-ngay/chi-tiet-thanh-toan.html">Thanh toán</a>
                    <?php
        }
        ?>
            </ul>
        </div>
    </div>
</div>