<?php
     function add_buy_now($id){
        $list_product = db_fetch_array("SELECT * FROM `tbl_product`");
        $item = get_detail_product_by_id($id);
        $qty = 1; 
        if(isset($_SESSION['buy_now']) && array_key_exists($id, $_SESSION['buy_now']['buy'])){
            $qty = $_SESSION['buy_now']['buy'][$id]['qty'] + 1;
        }

        $_SESSION['buy_now']['buy'][$id] = array(
            'product_id' => $item['product_id'],
            'url_detail' => $item['url_detail'],
            'qty_exist' => $item['qty'],
            'product_code' => $item['product_code'],
            'product_thumb' => $item['product_thumb'],
            'product_name' => $item['product_name'],
            'product_price' => $item['product_price'],
            'qty' => $qty,
            'sub_total' => $qty * $item['product_price']
        );
        //Cập nhật lại thông tin buy_now
        update_info_buy_now();
    }

    function update_info_buy_now(){
        if(isset($_SESSION['buy_now'])){
            $num_order = 0;
            $total = 0;

            foreach($_SESSION['buy_now']['buy'] as $item){
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }

            $_SESSION['buy_now']['info'] = array(
                'num_order' => $num_order,
                'total' => $total
            );
        }
    }

    function get_list_buy_now(){
        if(isset($_SESSION['buy_now'])){
            return $_SESSION['buy_now']['buy'];
        }
        return false;
    }

    function get_total_price(){
        if(isset($_SESSION['buy_now'])){
            return $_SESSION['buy_now']['info']['total'];
        }
        return false;
    }

      function add_order($data_order){
        return db_insert("tbl_order", $data_order);
    }

    function add_customer($data_customer) {
        return db_insert("tbl_customer", $data_customer);
    }

    function check_customer($fullname, $email, $phone_number){
        $check_customer = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `name` = '{$fullname}' AND `email` = '{$email}' AND `phone_number` = '{$phone_number}'");
        if($check_customer > 0){
            return true;
        }
        return false;
    }

    function update_customer($data, $fullname, $email, $phone_number){
        return db_update("`tbl_customer`", $data, "`name` = '{$fullname}' AND `email` = '{$email}' AND `phone_number` = '{$phone_number}'");
    }
    
    function check_customer_id($fullname, $email, $phone_number){
        return db_fetch_row("SELECT `customer_id` FROM `tbl_customer` WHERE `name` = '{$fullname}' AND `email` = '{$email}' AND `phone_number` = '{$phone_number}'");
    }
?>