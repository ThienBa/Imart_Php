<?php
    function get_info_user_by_username($username){
        $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        if(!empty($item))
            return $item;
    }

    function check_login($username, $password){
        $check_login = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'  AND `is_active` = '1'");
        if($check_login > 0){
            return true;
        }
        return false;
    }

    function check_user($username){
        $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
        if($check_user > 0)
            return true;
        return false;
    }

    function update_info_user($data, $username){
       return db_update("tbl_users", $data, "`username` = '{$username}'");
    }

    function check_old_pass($password){
        $check_old_pass = db_num_rows("SELECT * FROM `tbl_users` WHERE `password` = '{$password}'");
        if($check_old_pass > 0)
            return true;
        return false;
    }

    function update_pass($data, $username){
        db_update("tbl_users", $data, "`username` = '{$username}'");        
    }

    function check_user_exist($username, $email){
        $check_user_exist = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'");
        if($check_user_exist > 0)
            return false;
        return true;
    }

    function add_user($data){
        return db_insert("tbl_users", $data);
    }

    function check_active_token($active_token){
        $check_active_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
        if($check_active_token > 0) 
            return true;
        return false;
    }

    function is_active($active_token){
        return db_update("tbl_users", array("is_active" => '1'), "`active_token` = '{$active_token}'");
    }

    function add_images($data, $username){
        return db_update("tbl_users", $data, "`username` = '{$username}'");
    }

    function check_username_email($email, $username){
        $check_username_email = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}' AND `username` = '{$username}'");
        if($check_username_email > 0) {
            return true;
        }   
        return false;
    }

    function add_change_pass_token($data, $username, $email){
        db_update("tbl_users", $data, "`email` = '{$email}' AND `username` = '{$username}'");
    }

    function check_change_pass_token($change_pass_token){
        $check_change_pass_token = db_num_rows("SELECT * FROM `tbl_users` WHERE `change_pass_token` = '{$change_pass_token}'");
        if($check_change_pass_token > 0) {
            return true;
        }   
        return false;
    }
    function update_new_pass($data, $change_pass_token){
        db_update("tbl_users", $data, "`change_pass_token` = '{$change_pass_token}'");
    }
?>