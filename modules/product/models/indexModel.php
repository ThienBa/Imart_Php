<?php
    function get_list_phone($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `product_status` = 2 LIMIT {$start}, {$num_per_page}");
    }

    function get_list_laptop($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `product_status` = 2 LIMIT {$start}, {$num_per_page}");
    }

    function num_product($start, $num_per_page){
        $num_mobile = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `product_status` = 2 LIMIT {$start}, {$num_per_page}");
        $num_laptop = db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `product_status` = 2 LIMIT {$start}, {$num_per_page}");
        return $num_mobile + $num_laptop;
    }

    function search_AZ(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 ORDER BY `product_name` DESC");
    }

    function search_ZA(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 ORDER BY `product_name` ASC");
    }

    function search_high_to_low(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 ORDER BY `product_price` DESC");
    }

    function search_low_to_high(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 ORDER BY `product_price` ASC");
    }

    function get_product_mobile_same_category($id){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 EXCEPT  SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
    }

    function get_product_laptop_same_category($id){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 EXCEPT  SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
    }

    function get_list_iphone(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 1");
    }

    function num_iphone($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 1 AND `child_id` = 1 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_iphone(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 1 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_iphone(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 1 ORDER BY `product_price` ASC");
    }

    function get_list_samsung(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 2");
    }

    function num_samsung($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 1 AND `child_id` = 2 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_samsung(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 2 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_samsung(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 2 ORDER BY `product_price` ASC");
    }

    function get_list_oppo(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 3");
    }

    function num_oppo($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 1 AND `child_id` = 3 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_oppo(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 3 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_oppo(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 3 ORDER BY `product_price` ASC");
    }

    function get_list_xiaomi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 4");
    }

    function num_xiaomi($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 1 AND `child_id` = 4 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_xiaomi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 4 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_xiaomi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 1 AND `child_id` = 4 ORDER BY `product_price` ASC");
    }

    
    function get_list_macbook(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 5");
    }

    function num_macbook($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 2 AND `child_id` = 5 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_macbook(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 5 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_macbook(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 5 ORDER BY `product_price` ASC");
    }

    function get_list_asus(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 6");
    }

    function num_asus($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 2 AND `child_id` = 6 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_asus(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 6 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_asus(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 6 ORDER BY `product_price` ASC");
    }

    function get_list_acer(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 7");
    }

    function num_acer($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 2 AND `child_id` = 7 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_acer(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 7 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_acer(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 7 ORDER BY `product_price` ASC");
    }

    
    function get_list_msi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 8");
    }

    function num_msi($start, $num_per_page){
        return db_num_rows("SELECT * FROM `tbl_product`  WHERE `cat_id` = 2 AND `child_id` = 8 LIMIT {$start}, {$num_per_page}");
    }

    function search_high_to_low_msi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 8 ORDER BY `product_price` DESC");
    }

    function search_low_to_high_msi(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = 2 AND `child_id` = 8 ORDER BY `product_price` ASC");
    }
?>