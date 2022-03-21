<?php
    get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add_user" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm người quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
            get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php global $success; if(isset($success['add_user'])) echo "<p class='success'>$success[add_user]</p>" ?>
                    <form method="POST">
                        <label for="display-name">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" value="">
                        <span class="error"><?php echo form_error('fullname'); ?></span>
                        <label for="usernamee">Tài khoảng</label>
                        <input type="text" name="username" id="usernamee" placeholder="">
                        <span class="error"><?php echo form_error('username'); ?></span>
                        <label for="usernamee">Mật khẩu</label>
                        <input type="password" name="password" id="password" placeholder="">
                        <span class="error"><?php echo form_error('password'); ?></span>
                        <label for="usernamee">Nhập lại mật khẩu</label>
                        <input type="password" name="password_retype" id="password" placeholder="">
                        <span class="error"><?php echo form_error('password_retype'); ?></span>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="">
                        <span class="error"><?php echo form_error('email'); ?></span>
                        <button type="submit" name="btn-add-user" id="btn-add-user">Thêm tài khoảng</button>
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