<?php
    function get_list_slider(){
        return db_fetch_array("SELECT * FROM `tbl_slider`");
    }

    function get_product_outstanding(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 LIMIT 10, 18");
    }

    function get_list_phone(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 AND `cat_id` = 1");
    }

    function get_list_laptop(){
        return db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_status` = 2 AND  `cat_id` = 2");
    }
?>