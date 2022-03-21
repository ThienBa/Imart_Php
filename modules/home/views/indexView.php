<?php
    get_header();
    global $slider, $outstanding, $list_phone, $list_laptop, $product_selling;
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner clearfix">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php if(!empty($slider)){
                                foreach($slider as $item){    
                    ?>
                    <div class="item">
                        <img src="<?php echo $item['slider_thumb']; ?>" alt="">
                    </div>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($outstanding)){ ?>
                        <ul class="list-item">
                            <?php foreach($outstanding as $item){ ?>
                            <li>
                                <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                    <img src="<?php echo $item['product_thumb']; ?>">
                                </a>
                                <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                    <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="<?php echo $item['url_add_cart']; ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $item['url_buy_now']; ?>" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <?php if(!empty($list_phone)){ ?>
                    <ul class="list-item clearfix">
                        <?php foreach($list_phone as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb']; ?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                <?php if(!empty($list_laptop)){ ?>
                    <ul class="list-item clearfix">
                        <?php foreach($list_laptop as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb']; ?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
            get_sidebar('home');
        ?>
    </div>
</div>
<?php
    get_footer();
?>  