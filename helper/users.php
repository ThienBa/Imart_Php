<?php
    function is_login(){
        if(isset($_SESSION['is_login'])){
            return true;
        }
        return false;
    }

    function user_login(){
        if(isset($_SESSION['user_login'])){
            return true;
        }
        return false;
    }

    function info_user($field = 'id'){
        $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
        foreach($list_user as $user){
            if(isset($_SESSION['is_login'])){
                if($user['username'] == $_SESSION['user_login']){
                    if(array_key_exists($field, $user)){
                        return $user[$field];
                    }
                }
            }
        }
    }
?>