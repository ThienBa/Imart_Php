<?php
    get_header();
?>
<div id="main-content-wp" class="cart-page">
    <?php
        get_breadcrumb();
    ?>
    <div id="wrapper" class="wp-inner clearfix">
        <?php if(!empty($list_buy)){ ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="?mod=cart&action=update_cart" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_buy as $item) { ?>
                            <tr>
                                <td><?php echo $item['product_code']; ?></td>
                                <td>
                                    <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb']; ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $item['url_detail']; ?>" title=""
                                        class="name-product"><?php echo $item['product_name']; ?></a>
                                </td>
                                <td><?php echo currency_format($item['product_price']); ?></td>
                                <td>
                                    <input type="number" min='1' data-id="<?php echo $item['product_id']; ?>" max="<?php echo $item['qty_exist']; ?>" name="qty[<?php echo $item['product_id']; ?>]" value="<?php echo $item['qty']; ?>"
                                        class="num-order">
                                </td>
                                <td id="sub-total-<?php echo $item['product_id']; ?>"><?php echo currency_format($item['sub_total']); ?></td>
                                <td>
                                    <a href="<?php echo $item['url_delete_cart']; ?>" title="" class="del-product"><i
                                            class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">  
                                        <p id="total-price" class="fl-right">Tổng giá:
                                            <span><?php echo currency_format(get_total_price()); ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="thanh-toan/chi-tiet-thanh-toan.html" title="" id="checkout-cart">Thanh
                                                toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                    <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.
                </p>
                <a href="trang-chu.html" title="" id="buy-more">Mua tiếp</a><br />
                <a href="xoa-san-pham/xoa-toan-bo-gio-hang.html" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
        <?php } else{?>
        <p>Không có sản phẩm nào trong giỏ hàng nhấn <a href="trang-chu.html">vào đây</a> để thêm sản phẩm!</p>
        <?php } ?>
    </div>
</div>
<?php
    get_footer();
?>