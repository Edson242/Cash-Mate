<?php 
// Helpers
// Função de Debug

use App\Models\CategoriasModel;
use App\Models\DespesasModel;
use App\Services\GastoService;

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
// Função para buscar a categoria
if(!function_exists('categoria')){
    function categoria($categoria){
        $_model = new CategoriasModel();
        $dado = $_model->where('id', $categoria)->findColumn('nome');
        return $dado[0];
    }
}
if(!function_exists('buscarCat()')){
    function buscarCat(){
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        $_model = new CategoriasModel();
        return $_model->where('usuarios_id', $id)->findAll();
    }
}
if(!function_exists('dadosRelatorio()')){
    
    function dadosRelatorio(){
        $gastosService = new GastoService;
        
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data = $gastosService->findAllGastos($id);
        // debug($data);
        $data['categorias'] = $gastosService->findCategorias($id);
        return $data;
        // return view('relatorioView', $data);
    }

}
if(!function_exists('calcularGastos()')){
    
    function calcularGastos(){

        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];

        // Despesas vindas do DB
        $_model = new DespesasModel();
        $gastos = $_model->selectSum('valor')->where('user_id', $id)->findAll();
        // debug($gastos);]
        foreach($gastos as $gasto):
            $dados = $gasto->valor;
        endforeach;

        return pila($dados);
    }
}