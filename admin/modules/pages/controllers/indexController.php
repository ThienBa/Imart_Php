<?php
    function construct(){
        load_model("index");
    }

    function detailAction(){
        global $page, $num_page, $start, $num_row, $result_search, $list_pages;
        //Search
        if(isset($_POST['btn_search']) && !empty($_POST['search'])){
            $result_search = search_data($_POST['search']);
            foreach(search_data($_POST['search']) as &$item){
                $item['url_delete'] = "?mod=pages&action=delete&id={$item['page_id']}";
                $item['url_update'] = "?mod=pages&action=update&id={$item['page_id']}";
            }
        }
        //=======================================================      
        //Lấy tổng số lượng bản ghi
        $num_row = db_num_rows("SELECT * FROM `tbl_page`");
        $total_row = $num_row;
        //Số phần tử hiển thị trên 1 trang
        $num_per_page = 3;
        //Tính tổng số lượng trang
        $num_page = ceil($total_row/$num_per_page);
        $page = isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;

        $list_page = get_page($start, $num_per_page);
        //Truyền dữ liệu qua view
        foreach ($list_page as &$page){
            $page['url_delete'] = "?mod=pages&action=delete&id={$page['page_id']}";
            $page['url_update'] = "?mod=pages&action=update&id={$page['page_id']}";
        }
        $data['list_page'] = $list_page;
        load_view("detail", $data);
    }

    function updateAction(){
        global $error, $page, $success;
        $id = (int)$_GET['id'];
        $page = get_page_by_id($id);
    
        if(isset($_POST['btn_update'])){
            $error = array();

            if(empty($_POST['page_title'])){
                $error['page_title'] = "Không được để trống tiêu đề";
            }else{
                $page_title = $_POST['page_title'];
            }

            $creator = $_POST['creator'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['content'])){
                    $error['content'] = "Không được để trống nội dung bài viết";
                }else{
                    $content = $_POST['content'];
                }
            }

            if(empty($_POST['slug'])){
                $error['slug'] = "Không được để trống slug";
            }else{
                $slug = $_POST['slug'];
            }

            if(empty($error)){
                $data = array(
                    'page_title' => $page_title,
                    'creator' => $creator,
                    'date_edit' => time(),
                    'slug' => $slug,    
                    'content' => $content
                );
                update_page($data, $id);
                $success['update_page'] = "Cập nhật dữ liệu mới thành công! Hãy load lại dữ liệu!";
            }
        }
        load_view("update");
    }

    function add_pageAction(){
        global $error, $success, $upload_file;
        if(isset($_POST['btn_add_page'])){
            $error = array();
            //Kiểm tra form nhập liệu
            if(empty($_POST['page_title'])){
                $error['page_title'] = "Không được để trống tiêu đề";
            }else{
                $page_title = $_POST['page_title'];
            }
            
            if(empty($_POST['slug'])){
                $error['slug'] = "Không được để trống slug";
            }else{
                $slug = $_POST['slug'];
            }

            $creator = $_POST['creator'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['content'])){
                    $error['content'] = "Không được để trống nội dung bài viết";
                }else{
                    $content = $_POST['content'];
                }
            }

           /* //Thư mục chưa file upload
            $upload_dir = "public/uploads/";
            //Đường dẫn của file sau khi upload
            $upload_file = $upload_dir.$_FILES['file']['name'];
   
            #Xử lí upload đúng file ảnh
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($type), $type_allow)){//Kiếm tra chuỗi có trong mảng và chuyển thành chữ thường để so sánh
                $error['file'] = "Chỉ được upload file có định dạng jpg, png, gif, jpeg"; 
            }else{
                #Upload file có kích thước cho phép (<20MB ~ 29.000.000)
                $file_size = $_FILES['file']['size'];
                if($file_size > 29000000){
                    $error['file'] = "Chỉ được upload file có kích thước thấp hơn 20MB"; 
                }
    
                if(file_exists($upload_file)){
                    //========================================================
                    //Xử lí đổi tên file tự động
                    //========================================================
    
                    #Tạo file mới
                    //Tên file.Đuôi file
                    $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                    $new_file_name = $file_name.' - Copy.';
                    $new_upload_file = $upload_dir.$new_file_name.$type;
                    $k = 1;
                    while(file_exists( $new_upload_file)){
                        $new_file_name = $file_name." - Copy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir.$new_file_name.$type;
                    }
    
                    $upload_file = $new_upload_file; 
                }
            }
            */

            if(empty($error)){
                $data = array(
                    'page_title' => $page_title,
                    'creator' => $creator,
                    'slug' => $slug,
                    'images_url' => $upload_file,
                    'create_date' => time(),  
                    'content' => $content
                );
                add_page($data);
                $success['add_page'] = "Thêm trang dữ liệu mới vào database thành công!";
            }
        }
        load_view("add_page");
    }

    function deleteAction(){
        $id = (int)$_GET['id'];
        delete_page($id);
        redirect_to("?mod=pages&action=detail");
    }
?>