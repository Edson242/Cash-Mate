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
// Função para Formatar Data
if(!function_exists('br2bd')){
    function br2bd($date){
        return implode('/', array_reverse(explode('-', $date)));
    }
}
// Função para formatar Moeda
if(!function_exists('pila')){
    function pila($date){
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        return numfmt_format_currency($padrao, $date, "BRL");
    }
}