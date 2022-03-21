<?php
    function construct(){
        load_model("index");
        load("lib", "email");
    }

    function updateAction(){
        /*Cập nhật tài khoảng
        * B1: Tạo giao diện
        * B2: Load lại thông tin cũ
        * B3: Validation form
        * B4: Cập nhật thông tin
        */
        global $error, $success;

        if(isset($_POST['btn-update-info'])){
            $error = array();
            $success = array();

            if(empty($_POST['fullname'])){
                $error['fullname'] = "Không được để trống fullname";
            }else{
                $fullname = $_POST['fullname'];
            }

            if(empty($_POST['email'])){
                $error['email'] = "Không được để trống email";
            }else{
                if(!is_email($_POST['email'])){
                    $error['email'] = "Email Không đúng định dạng";
                }else{
                    $email = $_POST['email'];
                }
            }

            if(empty($_POST['phone_number'])){
                $error['phone_number'] = "Không được để trống phone_number";
            }else{
                if(!is_username($_POST['phone_number'])){
                    $error['phone_number'] = "Phone_number không đúng định dạng";
                }else{
                    $phone_number = $_POST['phone_number'];
                }
            }

            if(empty($_POST['address'])){
                $error['address'] = "Không được để trống address";
            }else{
                $address = $_POST['address'];
            }

            if(empty($error)){
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'phone_number' => $phone_number,
                    'address' => $address
                );
                update_info_user($data, user_login());
                $success['update_info_user'] = "Cập nhật thông tin mới thành công!";
            }
        }

        $info_user = get_info_user_by_username(user_login());
        // show_array($info_user);
        $data['info_user'] = $info_user;
        load_view("update", $data);
    }

    function change_passAction(){
        global $error, $username, $success;
        if(isset($_POST['btn-change-pass'])){
            $error = array();
            $success = array();

            if(empty($_POST['password_old'])){
                $error['password_old'] = "Không để trống password old";
            }else{
                if(!check_old_pass(md5($_POST['password_old']))){
                    $error['password_old'] = "Mật khẩu cũ không khớp";
                }else{
                    $password_old = md5($_POST['password_old']);
                }
            }

           
            if(empty($_POST['password_new'])){
                $error['password_new'] = "Không để trống password new";
            }else{
                if(!(strlen($_POST['password_new']) >=6 && strlen($_POST['password_new']) <= 32)){
                    $error['password_new'] = "Password new phải có từ 6->32 kí tự";
                }else{
                    if(!is_password($_POST['password_new'])){
                        $error['password_new'] = "Password new không đúng định dạng";
                    }else{
                        $password_new = md5($_POST['password_new']);
                    }
                }
            }

            if($_POST['confirm_pass'] != $_POST['password_new']){
                $error['two_password'] = "Mật khẩu xác nhận lại không trùng khớp";
            }   

            if(empty($error)){
                if($password_old == $password_new){
                    $error['password'] = "Mật khẩ không được trùng với mật khẩu cũ!";
                }else{
                    $data = array(
                        'password' => $password_new
                    );
                    update_pass($data, user_login());
                    $success['update_password'] = "Cập nhật password mới thành công!";
                }
            }
        }
        load_view("change_pass");
    }

    
    function loginAction(){
        // echo date("d/m/Y");
        global $error, $username, $password;
        if(isset($_POST['btn_login'])){
            $error = array();

            if(empty($_POST['username'])){
                $error['username'] = "Không để trống username";
            }else{
                if(!(strlen($_POST['username']) >=6 && strlen($_POST['username']) <= 32)){
                    $error['username'] = "Username phải có từ 6->32 kí tự";
                }else{
                    if(!is_username($_POST['username'])){
                        $error['username'] = "Username không đúng định dạng";
                    }else{
                        $username = $_POST['username'];
                    }
                }
            }

            if(empty($_POST['password'])){
                $error['password'] = "Không để trống password";
            }else{
                if(!(strlen($_POST['password']) >=6 && strlen($_POST['password']) <= 32)){
                    $error['password'] = "Password phải có từ 6->32 kí tự";
                }else{
                    if(!is_password($_POST['password'])){
                        $error['password'] = "Password không đúng định dạng";
                    }else{
                        $password = md5($_POST['password']);
                    }
                }
            }

            if(empty($error)){
                if(check_login($username, $password)){
                    $_SESSION['is_login'] = true;
                    $_SESSION['user_login'] = $username;
                    redirect_to("?mod=pages");
                }else{
                    $error['account'] = "Tài khoảng, mật khẩu không tồn tại hoặc tài khoảng chưa được kích hoạt!";
                }
            }
        }
        load_view("login");
    }

    function logoutAction(){
        unset($_SESSION['is_login']);
        unset($_SESSION['user_login']);
        redirect_to("?mod=users&action=login");
    }

    function add_userAction(){
        global $error, $password, $password_retype, $username, $email, $success;
        if(isset($_POST['btn-add-user'])){
            $error = array();
            $success = array();

            if(empty($_POST['fullname'])){
                $error['fullname'] = "Không được để trống fullname";
            }else{
                $fullname = $_POST['fullname'];
            }

            if(empty($_POST['email'])){
                $error['email'] = "Không được để trống email";
            }else{
                if(!is_email($_POST['email'])){
                    $error['email'] = "Email Không đúng định dạng";
                }else{
                    $email = $_POST['email'];
                }
            }

            if(empty($_POST['username'])){
                $error['username'] = "Không để trống username";
            }else{
                if(!(strlen($_POST['username']) >=6 && strlen($_POST['username']) <= 32)){
                    $error['username'] = "Username phải có từ 6->32 kí tự";
                }else{
                    if(!is_username($_POST['username'])){
                        $error['username'] = "Username không đúng định dạng";
                    }else{
                        $username = $_POST['username'];
                    }
                }
            }

            if(empty($_POST['password'])){
                $error['password'] = "Không để trống password";
            }else{
                if(!(strlen($_POST['password']) >=6 && strlen($_POST['password']) <= 32)){
                    $error['password'] = "Password phải có từ 6->32 kí tự";
                }else{
                    if(!is_password($_POST['password'])){
                        $error['password'] = "Password không đúng định dạng";
                    }else{
                        $password = md5($_POST['password']);
                    }
                }
            }

            if(empty($_POST['password_retype'])){
                $error['password_retype'] = "Không được để trống password";
            }else{
                if(!(strlen($_POST['password_retype']) >=6 && strlen($_POST['password_retype']) <= 32)){
                    $error['password_retype'] = "Retype password phải có từ 6->32 kí tự";
                }else{
                    if(!is_password($_POST['password_retype'])){
                        $error['password_retype'] = "Retype password không đúng định dạng";
                    }else{
                        $password_retype = md5($_POST['password_retype']);
                    }
                }
            }

            if($_POST['password'] != $_POST['password_retype']){
                $error['password_retype'] = "Mật khẩu không trùng khớp";
            }

            if(empty($error)){
                if(check_user_exist($username, $email)){
                    $active_token = md5($username.time());
                    $data = array(
                        'email' => $email,
                        'username' => $username,
                        'password' => $password,
                        'fullname' => $fullname,
                        'active_token' => $active_token,
                        'create_date' => time()
                    );
                    add_user($data);
                    $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                    $content = "<p>Chào bạn <?php echo {$fullname}; ?></p>
                                <p>Bạn vui lòng click vào đường link để kích hoạt tài khoảng:  $link_active</p>
                                <p>Nếu không phải bạn đăng kí tài khoảng thì hãy bỏ qua email này!</p>
                                <p>Team Support Unitop.Vn</p>";
                    send_mail("{$email}", "{$fullname}", "Kích hoạt tài khoản ADMIN hệ thống ISMART", $content);
                    // redirect_to("?mod=users&controller=index&action=login");
                    $success['add_user'] = "Tạo tài khoảng thành công! Check mail để kích hoạt tài khoảng!";
                }else{
                    $error['account'] = "Username hoặc Email đã tồn tại";
                } 
            }
        }
        load_view("add_user");
    }

    function activeAction(){
        $active_token = $_GET['active_token'];
        if(check_active_token($active_token)){
            if(is_active($active_token))
                // echo "Kích hoạt tài khoảng thành công!";
                redirect_to("?mod=users&action=active_success");
        }else{
            echo "Yêu cầu kích hoạt tài khoảng không hợp lệ";
        }
    }

    function active_successAction(){
        load_view("active_success");
    }

    function avatarAction(){
        global $error, $upload_file, $success;
        if(isset($_POST['btn_upload'])){
            $error = array();
    
            //Thư mục chưa file upload
             $upload_dir = "public/uploads/";
             //Đường dẫn của file sau khi upload
             $upload_file = $upload_dir.$_FILES['file']['name'];
    
            #Xử lí upload đúng file ảnh
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($type), $type_allow)){//Kiếm tra chuỗi có trong mảng và chuyển thành chữ thường để so sánh
                $error['file_type'] = "Chỉ được upload file có định dạng jpg, png, gif, jpeg"; 
            }else{
                #Upload file có kích thước cho phép (<20MB ~ 29.000.000)
                $file_size = $_FILES['file']['size'];
                if($file_size > 29000000){
                    $error['file_size'] = "Chỉ được upload file có kích thước thấp hơn 20MB"; 
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
                       
                    // $error['file_exists'] = "File đã tồn tại trên hệ thống"; 
                }
            }
    
    
            if(empty($error)){
                $data = array(
                    'images' => $upload_file
                );
                add_images($data, user_login());
                $success['change_avatar'] = "Cập nhật avatar mới thành công!";
            }
            // show_array($_FILES);
        }
        
        load_view("avatar");
    }

    function lost_passAction(){
        global $error, $success;
        if(isset($_POST['btn_lost_pass'])){
            $error = array();

            if(empty($_POST['username'])){
                $error['username'] = "Không để trống username";
            }else{
                $username = $_POST['username'];
            }

            if(empty($_POST['email'])){
                $error['email'] = "Không được để trống email";
            }else{
                $email = $_POST['email'];
            }

            if(empty($error)){
                if(check_username_email($email, $username)){
                    $change_pass_token = md5($username.$email.time());
                    $data = array(
                        'change_pass_token' => $change_pass_token
                    );
                    add_change_pass_token($data, $username, $email);
                    $link_change_pass = base_url("?mod=users&action=new_pass&change_pass_token={$change_pass_token}");
                    $content = "<p>Đây là email yêu cầu lấy lại mật khẩu</p>
                                <p>Nhấn vào link sau thay đồi mật khẩu mới: {$link_change_pass}</p>";
                    send_mail($email, $username, "Email lấy lại mật khẩu", $content);
                    $success['request_change_pass'] = "Gửi yêu cầu cấp lại mật khẩu mới thành công!";
                }else{
                    $error['account'] = "Tên đăng nhập hoặc email không tồn tại!";
                }
            }
        }
        load_view("lost_pass");
    }

    function new_passAction(){
        global $error, $success;
        $change_pass_token = $_GET['change_pass_token'];
        if(check_change_pass_token($change_pass_token)){
            if(isset($_POST['btn_newpass'])){
                $error = array();
                if(empty($_POST['password'])){
                    $error['password'] = "Không để trống password";
                }else{
                    if(!(strlen($_POST['password']) >=6 && strlen($_POST['password']) <= 32)){
                        $error['password'] = "Password phải có từ 6->32 kí tự";
                    }else{
                        if(!is_password($_POST['password'])){
                            $error['password'] = "Password không đúng định dạng";
                        }else{
                            $password = md5($_POST['password']);
                        }
                    }
                }
    
                if(empty($_POST['password_retype'])){
                    $error['password_retype'] = "Không được để trống password";
                }else{
                    if(!(strlen($_POST['password_retype']) >=6 && strlen($_POST['password_retype']) <= 32)){
                        $error['password_retype'] = "Retype password phải có từ 6->32 kí tự";
                    }else{
                        if(!is_password($_POST['password_retype'])){
                            $error['password_retype'] = "Retype password không đúng định dạng";
                        }else{
                            $password_retype = md5($_POST['password_retype']);
                        }
                    }
                }
    
                if($_POST['password'] != $_POST['password_retype']){
                    $error['password_retype'] = "Mật khẩu không trùng khớp";
                }
    
                if(empty($error)){
                    $data = array(
                        'password' => $password
                    );
                    update_new_pass($data, $change_pass_token);
                    $success['change_pass_success'] = "Cập nhật mật khẩu mới thành công! Nhấn vào link bên dưới để đăng nhập!";
                }
            }
            load_view("new_pass");
        }else{
            redirect_to("?mod=users&action=error_lost_pass");
        }
    }
?>
