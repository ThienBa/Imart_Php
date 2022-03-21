<?php
    get_header();
?>
<div id="main-content-wp" class="change-pass-page">
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
                    <?php global $success; if(!empty($success['update_password'])) echo "<p class='success'>$success[update_password]</p>" ?>
                    <?php global $error; if(!empty($error['password'])) echo "<p class='error'>$error[password]</p>" ?><br>
                    <form method="POST">
                        <label for="password_old">Mật khẩu cũ</label>
                        <input type="password" name="password_old" id="password_old">
                        <span class="error"><?php echo form_error('password_old')?></span>
                        <label for="password_new">Mật khẩu mới</label>
                        <input type="password" name="password_new" id="password_new">
                        <span class="error"><?php echo form_error('password_new')?></span>
                        <label for="confirm_pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm_pass">
                        <span class="error"><?php echo form_error('two_password')?></span>
                        <a href="?mod=users&controller=index&action=lost_pass">Quên mật khẩu?</a>
                        <button type="submit" name="btn-change-pass" id="btn-change-pass">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>