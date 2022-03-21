<?php
    function get_list_order($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_order`.`customer_id` = `tbl_customer`.`customer_id` LIMIT {$start}, {$num_per_page}");
    }

    function search_action($status){
        return db_fetch_array("SELECT * FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_order`.`id` = `tbl_customer`.`id` WHERE `order_status` LIKE {$status}");
    }

    function search_order($value){
        return db_fetch_array("SELECT * FROM `tbl_order` RIGHT JOIN `tbl_customer` ON `tbl_order`.`id` = `tbl_customer`.`id` WHERE `name` LIKE '%{$value}%' OR `order_qty` LIKE '%{$value}%' OR `total_price` LIKE '%{$value}%'");
    }

    function get_detail_order_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_order`, `tbl_product`, `tbl_customer` WHERE `tbl_order`.`id` = {$id} AND `tbl_order`.`customer_id` = `tbl_customer`.`customer_id` AND `tbl_product`.`product_id` = `tbl_order`.`product_id`");
    }

    function get_order_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_order` LEFT JOIN `tbl_customer` ON `tbl_order`.`customer_id` = `tbl_customer`.`customer_id` WHERE `tbl_order`.`id` = {$id}");
    }

    function update_order($data, $id){
        return db_update("tbl_order", $data, "`id` = {$id}");
    }

    function delete_order_by_id($id){
        return db_delete("tbl_order", "`id` = {$id}");
    }

    function get_list_customer($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_customer` LIMIT {$start}, {$num_per_page}");
    }

    function search_customer($value){
        return db_fetch_array("SELECT * FROM `tbl_customer` WHERE `name` LIKE '%{$value}%' OR `phone_number` LIKE '%{$value}%' OR `email` LIKE '%{$value}%' OR `address` LIKE '%{$value}%'");
    }

    function get_info_customer_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_customer` WHERE `customer_id` = {$id}");
    }

    function update_customer($data, $id){
        return db_update("tbl_customer", $data, "`customer_id` = {$id}");
    }

    function delete_customer_by_id($id){
        return db_delete("tbl_customer", "`customer_id` = {$id}");
    }
?>