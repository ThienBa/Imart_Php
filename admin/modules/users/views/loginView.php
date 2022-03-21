<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/login.css">
    <title>Login</title>
</head>
<body>  
    <div id="wp-form-login">
        <h1 class="page-title">ĐĂNG NHẬP ADMIN</h1>
        <form id="form-login" action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
            <span class="error"><?php echo form_error('username'); ?></span>
            <input type="password" name="password" id="password" placeholder="Password">
            <span class="error"><?php echo form_error('password'); ?></span>
            <input type="submit" name="btn_login" id="btn_login" value="Đăng nhập">
            <span class="error"><?php echo form_error('account'); ?></span>
        </form>
    </div>
</body>
</html>