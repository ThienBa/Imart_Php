<?php
    function check_slider_order($slider_order){
        $check_slider_order = db_num_rows("SELECT * FROM `tbl_slider` WHERE `slider_order` = {$slider_order}");
        if($check_slider_order > 0)
            return false;
        return true;
    }

    function add_slider($data){
        return db_insert("tbl_slider", $data);
    }

    function get_list_slider($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_slider` LIMIT {$start}, {$num_per_page}");
    }

    function get_slider(){
        return db_fetch_array("SELECT * FROM `tbl_slider`");
    }

    function search_status($status){
        return db_fetch_array("SELECT * FROM `tbl_slider` WHERE `slider_status` LIKE {$status}");
    }

    function delete_slider_by_id($id){
        return db_delete("tbl_slider", "`slider_id` = {$id}");
    }
?>