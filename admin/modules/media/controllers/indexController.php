<?php
    function construct(){
        load_model("index");
    }

    function list_mediaAction(){
        global $page, $num_page, $start, $total_row;
        //Lấy tổng số lượng bản ghi
        $num_row = db_num_rows("SELECT * FROM `tbl_media`");
        $total_row = $num_row;
        //Số phần tử hiển thị trên 1 trang
        $num_per_page = 5;
        //Tính tổng số lượng trang
        $num_page = ceil($total_row/$num_per_page);
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;

        $list_media = get_media($start, $num_per_page);
        //Truyền dữ liệu qua view
        foreach ($list_media as &$media){
            $media['url_delete'] = "?mod=media&action=delete&id={$media['thumb_id']}";
        }
        $data['list_media'] = $list_media;
        load_view("list_media", $data);
    }

    function deleteAction() {
        $id = (int)$_GET['id'];
        delete_media($id);
        redirect_to("?mod=media&action=list_media");
    }
?>