<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\DespesasModel;
use App\Services\GastoService;
use CodeIgniter\Config\Factories;
use Dompdf\Dompdf;

class GastosController extends BaseController
{
    // Atributos
    protected $_model;
    protected $_modelCategoria;
    private $gastosService;
    public $user_id;
    public $categoria_id;
    public $descricao; 
    public $valor; // Sem formatação | Aplicar formatação
    public $data; // Sem formatação | Aplicar formatação
    public $categoria; // Int -> 

    public function __construct()
    {
        $this->_model = new DespesasModel();
        $this->_modelCategoria = new CategoriasModel();
        $this->gastosService = Factories::class(GastoService::class);
    }

    // Métodos Adicionais
    public function calcularGastos() // OK -> Retorna dados corretamente 
    {   
        // Despesas vindas do DB
        $gastos = $this->_model->findAll();
        debug($gastos);
        // return $gastos;
    }

    public function viewRelatorio(){
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data['gastos'] = $this->gastosService->findAllGastos($id);
        $data['categorias'] = $this->gastosService->findCategorias($id);

        return view('relatorio', $data);
    }

    // OK -> Adiciona corretamente no DB
    public function addDespesaView(){

        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data['gastos'] = $this->gastosService->findAllGastos($id);
        // debug($data);
        $data['categorias'] = $this->gastosService->findCategorias($id);
        // $cat = $data['categorias'];
        // foreach ($cat as $cats):
        //     debug($cats->nome);
        // endforeach;
        // Vai para a View de inserir despesas
        return view('inserirDespesa', $data);
    }

    public function addDespesa(){


        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Busca os dados do Form e coloca em um array | PASSAR ID USUÁRIO/CATEGORIA COM SESSION!
        $date = [
            'user_id' => $id,
            'categoria_id' => $this->request->getPost('categoria'),
            'valor' => $this->request->getPost('valor'),
            'data' => $this->request->getPost('data'),
            'descricao' => $this->request->getPost('descricao') 
        ];
        
        // debug($date);
        $this->gastosService->inserirDespesaInDB($date);
    }

    // OK -> Criar direcionamento com o ID da despesa
    public function deletarDespesa($id){

        // Deleta despesa passando o ID e fazendo uma verificação
        if($this->_model->delete($id, true)){
            session()->setFlashdata('sucessDeleted', 'Despesa deletada com sucesso!');
            return redirect()->to('/addDespesa');
        } else {
            session()->setFlashdata('errorDeleted', 'Erro ao deletar sua despesa!');
            return redirect()->to('/addDespesa');
        }
    }

    // OK -> Setar FlashDatas nas View
    public function updateDespesa($id){

        // Pega o ID como paramêtro para buscar a Despesa 
        // $despesa['despesa'] = $this->_model->where('id', $id)->findAll();

        // debug($despesa);
        // return view('updateDespesa', $despesa);

        if($this->request->getMethod() === 'post'){

            // $validation = \Config\Services::validation();

            // $validation->setRules($this->validationRules);
            // Pega cada valor necessário para alterar no DB
            $data = [
                'valor' => $this->request->getPost('valor'),
                'data' => $this->request->getPost('data'),
                'descricao' => $this->request->getPost('descricao')
            ];
            
            // Manda os dados para o Service fazer update no DB
            $this->gastosService->updateDespesasInDB($id, $data);

           // Chama a View e passa os dados da despesa escolhida
        } else{
            $data['despesa'] = $this->_model->where('id', $id)->findAll();
            return view('updateDespesa', $data);
        }
    }

    // Geração de Relatórios
    public function gerarPDF() {
        
        // $dados = session()->get('variavelDeSessao');
        // $id = $dados['id'];
        // // Pega as despesas para exibir na tela
        // $data['gastos'] = $this->gastosService->findAllGastos($id);
        // // debug($data);
        // $data['categorias'] = $this->gastosService->findCategorias($id);

        return view('relatorioView');
    
        // $dompdf = new \Dompdf\Dompdf(); 

        // $dompdf->loadHtml(view('relatorioView'));
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $dompdf->stream('relatorio.pdf');
    }
    

}
