<?php
function construct()
{
    load_model("index");
}

function add_productAction()
{
    global $error, $upload_file;

    if (isset($_POST['btn_add_product'])) {
        $error = array();

        #Validation form
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Hãy nhập tên sản phẩm";
        } else {
            $_SESSION['product_name'] = $_POST['product_name'];
            $product_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Hãy nhập mã sản phẩm";
        } else {
            $_SESSION['product_code'] = $_POST['product_code'];
            $product_code = $_POST['product_code'];
        }

        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Hãy nhập đoạn mô tả ngắn cho sản phẩm";
        } else {
            $_SESSION['product_desc'] = $_POST['product_desc'];
            $product_desc = $_POST['product_desc'];
        }

        if (empty($_POST['product_price'])) {
            $error['product_price'] = "Hãy nhập giá sản phẩm";
        } else {
            $_SESSION['product_price'] = $_POST['product_price'];
            $product_price = $_POST['product_price'];
        }

        $creator = $_POST['creator'];
        $slug = $_POST['slug'];
        $_SESSION['creator'] = $_POST['creator'];
        $_SESSION['slug'] = $_POST['slug'];

        if (empty($_POST['qty'])) {
            $error['qty'] = "Hãy nhập số lượng sản phẩm nhập kho";
        } else {
            $_SESSION['qty'] = $_POST['qty'];
            $qty = $_POST['qty'];
        }

        if (empty($_POST['content'])) {
            $error['content'] = "Hãy nhập bài giới thiệu về sản phẩm";
        } else {
            $_SESSION['content'] = $_POST['content'];
            $content = $_POST['content'];
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['product_cat'])) {
                $error['product_cat'] = "Hãy chọn danh mục sản phẩm";
            } else {
                $_SESSION['product_cat'] = $_POST['product_cat'];
                $product_cat = $_POST['product_cat'];
            }

            if (empty($_POST['status'])) {
                $error['status'] = "Hãy chọn trạng thái hiện tại của sản phẩm";
            } else {
                $_SESSION['status'] = $_POST['status'];
                $product_status = $_POST['status'];
            }

            if (empty($_POST['child_id'])) {
                $error['child_id'] = "Hãy chọn danh mục con của sản phẩm";
            } else {
                $_SESSION['child_id'] = $_POST['child_id'];
                $child_id = $_POST['child_id'];
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
                'product_code' => $product_code,
                'product_price' => $product_price,
                'product_name' => $product_name,
                'product_desc' => $product_desc,
                'content' => $content,
                'creator' => $creator,
                'slug' => $slug,
                'product_thumb' => $upload_file,
                'product_status' => $product_status,
                'qty' => $qty,
                'child_id' => $child_id,
                'add_date' => time(),
                'cat_id' => $product_cat
            );
            add_product($data);
            $_SESSION['handle_product_success'] = "Thêm sản phẩm thành công!";

            unset($_SESSION['product_code']);
            unset($_SESSION['product_name']);
            unset($_SESSION['product_price']);
            unset($_SESSION['product_desc']);
            unset($_SESSION['content']);
            unset($_SESSION['creator']);
            unset($_SESSION['slug']);
            unset($_SESSION['status']);
            unset($_SESSION['qty']);
            unset($_SESSION['child_id']);
            unset($_SESSION['product_cat']);

            redirect_to("?mod=product&action=main");
        }
    }
    $data['product_cat'] = get_product_cat();
    load_view("add_product", $data);
}

function mainAction()
{
    global $num_page, $page, $start, $list_full_product, $result_search, $result_search_status;
    #Lấy tất cả sản phẩm
    $list_full_product = get_full_product();
    #Search product
    if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
        $result_search = search_product($_POST['search']);
        foreach ($result_search as &$item) {
            $item['url_delete'] = "?mod=product&action=delete&id={$item['product_id']}";
            $item['url_update'] = "?mod=product&action=update&id={$item['product_id']}";
        }
    }
    #Search status
    if (isset($_POST['btn_search_status']) && !empty($_POST['status'])) {
        $result_search_status = search_status($_POST['status']);
        foreach ($result_search_status as &$item) {
            $item['url_delete'] = "?mod=product&action=delete&id={$item['product_id']}";
            $item['url_update'] = "?mod=product&action=update&id={$item['product_id']}";
        }
    }
    #Paging
    $total_row = db_num_rows("SELECT * FROM `tbl_product`");
    $num_per_page = 4;
    $num_page = ceil($total_row / $num_per_page);
    $page = (int)isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    #Lấy giới hạn theo pagging
    $list_product = get_list_product($start, $num_per_page);
    foreach ($list_product as &$product) {
        $product['url_delete'] = "?mod=product&action=delete&id={$product['product_id']}";
        $product['url_update'] = "?mod=product&action=update&id={$product['product_id']}";
    }
    $data['list_product'] = $list_product;
    load_view("main", $data);
}

function updateAction()
{
    global $error, $upload_file;
    $id = (int)$_GET['id'];
    $get_product = get_list_product_by_id($id);


    if (isset($_POST['btn_add_product'])) {
        $error = array();

        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Hãy nhập tên sản phẩm";
        } else {
            $product_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Hãy nhập mã sản phẩm";
        } else {
            $product_code = $_POST['product_code'];
        }

        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Hãy nhập đoạn mô tả ngắn cho sản phẩm";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        if (empty($_POST['product_price'])) {
            $error['product_price'] = "Hãy nhập giá sản phẩm";
        } else {
            $product_price = $_POST['product_price'];
        }

        $old_price = $_POST['old_price'];
        $editor = $_POST['editor'];
        $slug = $_POST['slug'];

        if (empty($_POST['qty'])) {
            $error['qty'] = "Hãy nhập số lượng của sản phẩm";
        } else {
            $qty = $_POST['qty'];
        }

        if (empty($_POST['content'])) {
            $error['content'] = "Hãy nhập bài giới thiệu về sản phẩm";
        } else {
            $content = $_POST['content'];
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['product_cat'])) {
                $error['product_cat'] = "Hãy chọn danh mục sản phẩm";
            } else {
                $product_cat = $_POST['product_cat'];
            }

            if (empty($_POST['status'])) {
                $error['status'] = "Hãy chọn trạng thái hiện tại của sản phẩm";
            } else {
                $product_status = $_POST['status'];
            }

            if (empty($_POST['child_id'])) {
                $error['child_id'] = "Hãy chọn danh mục con của sản phẩm";
            } else {
                $child_id = $_POST['child_id'];
            }
        }

        if (empty($error)) {
            $data = array(
                'product_code' => $product_code,
                'product_price' => $product_price,
                'product_name' => $product_name,
                'product_desc' => $product_desc,
                'content' => $content,
                'editor' => $editor,
                'slug' => $slug,
                'qty' => $qty,
                'old_price' => $old_price,
                'child_id' => $child_id,
                'product_status' => $product_status,
                'update_date' => time(),
                'cat_id' => $product_cat
            );
            update_product($data, $id);
            $_SESSION['handle_product_success'] = "Cập nhật sản phẩm thành công!";
            redirect_to("?mod=product&action=main");
        }
    }
    $data['get_product'] = $get_product;
    load_view("update", $data);
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    delete_product_by_id($id);
    $_SESSION['handle_product_success'] = "Xóa sản phẩm thành công!";
    redirect_to("?mod=product&action=main");
}

function categoryAction()
{
    $product_cat = get_product_cat();
    foreach ($product_cat as &$item) {
        $item['url_update_cat'] = "?mod=product&action=update_cat&cat_id={$item['cat_id']}";
        $item['url_delete_cat'] = "?mod=product&action=delete_cat&cat_id={$item['cat_id']}";
    }
    $data['product_cat'] = $product_cat;
    load_view("category", $data);
}

function add_catAction()
{
    global $error;
    if (isset($_POST['btn_add_product_cat'])) {
        $error = array();

        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Hãy điền tên danh mục mới";
        } else {
            $_SESSION['cat_name'] = $_POST['cat_name'];
            $cat_name = $_POST['cat_name'];
        }

        $creator_cat = $_POST['creator_cat'];
        $_SESSION['creator_cat'] = $_POST['creator_cat'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['parent_id'])) {
                $error['parent_id'] = "Hãy chọn cập bật danh mục mới";
            } else {
                $_SESSION['parent_id'] = $_POST['parent_id'];
                $parent_id = $_POST['parent_id'];
            }

            if (empty($_POST['cat_status'])) {
                $error['cat_status'] = "Hãy chọn trạng thái hiện tại của danh mục";
            } else {
                $_SESSION['cat_status'] = $_POST['cat_status'];
                $cat_status = $_POST['cat_status'];
            }
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'creator_cat' => $creator_cat,
                'parent_id' => $parent_id,
                'cat_status' => $cat_status,
                'create_date' => time()
            );
            add_cat_product($data);
            $_SESSION['handle_product_cat_success'] = "Thêm danh danh mục mới thành công!";
            redirect_to("?mod=product&action=category");

            unset($_SESSION['cat_name']);
            unset($_SESSION['creator_cat']);
            unset($_SESSION['parent_id']);
            unset($_SESSION['cat_status']);
        }
    }
    load_view("add_cat");
}

function update_catAction()
{
    global $error;
    $cat_id = (int)$_GET['cat_id'];
    $cat = get_product_cat_by_cat_id($cat_id);

    if (isset($_POST['btn_update_product_cat'])) {
        $error = array();

        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Hãy điền tên danh mục mới";
        } else {
            $cat_name = $_POST['cat_name'];
        }

        $editor_cat = $_POST['editor_cat'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['parent_id'])) {
                $error['parent_id'] = "Hãy chọn cập bật danh mục mới";
            } else {
                $parent_id = $_POST['parent_id'];
            }

            if (empty($_POST['cat_status'])) {
                $error['cat_status'] = "Hãy chọn trạng thái hiện tại của danh mục";
            } else {
                $cat_status = $_POST['cat_status'];
            }
        }

        if (empty($editor)) {
            $data = array(
                'cat_name' => $cat_name,
                'editor_cat' => $editor_cat,
                'parent_id' => $parent_id,
                'cat_status' => $cat_status,
                'update_date_cat' => time()
            );
            update_cat_product($data, $cat_id);
            $_SESSION['handle_product_cat_success'] = "Cập nhật danh mục thành công!";
            redirect_to("?mod=product&action=category");
        }
    }

    $data['cat'] = $cat;
    load_view("update_cat", $data);
}

function delete_catAction()
{
    $cat_id = (int)$_GET['cat_id'];
    delete_product_cat_by_cat_id($cat_id);
    $_SESSION['handle_product_cat_success'] = "Xóa danh mục thành công!";
    redirect_to("?mod=product&action=category");
}
