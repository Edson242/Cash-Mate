<?php $this->extend('includes/template'); ?>
<?php $this->section('content');?>
<?php $dadosUser = session()->get('variavalDeSessao');?>
<h1>Bem vindo <?php echo $dadosUser;?></h1>
<div class="despesas">
        <table id="tabela">
        <tr>
            <th class="descricao">Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th colspan="2">Ações</th>
        </tr>
        <tr><?php foreach ($gastos as $gasto) :?>
            <?php 
                    // echo "<pre>";
                    // print_r($gasto);
                    print_r("<tr>");
                    print_r("<td>" . $gasto->descricao . "</td>");
                    print_r("<td>" . pila($gasto->valor) . "</td>");
                    print_r("<td>" . br2bd($gasto->data) . "</td>");
                    print_r("<td>" . categoria($gasto->categoria_id) . "</td>");
                    echo "<td><button><a onclick='confirmarDel()'>Deletar</a></button>";
                    echo "<td><button><a href='" . base_url('updateDespesa/') . $gasto->id . "'>Editar</a></button>";
                    echo "</tr>";
            endforeach;
                    echo "<th>Total</th>";
                    echo "<td>" . calcularGastos() . "</td>";
                    ?>
        </tr>
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
    </script>
<?php $this->endSection();?>