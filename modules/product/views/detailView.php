<?php
    get_header();
    global $same_category;
?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
    <?php
            get_breadcrumb();
        ?>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $detail_product['product_thumb']; ?>" data-zoom-image="<?php echo $detail_product['product_thumb']; ?>"/>
                        </a>
                        <!-- <div id="list-thumb">
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                        </div> -->
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo $detail_product['product_thumb']; ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $detail_product['product_name']; ?></h3>
                        <div class="desc">
                            <?php echo $detail_product['product_desc']; ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <?php if($detail_product['qty'] > 0){ echo "<b><span class='status'>Còn hàng</span></b>"; } else { echo "<b><span class='status'>Hết hàng</span></b>"; } ?>
                        </div>
                        <p class="price"><?php echo currency_format($detail_product['product_price']); ?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="<?php echo $detail_product['url_add_cart']; ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php
                        echo $detail_product['content'];
                    ?>
                </div>
            </div>
            <?php
                if(!empty($same_category)){
            ?>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                            foreach($same_category as $item){
                        ?>  
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
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <?php
            get_sidebar();
        ?>
    </div>
</div>
<?php
    get_footer();
?>