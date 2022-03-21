<?php
    get_header();
    global $success;
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail">ORDER#<?php echo $detail_order['id']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $detail_order['address']; ?> / <?php echo $detail_order['phone_number']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php if($detail_order['pay_method'] == 1) echo "Thanh toán tại cửa hằng"; else echo "Thanh toán tại nhà";?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option <?php if($detail_order['order_status'] == 1) echo "selected='selected'"?> value='1'>Chờ duyệt</option>
                                <option <?php if($detail_order['order_status'] == 2) echo "selected='selected'"?> value='2'>Đang vận chuyển</option>
                                <option <?php if($detail_order['order_status'] == 3) echo "selected='selected'"?> value='3'>Thành công</option>
                            </select>
                            <input type="submit" name="btn_update" value="Cập nhật đơn hàng">
                        </li>
                        <?php if(isset($success['update_status'])) echo "<p class='success'>$success[update_status]</p>" ?>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <?php
                        if(!empty($detail_order)){
                    ?>
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $detail[] = $detail_order;
                                $count = 0;
                                foreach ($detail as $item) {
                                    $count++;
                            ?>
                            <tr>
                                <td class="thead-text"><?php echo $count; ?></td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo $item['product_thumb']; ?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $item['product_name']; ?></td>
                                <td class="thead-text"><?php echo currency_format($item['product_price']); ?></td>
                                <td class="thead-text"><?php echo $item['order_qty']; ?></td>
                                <td class="thead-text"><?php echo currency_format($item['total_price']); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $item['order_qty']; ?></span>
                            <span class="total"><?php echo currency_format($item['product_price'] * $item['order_qty']); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    get_footer();
?>