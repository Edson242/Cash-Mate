<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\DespesasModel;
use App\Services\GastoService;
use CodeIgniter\Config\Factories;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    public function addCat(){

            // Regras de validação
            $validation = \Config\Services::validation();
            $validation->setRules($this->_modelCategoria->validationRules);

            // Pega o ID do usuário
            $dados = session()->get('variavelDeSessao');
            $id = $dados['id'];

            // Pega cada valor necessário para alterar no DB
            $data = [
                'nome' => $this->request->getPost('Nome'),
                'usuarios_id' => $id,
            ];
            
            // Realiza a validação
            if($validation->run($data)) {
                // Manda os dados para o Service fazer update no DB
                if($this->gastosService->addCategoria($data) === true){
                    return redirect()->to('/addDespesa');
                } else {
                    return redirect()->to('/addDespesa');
                }
            } else {
                session()->setFlashdata('errorAddCat', 'Erro ao adicionar categoria, necessário ter mínimo 5 caracteres!');
                return redirect()->to('/addDespesa');
            }
    }

    public function addDespesa(){
        // Pega os dados do usuário salva na Sessão
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
        // $this->gastosService->inserirDespesaInDB($date);
        if($this->gastosService->inserirDespesaInDB($date) === true){
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function addDespesa1(){
        if($this->request->getMethod() === 'post'){

            // $validation = \Config\Services::validation();

            // $validation->setRules($this->validationRules);
            // Pega cada valor necessário para alterar no DB
            // Pega os dados do usuário salva na Sessão
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
            // $this->gastosService->inserirDespesaInDB($date);
            if($this->gastosService->inserirDespesaInDB($date) === true){
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }
        } else {
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
    }

    // OK -> Criar direcionamento com o ID da despesa
    public function deletarDespesa($id){

        // Deleta despesa passando o ID e fazendo uma verificação
        if($this->_model->delete($id, true)){
            session()->setFlashdata('sucessDeleted', 'Despesa deletada com sucesso!');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('errorDeleted', 'Erro ao deletar sua despesa!');
            return redirect()->to('/dashboard');
        }
    }

    public function deletarCat($id){
        try {
            // Tenta deletar a categoria
            if ($this->_modelCategoria->delete($id, true)) {
                session()->setFlashdata('sucessDeleted', 'Categoria deletada com sucesso!');
            } else {
                session()->setFlashdata('errorDeleted', 'Erro ao deletar sua categoria!');
            }
    
            return redirect()->to('/addDespesa');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Verifica se a exceção é relacionada a uma restrição de chave estrangeira
            $errorMessage = $e->getMessage();
            if (strpos($errorMessage, 'Cannot delete or update a parent row') !== false) {
                session()->setFlashdata('errorDeleted', 'Não é possível excluir a categoria pois você tem despesas vinculadas a essa categoria!');
            } else {
                // Caso haja outra exceção que não é relacionada a restrição de chave estrangeira
                session()->setFlashdata('errorDeleted', 'Erro ao deletar sua categoria!');
            }
    
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
            if( $this->gastosService->updateDespesasInDB($id, $data) === true){
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }

           // Chama a View e passa os dados da despesa escolhida
        } else{
            $data['despesa'] = $this->_model->where('id', $id)->findAll();
            return view('updateDespesa', $data);
        }
    }

    // Geração de Relatórios
    public function gerarPDF1() {
        
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data['gastos'] = $this->gastosService->findAllGastos($id);
        // debug($data);
        $data['categorias'] = $this->gastosService->findCategorias($id);

        return view('relatorioView', $data);
    
        // $dompdf = new \Dompdf\Dompdf(); 

        // $dompdf->loadHtml(view('relatorioView'));
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $dompdf->stream('relatorio.pdf');
    }
    
    public function gerarPDF() {
        // Carrega a biblioteca DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Carrega a view que contém os dados a serem inseridos no PDF
        $data['gastos'] = $this->carregarDados(); // Implemente a função carregarDados() conforme necessário

        // Use a função view() para carregar a view
        $html = view('relatorioView', $data); 

        // Carrega o HTML no DOMPDF
        $dompdf->loadHtml($html);

        // Configurações do PDF (opcional)
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza o PDF
        $dompdf->render();

        // Saída do PDF para o navegador
        $dompdf->stream("Relatorio_" . dataAtual() .".pdf", array("Attachment" => false));
    }

    private function carregarDados() {
        // Lógica para carregar os dados da página
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data = $this->gastosService->findAllGastos($id);
        // debug($data);
        return $data;
    }
}
