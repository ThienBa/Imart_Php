<?php
    session_start();
    ob_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * 
 */

$config['base_url'] = "http://localhost/Unitop.vn/back-end/project/ismart.com/admin/";


$config['default_module'] = 'post';
$config['default_controller'] = 'index';
$config['default_action'] = 'detail';












