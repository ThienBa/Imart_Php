<?php
    function construct(){
        load_model("index");
    }

    function indexAction(){
        global $slider, $outstanding, $list_phone, $list_laptop, $product_selling;
        $slider = get_list_slider();
        $outstanding = get_product_outstanding();
        foreach ($outstanding as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        $list_phone = get_list_phone();
        $list_laptop = get_list_laptop();
        foreach ($list_phone as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        foreach ($list_laptop as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        load_view("index");
    }

    function search_headerAction() {
        $output = "";
        $text = $_POST['search']; 
        if(!empty($text)){
            $result_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_name` LIKE '%{$text}%'");
            $count = db_num_rows("SELECT * FROM `tbl_product` WHERE `product_name` LIKE '%{$text}%'");
            if(!empty($result_product)){
                $output .= "<h1>Tìm thấy {$count} kết quả cho từ khóa <b>'{$text}'</b></h1>";
                $output .= "<div class='section' id='list-product-wp'>";
                $output .= "<div class='section-detail'>";
                $output .= "<ul class='list-item clearfix'>";
                foreach ($result_product as &$item){
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['product_price'] = currency_format($item['product_price']);
                    if($item['old_price'] != NULL) $item['old_price'] = currency_format($item['old_price']);
                    $output .= "<li>";
                    $output .= "<a href='{$item['url_detail']}' title='' class='thumb'>
                                    <img src='{$item['product_thumb']}'>
                                </a>
                                <a href='{$item['url_detail']}' title='' class='product-name'>{$item['product_name']}</a>
                                <div class='price'>
                                    <span class='new'>{$item['product_price']}</span>
                                    <span class='old'>{$item['old_price']}</span>
                                </div>
                                <div class='action clearfix'>
                                    <a href='{$item['url_add_cart']}' title='' class='add-cart fl-left'>Thêm giỏ hàng</a>
                                    <a href='{$item['buy_now']}' title='' class='buy-now fl-right'>Mua ngay</a>
                                </div>";
                    $output .= "</li>"; 
                }
                $output .= "</ul>";
                $output .= "</div>";
                $output .= "</div>";
            
                echo $output;
            }else{
                if(empty($result_product)){
                    $result_post = db_fetch_array("SELECT * FROM `tbl_post` WHERE `post_title` LIKE '%{$text}%'");
                    $count = db_num_rows("SELECT * FROM `tbl_post` WHERE `post_title` LIKE '%{$text}%'");
                    if(!empty($result_post)){
                        $output .= "<h1>Tìm thấy {$count} kết quả cho từ khóa <b>'{$text}'</b></h1>";
                        $output .= "<div class='section' id='list-blog-wp'>";
                        $output .= "<div class='section-detail'>";
                        $output .= "<ul class='list-item clearfix'>";
                        foreach ($result_post as &$item){
                            $item['url_detail_post'] = "chi-tiet-bai-viet/"."{$item['slug']}";
                            if($item['cat_id'] == 1) $item['cat_id'] = 'Điện thoại'; else $item['cat_id'] = 'Máy tính - Laptop - Tablet';
                            
                            $output .= "<li class='clearfix'>";
                            $output .= "<a href='{$item['url_detail_post']}' title='' class='thumb fl-left'>
                                            <img src='{$item['post_thumb']}' alt=''>
                                        </a>
                                        <div class='info fl-right'>
                                            <a href='{$item['url_detail_post']}' title='' class='title'>{$item['post_title']}</a>
                                            <span class='create-date'><?php echo date('d/m/Y', {$item['create_date_post']}); ?>
|| {$item['creator']}</span>
<p class='desc'>{$item['cat_id']}</p>
</div>";
$output .= "</li>";
}
$output .= "</ul>";
$output .= "</div>";
$output .= "</div>";
}
}
echo $output;
}
if(empty($result_product) && empty($result_post)){
echo "Không tìm thấy kết quả nào phù hợp với từ khóa <b>'{$text}'</b>";
}
}else{
echo "Hãy nhập từ khóa bạn muốn tìm kiếm cho sản phẩm và bài viết.";
}
}
?>