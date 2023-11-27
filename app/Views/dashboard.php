<?php $this->extend('includes/template'); ?>
<?php $this->section('content');?>
<?php $dadosUser = session()->get('variavalDeSessao');?>
<h1 class="title">Bem vindo <?php echo $dadosUser;?></h1>
<div class="despesas">
        <table id="tabela">
        <thead>
            <th class="descricao" >Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody><?php foreach ($gastos as $gasto) :?>
            <?php 
                    print_r("<tr>");
                    print_r("<td id='desc'>" . $gasto->descricao . "</td>");
                    print_r("<td class='dados'>" . pila($gasto->valor) . "</td>");
                    print_r("<td class='dados'>" . br2bd($gasto->data) . "</td>");
                    print_r("<td class='dados'>" . categoria($gasto->categoria_id) . "</td>");
                    echo "<td><button class='btnDash btn btn-primary shadow rounded' id='btnDel'><a onclick='confirmarDel()'>Deletar</a></button>";
                    echo "<td><button class='btnDash btn btn-primary shadow rounded' id='btnEdit'><a href='" . base_url('updateDespesa/') . $gasto->id . "'>Editar</a></button>";
                    echo "</tr>";
            endforeach;
                    echo "<th colspan='3' class='total'>Total</th>";
                    echo "<td colspan='3' class='total'>" . calcularGastos() . "</td>";
                    ?>
        </tbody>
    </div>
    <script>
        function confirmarDel(){
                // Exibe um diálogo de confirmação
                if (confirm("Tem certeza que deseja excluir este item?")) {
                    // Se o usuário clicar em "OK", redireciona para o controlador para excluir o item
                    <?php foreach ($gastos as $gasto) :?>
                        window.location.href = "<?php echo base_url('deletarDespesa/') . $gasto->id;?>";
                    <?php endforeach;?>
                } else {
                    // Se o usuário clicar em "Cancelar", não faz nada
                }
            }
       // Adicione uma função para verificar a largura da tela e atualizar os ícones
        function atualizarIcones() {
            var larguraTela = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            // Verifique se a largura da tela é menor que 992px
            if (larguraTela < 992) {
                // Substitua os botões por ícones
                document.querySelectorAll('#btnDel').forEach(function (btn) {
                    btn.innerHTML = '<a onclick="confirmarDel()"><i class="bi bi-trash"></i></a>';
                });
                // Se a tela for maior que 992px, reverta para o texto original nos botões
                document.querySelectorAll('#btnEdit').forEach(function (btn) {
                    btn.innerHTML = '<a href="<?php echo base_url("updateDespesa/") . $gasto->id; ?>"><i class="bi bi-pencil-square"></i></a>';
                });
            }
        }

        // Chame a função inicialmente para configurar os ícones na carga da página
        atualizarIcones();

        // Adicione um ouvinte de redimensionamento para ajustar os ícones quando a largura da tela muda
        window.addEventListener('resize', function () {
            atualizarIcones();
        });
            
    </script>
<?php $this->endSection();?>
