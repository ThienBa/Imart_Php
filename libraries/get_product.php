<?php
    function get_detail_product_by_id($id){
        $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
        foreach($list_product as $item){
            if($item['product_id'] == $id){
                $item['url_add_cart'] = "them-gio-hang/"."{$item['slug']}";
                $item['url_detail'] = "chi-tiet-san-pham/"."{$item['slug']}";
                return $item;
            }
        }
        return false;
    }
?>