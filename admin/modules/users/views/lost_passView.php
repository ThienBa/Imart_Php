<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/reg.css">
    <title>Đăng kí</title>
</head>

<body>
    <div id="wp-form-reg">
        <h1 class="page-title">KHÔI PHỤC MẬT KHẨU</h1>
        <?php global $success; if(!empty($success['request_change_pass'])) echo "<p class='success'>$success[request_change_pass]</p>" ?>
        <form id="form-reg" action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
            <span class="error"><?php echo form_error('username'); ?></span>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
            <span class="error"><?php echo form_error('email'); ?></span>
            <input type="submit" name="btn_lost_pass" id="btn_reg" value="GỬI YÊU CẦU">
            <span class="error"><?php echo form_error('account'); ?></span>
            <a id="login" href="?mod=users&controller=index&action=login">Đăng nhập</a>
        </form>
    </div>
</body>

</html>