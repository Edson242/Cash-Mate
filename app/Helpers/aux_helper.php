<?php 
// Helpers
// Função de Debug
if(!function_exists('debug')){
    function debug($param){
        echo "<pre>";
        print_r($param);
        exit;
    }
}