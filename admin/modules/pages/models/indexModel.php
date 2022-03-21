<?php
    function get_page($start, $num_per_page, $where = ""){
        if(!empty($where)){
            $where = "WHERE {$where}";
        }
        $result = db_fetch_array("SELECT * FROM `tbl_page` {$where} LIMIT {$start}, {$num_per_page}");
        return $result;
    }

    function search_data($value_search){
        $search_data = db_fetch_array("SELECT * FROM `tbl_page` WHERE `page_title` LIKE '%{$value_search}%' OR `creator` LIKE '%{$value_search}%' OR `create_date` LIKE '%{$value_search}%'");
        return $search_data;
    }

    function get_page_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_page` WHERE `page_id` = {$id}");
    }

    function update_page($data, $id){
        db_update("tbl_page", $data, "`page_id` = {$id}");
    }

    function add_page($data){
        db_insert("tbl_page", $data);
    }

    function delete_page($id){
        db_delete("tbl_page", "`page_id` = '{$id}'");
    }

    function add_images($data){
        
    }
?>