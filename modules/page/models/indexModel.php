<?php
    function get_page_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_page` WHERE `page_id` = {$id}");
    }
?>