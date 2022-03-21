<?php
    get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add_user" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
            get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php global $success; if(isset($success['update_info_user'])) echo "<p class='success'>$success[update_info_user]</p>" ?>
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $info_user['fullname']; ?>">
                        <span class="error"><?php echo form_error('fullname'); ?></span>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="<?php echo $info_user['username']; ?>" readonly="readonly">
                        <span class="error"><?php echo form_error('username'); ?></span>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']; ?>">
                        <span class="error"><?php echo form_error('email'); ?></span>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="phone_number" value="<?php echo $info_user['phone_number']; ?>">
                        <span class="error"><?php echo form_error('phone_number'); ?></span>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_user['address']; ?></textarea>
                        <span class="error"><?php echo form_error('address'); ?></span>
                        <button type="submit" name="btn-update-info" id="btn-update-info">Cập nhật</button>
                        <span class="error"><?php echo form_error('account'); ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>
