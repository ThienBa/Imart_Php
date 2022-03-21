<?php
    get_header();
    global $error, $success;
?>
<div id="main-content-wp" class="checkout-page">
    <?php
        get_breadcrumb();
    ?>
    <form method="POST" action="" name="form-checkout">
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname">
                            <span class="error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                            <span class="error"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address">
                            <span class="error"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone_number" id="phone">
                            <span class="error"><?php echo form_error('phone_number'); ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notice">Ghi chú</label>
                            <textarea name="notice" id="notice"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty(get_list_buy_now())){ ?>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (get_list_buy_now() as $item){ ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $item['product_name']; ?><strong
                                        class="product-quantity">x<?php echo $item['qty']; ?></strong></td>
                                <td class="product-total"><?php echo currency_format($item['product_price']); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong
                                        class="total-price"><?php echo currency_format(get_total_price()); ?></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment-method" value="1">
                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment-method" value="2">
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                            <li>
                                <span class="error"><?php echo form_error('payment-method'); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" name="btn_order" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($success['order'])) echo "<p class='success'>$success[order]</p>"; ?>

    </form>
    <?php } ?>
</div>
<?php
    get_footer();
?>