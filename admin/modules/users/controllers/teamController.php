<?php
    function construct(){
        load_model("index");
        load("lib", "email");
    }
    
    function indexAction(){
        load_view("teamIndex");
    }
?>