<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/upload_images.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="?mod=post&action=detail" title="" id="logo" class="fl-left">ADMIN</a>
                        <ul id="main-menu" class="fl-left">
                            <!-- <li>
                                <a href="" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=pages&action=add_page" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=pages&action=detail" title="">Danh sách trang</a> 
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=post&action=add_post" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=post&action=detail" title="">Danh sách bài viết</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=post&action=category" title="">Danh mục bài viết</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=product&action=add_product" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=product&action=main" title="">Danh sách sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=product&action=category" title="">Danh mục sản phẩm</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=order&action=list_order" title="">Danh sách đơn hàng</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=order&action=list_customer" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="" title="">Slider</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=slider&action=add_slider" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=slider&action=list_slider" title="">Danh sách slider</a> 
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left">
                                    <img width="40px" src="
                                    <?php if(is_login() && !empty(info_user('images'))){
                                        echo info_user('images');
                                    }else{
                                        echo 'public/images/img-admin.png';
                                    }  ?>">
                                </div>
                                <h3 id="account" class="fl-right"><?php if(is_login()) echo info_user('fullname'); ?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?mod=users&action=avatar" title="Đổi ảnh đại diện">Đổi ảnh đại diện</a></li>
                                <li><a href="?mod=users&action=update" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>