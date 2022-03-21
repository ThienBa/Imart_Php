<?php
function construct()
{
    load_model("index");
}

function list_orderAction()
{
    global $num_page, $page, $result_search_status, $result_search, $start;
    if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
        $result_search = search_order($_POST['search']);
        foreach ($result_search as &$item) {
            $item['url_delete'] = "?mod=product&action=delete_order&id={$item['id']}";
            $item['url_update'] = "?mod=product&action=update_order&id={$item['id']}";
            $item['url_detail_order'] = "?mod=order&action=detail_order&id={$item['id']}";
        }
    }
    //======================================================
    if (isset($_POST['btn_search_status']) && !empty($_POST['status'])) {
        $result_search_status = search_action($_POST['status']);
        foreach ($result_search_status as &$item) {
            $item['url_delete'] = "?mod=pages&action=delete_order&id={$item['id']}";
            $item['url_update'] = "?mod=pages&action=update_order&id={$item['id']}";
            $item['url_detail_order'] = "?mod=order&action=detail_order&id={$item['id']}";
        }
    }
    //=======================================================      
    //Lấy tổng số lượng bản ghi
    $num_row = db_num_rows("SELECT * FROM `tbl_order`");
    $total_row = $num_row;
    //Số phần tử hiển thị trên 1 trang
    $num_per_page = 5;
    //Tính tổng số lượng trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $list_order = get_list_order($start, $num_per_page);
    foreach ($list_order as &$order) {
        $order['url_delete'] = "?mod=order&action=delete_order&id={$order['id']}";
        $order['url_update'] = "?mod=order&action=update_order&id={$order['id']}";
        $order['url_detail_order'] = "?mod=order&action=detail_order&id={$order['id']}";
    }
    // show_array($list_order);
    $data['list_order'] = $list_order;
    load_view("list_order", $data);
}

function detail_orderAction()
{
    global $success;
    $id = (int)$_GET['id'];
    $detail_order = get_detail_order_by_id($id);

    if (isset($_POST['btn_update'])) {
        if (!empty($_POST['status'])) {
            db_update("tbl_order", array('order_status' => $_POST['status']), "`id` = {$id}");
            $_SESSION['handle_order_success'] = "Cập nhập trạng thái thành công!";
            redirect_to("?mod=order&action=list_order");
        }
    }

    $data['detail_order'] = $detail_order;
    load_view("detail_order", $data);
}

function update_orderAction()
{
    global $error, $success;
    $id = (int)$_GET['id'];
    $order = get_order_by_id($id);

    if (isset($_POST['btn_update_order'])) {
        $error = array();

        $order_qty = $_POST['order_qty'];
        $total_price = $_POST['total_price'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['order_status'])) {
                $error['order_status'] = "Hãy chọn trạng thái đơn hàng hiện tại";
            } else {
                $order_status = $_POST['order_status'];
            }
        }

        if (empty($error)) {
            $data = array(
                'order_qty' => $order_qty,
                'order_status' => $order_status,
                'total_price' => $total_price,
                'update_date' => time()
            );
            update_order($data, $id);
            $_SESSION['handle_order_success'] = "Cập nhật thông tin đơn đặt hàng thành công!";
            redirect_to("?mod=order&action=list_order");
        }
    }

    $data['order'] = $order;
    load_view("update_order", $data);
}

function delete_orderAction()
{
    $id = (int)$_GET['id'];
    delete_order_by_id($id);
    $_SESSION['handle_order_success'] = "Xóa đơn đặt hàng thành công!";
    redirect_to("?mod=order&action=list_order");
}

function list_customerAction()
{
    global $num_page, $page, $result_search, $start;
    if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
        $result_search = search_customer($_POST['search']);
        foreach ($result_search as &$item) {
            $item['url_delete'] = "?mod=product&action=delete_customer&id={$item['customer_id']}";
            $item['url_update'] = "?mod=product&action=update_customer&id={$item['customer_id']}";
        }
    }
    //======================================================
    //Lấy tổng số lượng bản ghi
    $num_row = db_num_rows("SELECT * FROM `tbl_customer`");
    $total_row = $num_row;
    //Số phần tử hiển thị trên 1 trang
    $num_per_page = 5;
    //Tính tổng số lượng trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $list_customer = get_list_customer($start, $num_per_page);
    foreach ($list_customer as &$customer) {
        $customer['url_update'] = "?mod=order&action=update_customer&id={$customer['customer_id']}";
        $customer['url_delete'] = "?mod=order&action=delete_customer&id={$customer['customer_id']}";
    }
    $data['list_customer'] = $list_customer;
    load_view("list_customer", $data);
}

function update_customerAction()
{
    global $error, $success;
    $customer_id = (int)$_GET['id'];
    $customer = get_info_customer_by_id($customer_id);
    if (isset($_POST['btn_update_customer'])) {
        $error = array();

        if (empty($_POST['name'])) {
            $error['name'] = $_POST['name'];
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['address'])) {
            $error['address'] = $_POST['address'];
        } else {
            $address = $_POST['address'];
        }

        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = $_POST['phone_number'];
        } else {
            if (!is_phone_number($_POST['phone_number'])) {
                $error['phone_number'] = "Không đúng định dạng số điện thoại";
            } else {
                $phone_number = $_POST['phone_number'];
            }
        }

        if (empty($_POST['email'])) {
            $error['email'] = $_POST['email'];
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $notice = $_POST['notice'];
        }

        if (empty($error)) {
            $data = array(
                'name' => $name,
                'address' => $address,
                'phone_number' => $phone_number,
                'email' => $email,
                'notice' => $notice,
                'update_date' => time()
            );
            update_customer($data, $customer_id);
            $_SESSION['handle_customer_success'] = "Cập nhật thông tin người dùng thành công!";
            redirect_to("?mod=order&action=list_customer");
        }
    }

    $data['customer'] = $customer;
    load_view("update_customer", $data);
}

function delete_customerAction()
{
    $customer_id = (int)$_GET['id'];
    delete_customer_by_id($customer_id);
    $_SESSION['handle_customer_success'] = "Xóa người dùng thành công!";
    redirect_to("?mod=order&action=list_customer");
}
