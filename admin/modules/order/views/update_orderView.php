<?php
    get_header();
    global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">CẬP NHẬT ĐƠN HÀNG</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php if(isset($success['update_order'])) echo "<p class='success'>$success[update_order]</p>" ?>
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Họ và tên khách hàng</label>
                        <input type="text" name="name" id="name" readonly="readonly" value="<?php if(isset($order['name'])) echo $order['name']; ?>">
                        <label for="address">Địa chỉ nhận hàng</label>
                        <input type="text" name="address" id="address" readonly="readonly" value="<?php if(isset($order['address'])) echo $order['address']; ?>">
                        <label for="phone_number">Số điện thoại người nhận</label>
                        <input type="text" name="phone_number" readonly="readonly" id="phone_number" value="<?php if(isset($order['phone_number'])) echo $order['phone_number']; ?>">
                        <label for="order_qty">Số lượng</label>
                        <input type="number" min="1" max="10" name="order_qty" id="order_qty" value="<?php if(isset($order['order_qty'])) echo $order['order_qty']; ?>">
                        <span class="error"><?php echo form_error('order_qty'); ?></span>
                        <label for="total_price">Tổng giá</label>
                        <input type="text" name="total_price" id="total_price" value="<?php if(isset($order['total_price'])) echo $order['total_price']; ?>">
                        <label>Trạng thái</label>
                        <select name="order_status">
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if(isset($order['order_status']) && $order['order_status'] == 1) echo "selected='selected'"?> value="1">Chờ duyệt</option>
                            <option <?php if(isset($order['order_status']) && $order['order_status'] == 2) echo "selected='selected'"?> value="2">Đang vận chuyển</option>
                            <option <?php if(isset($order['order_status']) && $order['order_status'] == 3) echo "selected='selected'"?> value="2">Đã nhận</option>
                        </select>
                        <span class="error"><?php echo form_error('order_status'); ?></span>
                        <button type="submit" name="btn_update_order" id="btn_update_order">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>      