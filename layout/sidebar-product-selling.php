<div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <?php if(!empty(product_celling())){ ?>
                    <ul class="list-item">
                        <?php foreach(product_celling() as $item){ ?>
                        <li class="clearfix">
                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $item['product_thumb']; ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($item['product_price']); ?></span>
                                    <span class="old"><?php if($item['old_price'] != NULL) echo currency_format($item['old_price']); ?></span>
                                </div>
                                <a href="<?php echo $item['url_buy_now']; ?>" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>  
            </div>