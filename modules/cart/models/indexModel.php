<?php
    function add_cart($id){
        $list_product = db_fetch_array("SELECT * FROM `tbl_product`");
        $item = get_detail_product_by_id($id);
        $qty = 1; 
        if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }

        $_SESSION['cart']['buy'][$id] = array(
            'product_id' => $item['product_id'],
            'url_detail' => $item['url_detail'],
            'qty_exist' => $item['qty'],
            'product_code' => $item['product_code'],
            'product_thumb' => $item['product_thumb'],
            'product_name' => $item['product_name'],
            'product_price' => $item['product_price'],
            'slug' => $item['slug'],
            'qty' => $qty,
            'sub_total' => $qty * $item['product_price']
        );
        //Cập nhật lại thông tin cart
        update_info_cart();
    }

    function update_info_cart(){
        if(isset($_SESSION['cart'])){
            $num_order = 0;
            $total = 0;

            foreach($_SESSION['cart']['buy'] as $item){
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }

            $_SESSION['cart']['info'] = array(
                'num_order' => $num_order,
                'total' => $total
            );
        }
    }

    function get_list_buy_cart(){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart']['buy'] as &$item){
                $item['url_delete_cart'] = "xoa-san-pham/"."{$item['slug']}";
            }
            return $_SESSION['cart']['buy'];
        }
        return false;
    }

    function get_total_price(){
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart']['info']['total'];
        }
        return false;
    }

   function delete_cart($id = ""){
        if(isset($_SESSION['cart'])){
            if(!empty($id)){
                unset($_SESSION['cart']['buy'][$id]);
                update_info_cart();
            }else{
                unset($_SESSION['cart']);
            }
        }
        return false;
   }

   function update_cart($qty){
       /*
        $qty = array(
            (Id)1 => 1(Số lượng),
            (Id)2 => 5(Số lượng)
        );
       */
        if(isset($_SESSION['cart'])){
            foreach($qty as $id => $new_qty){ 
                $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty *  $_SESSION['cart']['buy'][$id]['product_price'];
            }
            update_info_cart();
        }
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