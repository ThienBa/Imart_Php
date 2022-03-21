<?php
    get_header();
    global $list_phone, $list_laptop, $num_page, $page, $total_product, $num_product, $search_AZ, $search_ZA, $search_high_to_low, $search_low_to_high;
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <?php
            get_breadcrumb();
        ?>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php if(!(empty($list_phone) || empty($list_laptop) || isset($_POST['btn_search'])) || empty($_POST['select'])){ echo "Điện thoại";} ?></h3>
                    <div class="filter-wp fl-right">
                    <?php
                        if(!(empty($list_phone) || empty($list_laptop) || isset($_POST['btn_search'])) || empty($_POST['select'])){
                    ?>
                    <p class="desc">Hiển thị <?php echo $num_product; ?> trên <?php echo $total_product ; ?> sản phẩm</p>
                    <?php
                        }
                    ?>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="4">Giá thấp lên cao</option>
                                </select>
                                <button type="submit" name="btn_search">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <?php if(!(empty($list_phone) || isset($_POST['btn_search'])) || empty($_POST['select'])){ ?>
                    <ul class="list-item clearfix">
                        <?php foreach($list_phone as $phone){ ?>
                        <li>
                            <a href="<?php echo $phone['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $phone['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $phone['url_detail']; ?>" title="" class="product-name"><?php echo $phone['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($phone['product_price']); ?></span>
                                <span class="old"><?php if($phone['old_price'] != NULL) echo currency_format($phone['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $phone['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $phone['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="section-head">
                    <h3 class="section-title fl-left"><?php if(!(empty($list_laptop) || isset($_POST['btn_search'])) || empty($_POST['select'])){ echo "Laptop"; } ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(!(empty($list_laptop) || isset($_POST['btn_search'])) || empty($_POST['select'])){ ?>
                    <ul class="list-item clearfix">
                        <?php foreach($list_laptop as $laptop){ ?>
                            <li>
                            <a href="<?php echo $laptop['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $laptop['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $laptop['url_detail']; ?>" title="" class="product-name"><?php echo $laptop['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($laptop['product_price']); ?></span>
                                <span class="old"><?php if($laptop['old_price'] != NULL) echo currency_format($laptop['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $laptop['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $laptop['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="section-detail">
                    <?php if(!empty($search_AZ) && isset($_POST['btn_search']) && $_POST['select'] == 1){ ?>
                    <p>Hiển thị <b><?php echo $total_product; ?></b> sản phẩm được sắp xếp từ <b> A-Z </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_AZ as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                    <?php if(!empty($search_ZA) && isset($_POST['btn_search']) && $_POST['select'] == 2){ ?>
                        <p>Hiển thị <b><?php echo $total_product; ?></b> sản phẩm được sắp xếp từ <b> Z-A </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_ZA as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                    <?php if(!empty($search_high_to_low) && isset($_POST['btn_search']) && $_POST['select'] == 3){ ?>
                        <p>Hiển thị <b><?php echo $total_product; ?></b> sản phẩm được sắp xếp theo giá từ <b> cao xuống thấp </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_high_to_low as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                    <?php if(!empty($search_low_to_high) && isset($_POST['btn_search']) && $_POST['select'] == 4){ ?>
                        <p>Hiển thị <b><?php echo $total_product; ?></b> sản phẩm được sắp xếp theo giá từ <b> thấp lên cao </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_low_to_high as $item){ ?>
                            <li>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb'];?>">
                            </a>
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php echo $item['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php
                        if(!(empty($list_laptop) && empty($list_laptop) || isset($_POST['btn_search'])) || empty($_POST['select'])){ 
                            echo get_pagging($num_page, $page, "?mod=product&action=main");
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            get_sidebar('product');
        ?>
    </div>
</div>
<?php
    get_footer();
?>