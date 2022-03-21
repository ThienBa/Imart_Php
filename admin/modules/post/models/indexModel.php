<?php
    function add_post($data){
        db_insert("tbl_post", $data);
    }

    function get_list_post(){
        return db_fetch_array("SELECT * FROM `tbl_post`");
    }

    function get_post($start, $num_per_page){
        $result = db_fetch_array("SELECT * FROM `tbl_post` LEFT JOIN `tbl_post_cat` ON `tbl_post`.`cat_id` = `tbl_post_cat`.`cat_id` LIMIT {$start}, {$num_per_page}");
        return $result;
    }

    function search_post($value){
        $search_post = db_fetch_array("SELECT * FROM `tbl_post` LEFT JOIN `tbl_post_cat` ON `tbl_post`.`cat_id` =  `tbl_post_cat`.`cat_id` WHERE `post_title` LIKE '%{$value}%'  OR `create_date_post` LIKE '%{$value}%' OR `creator` LIKE '%{$value}%'");
        return $search_post;
    }

    function update_post($data, $id){
        db_update("tbl_post", $data, "`post_id` = {$id}");
    }

    function get_post_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = {$id}");
    }

    function delete_post($id){
        db_delete("tbl_post", "`post_id` = {$id}");
    }

    function get_list_cat(){
        return db_fetch_array("SELECT * FROM `tbl_post_cat`");
    }

    function add_post_cat($data){
        db_insert("tbl_post_cat", $data);   
    }

    function get_cat_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `cat_id` = {$id}");
    }

    function update_post_cat($data, $id){
        return db_update("tbl_post_cat", $data, "`cat_id` = {$id}");
    }

    function delete_cat_by_id($id){
        db_delete("tbl_post_cat", "`cat_id` = {$id}");
    }
?>