<?php
    function get_list_post($start, $num_per_page){
        return db_fetch_array("SELECT * FROM `tbl_post` LIMIT {$start}, {$num_per_page}");
    }

    function get_post_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = {$id}");
    }
?>  