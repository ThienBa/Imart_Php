<?php 
    function product_celling(){ 
        $product_selling = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 AND  `qty` <= 2");
        foreach ($product_selling as &$item) {
            $item['url_buy_now'] = "mua-ngay/"."{$item['slug']}";
            $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
        }
        return $product_selling;
    }
?>