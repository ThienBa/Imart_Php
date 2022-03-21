<?php
    function construct(){
        load_model("index");
    }

    function add_sliderAction(){
        global $error, $upload_file, $success;
  
        if(isset($_POST['btn_add_slider'])){
            $error = array();

            #Validation form
            if(empty($_POST['slider_name'])){
                $error['slider_name'] = "Hãy nhập tên slider";
            }else{
                $slider_name = $_POST['slider_name'];
            }

            if(empty($_POST['slider_link'])){
                $error['slider_link'] = "Hãy nhập liên kết cho slider";
            }else{
                $slider_link = $_POST['slider_link'];
            }

            if(empty($_POST['slider_desc'])){
                $error['slider_desc'] = "Hãy nhập đoạn mô tả ngắn cho slider";
            }else{
                $slider_desc = $_POST['slider_desc'];
            }

            if(empty($_POST['slider_order'])){
                $error['slider_order'] = "Không để trống thự tự slider";
            }else{
                if(!check_slider_order($_POST['slider_order'])){
                    $error['slider_order'] = "Đã có thứ tự trùng với thứ tự vừa nhập";
                }else{
                    $slider_order = $_POST['slider_order'];
                }
            }

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(empty($_POST['slider_status'])){
                    $error['slider_status'] = "Hãy chọn trạng thái slider";
                }else{
                    $slider_status = $_POST['slider_status'];
                }
            }

            #Xử lí load file
            $upload_dir = "public/uploads/";
            $upload_file =  $upload_dir.$_FILES['file']['name'];
            $type_allow = array('png', 'jpg', 'jpeg', 'gif');
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($type), $type_allow)){
                $error['file'] = "Định dạng file ảnh cho phép là png, jpeg, jpg, gif";
            }else{
                if($_FILES['file']['size'] > 2048000){
                    $error['file'] = "File ảnh vượt quá kích thước cho phép";
                }

                if(file_exists($upload_file)){
                    $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                    $new_file_name = $file_name." - Copy.";
                    $new_upload_file = $upload_dir.$new_file_name.$type;

                    $k = 1;
                    while(file_exists($new_upload_file)){
                        $new_file_name = $file_name." - Copy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir.$new_file_name.$type;
                    }

                    $upload_file = $new_upload_file;
                }
            }
            if(empty($error)){
               move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
               $data = array(
                   'slider_name' => $slider_name,
                   'slider_link' => $slider_link,
                   'slider_desc' => $slider_desc,
                   'slider_order' => $slider_order,
                   'slider_status' => $slider_status,
                   'slider_thumb' => $upload_file,
                   'create_date' => time()
               );
               add_slider($data);
               $success['add_slider'] = "Thêm slider vào database thành công!";
            }    
        }
        load_view("add_slider");
    }

    function list_sliderAction(){
        global $num_page, $page, $start, $list_full_slider, $result_search, $result_search_status;
        $list_full_slider = get_slider();
        #Search status
        if(isset($_POST['btn_search_status']) && !empty($_POST['status'])){
            $result_search_status = search_status($_POST['status']);
            foreach($result_search_status as &$item){
                $item['url_delete'] = "?mod=slider&action=delete_slider&id={$item['slider_id']}";
            }
        }
        #Paging
        $total_row = db_num_rows("SELECT * FROM `tbl_slider`");
        $num_per_page = 4;
        $num_page = ceil($total_row/$num_per_page);
        $page = (int)isset($_GET['page'])?(int)$_GET['page']:1;
        $start = ($page - 1) * $num_per_page;
        #Lấy giới hạn theo pagging
        $list_slider = get_list_slider($start, $num_per_page);
        foreach($list_slider as &$slider){
            $slider['url_delete'] = "?mod=slider&action=delete_slider&id={$slider['slider_id']}";
        }
        $data['list_slider'] = $list_slider;
        load_view("list_slider", $data);
    }

    function update_sliderAction(){
        load_view("update_slider");
    }

    function delete_sliderAction(){
        $id = (int)$_GET['id'];
        delete_slider_by_id($id);
        redirect_to("?mod=slider&action=list_slider");
    }
?>