<?php
    function construct(){
        load_model("index");
    }

    function indexAction(){
        unset($_SESSION['buy_now']);
        $id = (int)$_GET['id'];
        add_buy_now($id);
        redirect_to("thanh-toan-mua-ngay/chi-tiet-thanh-toan.html");
    }

    function checkoutAction(){
        load('lib', 'validation');
        load('lib', 'email');
        global $error, $success;
        if(isset($_POST['btn_order'])){
            $error = array();

            if(empty($_POST['fullname'])){
                $error['fullname'] = "Hãy nhập họ và tên người nhận";
            }else{
                $fullname = $_POST['fullname'];
            }

            if(empty($_POST['email'])){
                $error['email'] = "Hãy nhập email người nhận";
            }else{
                if(!is_email($_POST['email'])){
                    $error['email'] = "Email không đúng định dạng";
                }else{
                    $email = $_POST['email'];
                }
            }

            if(empty($_POST['address'])){
                $error['address'] = "Hãy nhập địa chỉ nhận hàng";
            }else{
                $address = $_POST['address'];
            }

            $notice = $_POST['notice'];

            if(empty($_POST['phone_number'])){
                $error['phone_number'] = "Hãy nhập số điện thoại người nhận";
            }else{
                if(!is_phone_number($_POST['phone_number'])){
                    $error['phone_number'] = "Số điện thoại không đúng định dạng";
                }else{
                    $phone_number = $_POST['phone_number'];
                }
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['payment-method'])){
                    $error['payment-method'] = "Hãy chọn phương thức thanh toán";
                }else{
                    $payment_method = $_POST['payment-method'];
                }
            }
           
            if(empty($error)){
                if(check_customer($fullname, $email, $phone_number)){
                    $data_update_customer = array(
                        'date_order' => time()
                    );
                    update_customer($data_update_customer, $fullname, $email, $phone_number);
                }else{
                    $data_customer = array(
                        'name' => $fullname,
                        'email' => $email,
                        'address' => $address,
                        'phone_number' => $phone_number,
                        'notice' => $notice,
                        'date_order' => time()
                    );
                    add_customer($data_customer);
                }

                $customer_id = check_customer_id($fullname, $email, $phone_number);
                $total_price = $_SESSION['buy_now']['info']['total'];
                foreach ($_SESSION['buy_now']['buy'] as $item){
                    $data_order = array(
                        'product_id' => $item['product_id'],
                        'order_qty' => $item['qty'],
                        'pay_method' => $payment_method,
                        'customer_id' => $customer_id['customer_id'],
                        'total_price' => $total_price,
                        'order_date' => time()
                    );
                    add_order($data_order);
                }
                $content = "<p>Bạn đã đặt hàng thành công!</p>
                            <p>Mặt hàng của bạn đang đường đóng gói và đưa đến trung tâm trung chuyển, quý khách hàng hãy chú ý điện thoại để khi nhân viên giao hàng có thể liên lạc ạ!</p>
                            <p>Cảm ơn quý khách đã mua hàng</p>
                            <p>Website bán điện thoại di động ISMART</p>";
                send_mail($email, $fullname, "Đặt hàng thành công!", $content);
                $success['order'] = "Bạn đã đặt hàng thành công, vui lòng kiểm tra mail và theo giỏi tình trạng đơn hàng!";
            }
        }
        load_view("checkout");
    }
?>