<?php
    get_header();
    global $num_page, $page, $total_row, $num_per_page, $num_samsung, $search_high_to_low_samsung, $search_low_to_high_samsung;
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <?php
            get_breadcrumb();
        ?>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Iphone</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo $num_samsung; ?> trên <?php echo $total_row; ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Giá cao xuống thấp</option>
                                    <option value="2">Giá thấp lên cao</option>
                                </select>
                                <button type="submit" name="btn_search">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <?php if(!empty($list_samsung) && !isset($_POST['btn_search']) && empty($_POST['select'])){ ?>
                    <ul class="list-item clearfix">
                        <?php foreach($list_samsung as $item){ ?>
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
                                <a href="<?php echo $item['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php echo $item['url_buy_now']; ?>" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                    <?php if(!empty($search_high_to_low_samsung) && isset($_POST['btn_search']) && $_POST['select'] == 1){ ?>
                        <p>Hiển thị <b><?php echo $total_row; ?></b> sản phẩm được sắp xếp theo giá từ <b> cao xuống thấp </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_high_to_low_samsung as $item){ ?>
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

                    <?php if(!empty($search_low_to_high_samsung) && isset($_POST['btn_search']) && $_POST['select'] == 2){ ?>
                        <p>Hiển thị <b><?php echo $total_row; ?></b> sản phẩm được sắp xếp theo giá từ <b> thấp lên cao </b></p>
                    <ul class="list-item clearfix">
                        <?php foreach($search_low_to_high_samsung as $item){ ?>
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
                <?php
                    if($total_row > $num_per_page){
                        echo get_pagging($num_page, $page, "?mod=product&action=samsung");
                    }
                ?>
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