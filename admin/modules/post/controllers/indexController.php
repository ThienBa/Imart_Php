<?php
function construct()
{
    load_model("index");
}

function add_postAction()
{
    global $error;
    if (isset($_POST['btn_add_post'])) {
        $error = array();
        //Kiểm tra form nhập liệu
        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Không được để trống tiêu đề bài viết";
        } else {
            $_SESSION['post_title'] = $_POST['post_title'];
            $post_title = $_POST['post_title'];
        }

        if (empty($_POST['slug'])) {
            $error['slug'] = "Không được để trống slug";
        } else {
            $_SESSION['slug'] = $_POST['slug'];
            $slug = $_POST['slug'];
        }

        if (empty($_POST['category'])) {
            $error['category'] = "Không được để trống danh mục bài viết";
        } else {
            $_SESSION['category'] = $_POST['category'];
            $category = $_POST['category'];
        }

        $creator = $_POST['creator'];
        $_SESSION['creator'] = $_POST['creator'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['content'])) {
                $error['content'] = "Không được để trống nội dung bài viết";
            } else {
                $_SESSION['content'] = $_POST['content'];
                $content = $_POST['content'];
            }
        }

        #Xử lí load file
        $upload_dir = "public/uploads/";
        $upload_file =  $upload_dir . $_FILES['file']['name'];
        $type_allow = array('png', 'jpg', 'jpeg', 'gif');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($type), $type_allow)) {
            $error['file'] = "Định dạng file ảnh cho phép là png, jpeg, jpg, gif";
        } else {
            if ($_FILES['file']['size'] > 2048000) {
                $error['file'] = "File vượt quá kích thước cho phép";
            }

            if (file_exists($upload_file)) {
                $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                $new_file_name = $file_name . "-Copy.";

                $new_upload_file = $upload_dir . $new_file_name . $type;

                $k = 1;
                while (file_exists($new_upload_file)) {
                    $new_file_name = $file_name . "-Copy({$k}).";
                    $k++;
                    $new_upload_file = $upload_dir . $new_file_name . $type;
                }

                $upload_file = $new_upload_file;
            }
        }

        if (empty($error)) {
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'post_title' => $post_title,
                'content' => $content,
                'creator' => $creator,
                'slug' => $slug,
                'post_thumb' => $upload_file,
                'create_date_post' => time(),
                'cat_id' => $category
            );
            add_post($data);
            $_SESSION['handle_post_success'] = "Thêm bài viết mới thành công!";

            unset($_SESSION['creator']);
            unset($_SESSION['category']);
            unset($_SESSION['post_title']);
            unset($_SESSION['slug']);
            unset($_SESSION['content']);

            redirect_to("?mod=post&action=detail");
        }
    }
    $data['list_cat'] = get_list_cat();
    load_view("add_post", $data);
}

function detailAction()
{
    global $num_page, $page, $start, $total_row, $result_search;
    if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
        $result_search = search_post($_POST['search']);
        foreach ($result_search as &$item) {
            $item['url_delete'] = "?mod=product&action=delete&id={$item['post_id']}";
            $item['url_update'] = "?mod=product&action=update&id={$item['post_id']}";
        }
    }
    //=======================================================      
    #Pagging
    $total_row = db_num_rows("SELECT * FROM `tbl_post`");
    $num_per_page = 5;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $list_post = get_post($start, $num_per_page);
    foreach ($list_post as &$post) {
        $post['url_update'] = "?mod=post&action=update_post&id={$post['post_id']}";
        $post['url_delete'] = "?mod=post&action=delete_post&id={$post['post_id']}";
    }
    $data['list_post'] = $list_post;
    load_view("detail", $data);
}

function update_postAction()
{
    global $error;
    $id = (int)$_GET['id'];
    $post = get_post_by_id($id);

    if (isset($_POST['btn_update'])) {
        $error = array();

        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Không được để trống tiêu đề";
        } else {
            $post_title = $_POST['post_title'];
        }

        $creator = $_POST['creator'];
        $category = $_POST['category'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['content'])) {
                $error['content'] = "Không được để trống nội dung bài viết";
            } else {
                $content = $_POST['content'];
            }
        }

        if (empty($_POST['slug'])) {
            $error['slug'] = "Không được để trống slug";
        } else {
            $slug = $_POST['slug'];
        }

        if (empty($error)) {
            $data = array(
                'post_title' => $post_title,
                'creator' => $creator,
                'slug' => $slug,
                'cat_id' => $category,
                'date_edit' => time(),
                'content' => $content
            );
            update_post($data, $id);

            $_SESSION['handle_post_success'] = "Cập nhật dữ liệu mới thành công!";
            redirect_to("?mod=post&action=detail");
        }
    }
    $data['list_cat'] = get_list_cat();
    $data['post'] = $post;
    load_view("update_post", $data);
}

function delete_postAction()
{
    $id = (int)$_GET['id'];
    delete_post($id);
    $_SESSION['handle_post_success'] = "Xóa bài viết thành công!";
    redirect_to("?mod=post&action=detail");
}

function categoryAction()
{
    $list_cat = get_list_cat();
    foreach ($list_cat as &$item) {
        $item['url_delete'] = "?mod=post&action=delete_cat&id={$item['cat_id']}";
        $item['url_update'] = "?mod=post&action=update_cat&id={$item['cat_id']}";
    }
    $data['list_cat'] = $list_cat;
    load_view("category", $data);
}

function add_post_catAction()
{
    global $error;
    if (isset($_POST['btn_add_post_cat'])) {
        $error = array();

        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không được để trống tiêu đề danh mục";
        } else {
            $_SESSION['cat_name'] = $_POST['cat_name'];
            $cat_name = $_POST['cat_name'];
        }

        $creator_cat = $_POST['creator_cat'];
        $_SESSION['creator_cat'] = $_POST['creator_cat'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['parent_id'] == 0 || $_POST['parent_id'] == 1) {
                $_SESSION['parent_id'] = $_POST['parent_id'];
                $parent_id = $_POST['parent_id'];
            } else {
                $error['parent_id'] = "Hãy chọn cấp bậc danh mục";
            }
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'creator_cat' => $creator_cat,
                'create_date_cat' => time(),
                'parent_id' => $parent_id
            );
            add_post_cat($data);
            $_SESSION['handle_post_cat_success'] = "Thêm mới danh mục thành công!";
            redirect_to("?mod=post&action=category");

            unset($_SESSION['cat_name']);
            unset($_SESSION['creator_cat']);
            unset($_SESSION['parent_id']);
        }
    }
    load_view("add_post_cat");
}

function update_catAction()
{
    global $error;
    $id = (int)$_GET['id'];
    $list_cat = get_cat_by_id($id);
    if (isset($_POST['btn_update_post_cat'])) {
        $error = array();

        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không được để trống tên danh mục";
        } else {
            $cat_name = $_POST['cat_name'];
        }

        $creator_cat = $_POST['creator_cat'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['parent_id'])) {
                $error['parent_id'] = "Hãy chọn cấp bậc";
            } else {
                if ($_POST['parent_id'] == 1) {
                    $parent_id = 0;
                } else {
                    $parent_id = 1;
                }
            }
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'creator_cat' => $creator_cat,
                'update_date_cat' => time(),
                'parent_id' => $parent_id
            );
            update_post_cat($data, $id);
            $_SESSION['handle_post_cat_success'] = "Cập nhật danh mục thành công!";
            redirect_to("?mod=post&action=category");
        }
    }
    $data['list_cat'] = $list_cat;
    load_view("update_cat", $data);
}

function delete_catAction()
{
    $id = (int)$_GET['id'];
    delete_cat_by_id($id);
    $_SESSION['handle_post_cat_success'] = "Xóa danh mục thành công!";
    redirect_to("?mod=post&action=category");
}
