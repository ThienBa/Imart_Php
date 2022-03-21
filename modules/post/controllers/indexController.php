<?php
    function construct(){
        load_model("index");
        load("lib", "pagging");
    }

    function mainAction(){
        global $num_page, $page, $list_phone, $list_laptop;
        #Paging
        $total_row = db_num_rows("SELECT * FROM `tbl_post`");
        $num_per_page = 7;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        #Lấy giới hạn theo pagging
        $list_post = get_list_post($start, $num_per_page);
        foreach($list_post as &$post){
            $post['url_detail_post'] = "chi-tiet-bai-viet/"."{$post['slug']}";
        }
        $data['list_post'] = $list_post;
        load_view("main", $data);
    }

    function detailAction(){
        $id = (int)$_GET['id'];
        $detail_post = get_post_by_id($id);
        $data['detail_post'] = $detail_post;
        load_view("detail", $data);
    }
?>