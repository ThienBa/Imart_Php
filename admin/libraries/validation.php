<?php
    function is_username($username){
        $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
        if(!preg_match($partten, $username, $matchs))
            return false;
        return true;
    }

    function is_password($password){
        $partten = "/^([A-Za-z0-9!@#$%^&*()\._]){6,32}$/";
        if(!preg_match($partten, $password, $matchs)){
            return false;
        }
        return true;
    }

    function is_email($email){        
        // $partten = "/^([A-Za-z0-9\._]){6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        // if(!preg_match($))
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    function is_phone_number($phone_number){
        $partten = "/^(09|08|03|01[2|6|7|8|9])+([0-9]){8}$/";
        if(!preg_match($partten, $phone_number, $matchs))
            return false;
        return true;
    }


    function  form_error($labelf_field){
        global $error;
        if(!empty($error[$labelf_field])){
            return "<p class=error> {$error[$labelf_field]}</p>";
        }
    }

    function set_value($labelf_field){
        global $$labelf_field;
        if(!empty($$labelf_field))
             return $$labelf_field;
    }
?>