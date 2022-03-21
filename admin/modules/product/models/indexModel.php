<?php
    function add_product($data){
       return db_insert("tbl_product", $data);
    }

    function get_list_product($start, $num_per_page, $where=""){
        if(!empty($where)){
            $where = "WHERE {$where}";
        }
        return db_fetch_array("SELECT * FROM `tbl_product` LEFT JOIN `tbl_product_cat` ON `tbl_product`.`cat_id` = `tbl_product_cat`.`cat_id` {$where} LIMIT {$start},{$num_per_page}");
    }

    function get_list_product_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
    }

    function update_product($data, $id){
        return db_update("tbl_product", $data, "`product_id` = {$id}"); 
    }

    function delete_product_by_id($id){
        return db_delete("tbl_product", "`product_id` = {$id}");
    }

    function search_product($value){
        return db_fetch_array("SELECT * FROM `tbl_product` LEFT JOIN `tbl_product_cat` ON `tbl_product`.`cat_id` = `tbl_product_cat`.`cat_id` WHERE `product_code` LIKE '%{$value}%' OR `product_name` LIKE '%{$value}%' OR `product_price` LIKE '%{$value}%' OR `creator` LIKE '%{$value}%' OR `add_date` LIKE '%{$value}%'");
    }

    function get_full_product(){
        return db_fetch_array("SELECT * FROM `tbl_product` LEFT JOIN `tbl_product_cat` ON `tbl_product`.`cat_id` = `tbl_product_cat`.`cat_id`");
    }

    function get_product_cat(){
        return db_fetch_array("SELECT * FROM `tbl_product_cat`");
    }

    function get_product_cat_by_cat_id($cat_id){
        return db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `cat_id` = {$cat_id}");
    }

    function update_cat_product($data, $cat_id){
        return db_update("tbl_product_cat", $data, "`cat_id` = {$cat_id}");
    }

    function add_cat_product($data){
        return db_insert("tbl_product_cat", $data);
    }

    function delete_product_cat_by_cat_id($cat_id){
        return db_delete("tbl_product_cat", "`cat_id` = {$cat_id}");
    }

    function search_status($status){
        return db_fetch_array("SELECT * FROM `tbl_product` LEFT JOIN `tbl_product_cat` ON `tbl_product`.`cat_id` = `tbl_product_cat`.`cat_id` WHERE `product_status` LIKE {$status}");
    }
?>