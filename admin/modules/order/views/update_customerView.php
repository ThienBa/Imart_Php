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
                <?php if(isset($success['update_customer'])) echo "<p class='success'>$success[update_customer]</p>" ?>
                <div class="section-detail">
                    <form method="POST">
                        <label for="name">Họ và tên khách hàng</label>
                        <input type="text" name="name" id="name" value="<?php if(isset($customer['name'])) echo $customer['name']; ?>">
                        <span class="error"><?php echo form_error('name'); ?></span>
                        <label for="address">Địa chỉ nhận hàng</label>
                        <input type="text" name="address" id="address" value="<?php if(isset($customer['address'])) echo $customer['address']; ?>">
                        <span class="error"><?php echo form_error('address'); ?></span>
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?php if(isset($customer['phone_number'])) echo $customer['phone_number']; ?>">
                        <span class="error"><?php echo form_error('phone_number'); ?></span>
                        <label for="phone_number">Email</label>
                        <input type="text" name="email" id="email" value="<?php if(isset($customer['email'])) echo $customer['email']; ?>">
                        <span class="error"><?php echo form_error('email'); ?></span>
                        <label for="notice">Yêu cầu của khách</label>
                        <textarea name="notice" name='notice' id="" cols="30" rows="10"><?php if(isset($customer['notice'])) echo $customer['notice']; ?></textarea>
                        <span class="error"><?php echo form_error('notice'); ?></span>
                        <button type="submit" name="btn_update_customer" id="btn_update_customer">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>      