<?php
    function get_media($start, $num_per_page, $where = ""){
        if(!empty($where)){
            $where = "WHERE {$where}";
        }
        $result = db_fetch_array("SELECT * FROM `tbl_media` LEFT JOIN `tbl_product` ON `tbl_product`.`product_id` = `tbl_media`.`product_id` {$where} LIMIT {$start}, {$num_per_page}");
        return $result;
    }

    function delete_media($id){
        return db_delete("tbl_media","`thumb_id` = {$id}");
    }
?>