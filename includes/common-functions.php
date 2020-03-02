<?php
    function getFormValue(String $field_name){
        if(isset($_REQUEST[$field_name]) && trim($_REQUEST[$field_name]) != ""){
            return $_REQUEST[$field_name];
        }
        return null;
    }

?>