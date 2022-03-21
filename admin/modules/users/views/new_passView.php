<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/login.css">
    <title>Thiết lập mật khẩu mới</title>
</head>
<body>  
    <div id="wp-form-login">
        <h1 class="page-title">MẬT KHẨU MỚI</h1>
        <?php global $success; if(isset($success['change_pass_success'])) echo "<p class='success'>$success[change_pass_success]</p>" ?>
        <form id="form-login" action="" method="post">
            <input type="password" name="password" id="password" placeholder="Password">
            <span class="error"><?php echo form_error('password'); ?></span>
            <input type="password" name="password_retype" id="password" placeholder="Retype Password">
            <span class="error"><?php echo form_error('password'); ?></span>
            <input type="submit" name="btn_newpass" id="btn_login" value="LƯU MẬT KHẨU">
            <span class="error"><?php echo form_error('two_password'); ?></span>
            <a id="lost-password" href="?mod=users&controller=index&action=login">Đăng nhập</a>
        </form>
    </div>
</body>
</html>