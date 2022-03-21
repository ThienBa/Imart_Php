<?php
    function construct(){
        load_model("index");
        load("lib", "pagging");
    }

    
    function mainAction(){
        global $list_phone, $list_laptop, $num_page, $page, $total_product, $num_product, $search_AZ, $search_ZA, $search_high_to_low, $search_low_to_high;
        $total_product = db_num_rows("SELECT * FROM `tbl_product`");
        #Paging
        $num_row_mobile = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1");
        $num_row_laptop = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2");
        $total_row = ceil(($num_row_mobile + $num_row_laptop) / 2);
        $num_per_page = 8;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_product = num_product($start, $num_per_page);

        #Lấy giới hạn theo pagging
        $list_phone = get_list_phone($start, $num_per_page);
        $list_laptop = get_list_laptop($start, $num_per_page);
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
        //============================================================================
        #Search
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_AZ = search_AZ();
                foreach ($search_AZ as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_ZA = search_ZA();
                foreach ($search_ZA as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 3){
                $search_high_to_low = search_high_to_low();
                foreach ($search_high_to_low as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 4){
                $search_low_to_high = search_low_to_high();
                foreach ($search_low_to_high as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }
        load_view("main");
    }

    function detailAction(){
        global $same_category;
        $id = (int)$_GET['id'];
        $detail_product = get_detail_product_by_id($id);
        if($detail_product['cat_id'] == 1)
            $same_category = get_product_mobile_same_category($id);
        else
            $same_category = get_product_laptop_same_category($id);
        foreach($same_category as &$item){
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        $data['detail_product'] = $detail_product;
        load_view("detail", $data);
    }

    
    
    function iphoneAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_iphone, $search_high_to_low_iphone, $search_low_to_high_iphone;
        $list_iphone = get_list_iphone();
        foreach ($list_iphone as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 1");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_iphone = num_iphone($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_iphone = search_high_to_low_iphone();
                foreach ($search_high_to_low_iphone as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_iphone = search_low_to_high_iphone();
                foreach ($search_low_to_high_iphone as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }
        $data['list_iphone'] = $list_iphone;
        load_view("iphone", $data);
    }

    function samsungAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_samsung, $search_high_to_low_samsung, $search_low_to_high_samsung;
        $list_samsung = get_list_samsung();
        foreach ($list_samsung as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 2");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_samsung = num_samsung($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_samsung = search_high_to_low_samsung();
                foreach ($search_high_to_low_samsung as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_samsung = search_low_to_high_samsung();
                foreach ($search_low_to_high_samsung as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }
        $data['list_samsung'] = $list_samsung;
        load_view("samsung", $data);
    }

    function oppoAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_oppo, $search_high_to_low_oppo, $search_low_to_high_oppo;
        $list_oppo = get_list_oppo();
        foreach ($list_oppo as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 4");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_oppo = num_oppo($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_oppo = search_high_to_low_oppo();
                foreach ($search_high_to_low_oppo as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_oppo = search_low_to_high_oppo();
                foreach ($search_low_to_high_oppo as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }
        $data['list_oppo'] = $list_oppo;
        load_view("oppo", $data);
    }

    function xiaomiAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_xiaomi, $search_high_to_low_xiaomi, $search_low_to_high_xiaomi;
        $list_xiaomi = get_list_xiaomi();
        foreach ($list_xiaomi as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 4");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_xiaomi = num_xiaomi($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_xiaomi = search_high_to_low_xiaomi();
                foreach ($search_high_to_low_xiaomi as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_xiaomi = search_low_to_high_xiaomi();
                foreach ($search_low_to_high_xiaomi as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }
        $data['list_xiaomi'] = $list_xiaomi;
        load_view("xiaomi", $data);
    }

    function macbookAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_macbook, $search_high_to_low_macbook, $search_low_to_high_macbook;
        $list_macbook = get_list_macbook();
        foreach ($list_macbook as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 5");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_macbook = num_macbook($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_macbook = search_high_to_low_macbook();
                foreach ($search_high_to_low_macbook as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_macbook = search_low_to_high_macbook();
                foreach ($search_low_to_high_macbook as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }   
        $data['list_macbook'] = $list_macbook;
        load_view("macbook", $data);
    }

    function asusAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_asus, $search_high_to_low_asus, $search_low_to_high_asus;
        $list_asus = get_list_asus();
        foreach ($list_asus as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 6");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_asus = num_asus($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_asus = search_high_to_low_asus();
                foreach ($search_high_to_low_asus as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_asus = search_low_to_high_asus();
                foreach ($search_low_to_high_asus as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }   
        $data['list_asus'] = $list_asus;
        load_view("asus", $data);
    }

    function acerAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_acer, $search_high_to_low_acer, $search_low_to_high_acer;
        $list_acer = get_list_acer();
        foreach ($list_acer as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 7");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_acer = num_acer($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_acer = search_high_to_low_acer();
                foreach ($search_high_to_low_acer as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_acer = search_low_to_high_acer();
                foreach ($search_low_to_high_acer as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }   
        $data['list_acer'] = $list_acer;
        load_view("acer", $data);
    }

    function msiAction(){
        global $num_page, $page, $total_row, $num_per_page, $num_msi, $search_high_to_low_msi, $search_low_to_high_msi;
        $list_msi = get_list_msi();
        foreach ($list_msi as &$item) {
            $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        #Pagging
        $total_row = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 8");
        $num_per_page = 10;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        $num_msi = num_msi($start, $num_per_page);
        #Arrange
        if(isset($_POST['btn_search'])){
            if($_POST['select'] == 1){
                $search_high_to_low_msi = search_high_to_low_msi();
                foreach ($search_high_to_low_msi as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }
            if($_POST['select'] == 2){
                $search_low_to_high_msi = search_low_to_high_msi();
                foreach ($search_low_to_high_msi as &$item) {
                    $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                    $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
                    $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                }
            }       
        }   
        $data['list_msi'] = $list_msi;
        load_view("msi", $data);
    }

    function fillter_productAction(){
        //Lọc theo giá
        $output = "";
        if(!empty($_POST['value_price']))
            $value_price = $_POST['value_price'];
        if(!empty($_POST['value_brand']))
            $value_brand = $_POST['value_brand'];
        if(!empty($_POST['value_type']))
            $value_type = $_POST['value_type'];
        $where = "";
        if(!empty($value_price)){
            $where = " WHERE `product_price` {$value_price}";
        }   
        if(!empty($value_brand)){
            if(empty($where)){
                $where = " WHERE `child_id` = {$value_brand}";
            }else{
                $where = " WHERE `product_price` {$value_price} AND `child_id` = {$value_brand}";
            }
        }
        if(!empty($value_type)){
            if(empty($where)){
                $where = " WHERE `cat_id` = {$value_type}";
            }else{
                if(!empty($value_price) && !empty($value_brand)){
                    $where = " WHERE `product_price` {$value_price} AND `child_id` = {$value_brand} AND `cat_id` = {$value_type}";
                }
                if(!empty($value_price) && empty($value_brand)){
                    $where = " WHERE `product_price` {$value_price} AND `cat_id` = {$value_type}";
                }
                if(empty($value_price) && !empty($value_brand)){
                    $where = " WHERE `child_id` = {$value_brand} AND `cat_id` = {$value_type}";
                }
            }
        }
        $result = db_fetch_array("SELECT * FROM `tbl_product` {$where}");
        $count = db_num_rows("SELECT * FROM `tbl_product` {$where}");
            if(!empty($result)){
                $output .= "<h1>Tìm thấy <b>{$count}</b> kết quả !</h1>";
                $output .= "<div class='section' id='list-product-wp'>";
                $output .= "<div class='section-detail'>";
                $output .= "<ul class='list-item clearfix'>";
                foreach ($result as &$item){
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
                echo "Không có kết quả tìm kiếm nào có danh mục trên.";
            }    
    }
?>