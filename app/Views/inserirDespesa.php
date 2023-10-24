<?php $this->extend('includes/template'); ?>
<?php $this->section('content');?>
    <?php foreach ($gastos as $gasto) :?>
    <!-- <button class="btn btn-info shadow rounded"><a href="<?php // redirect()->to('/dashboard')?>">Voltar</a></button> -->
    <div class="container form-control input-sm text-center">
        <form action="/addDespesas" method="post">
            <label for="">Valor</label><br>
            <input class=""  type="number" name="valor" id="valor" placeholder="25" required><br>
            <label for="">Data</label><br>
            <input type="date" name="data" id="data" required><br>
            <label for="">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" placeholder="Lanche" required><br><br>
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    </div>

    <div class="despesas">
        <?php //foreach ($gastos as $gasto) :?>
           <?php
                //echo "<pre>";  
                //print_r($gasto) ?>
        <?php // endforeach; ?>
        <table id="tabela">
        <tr>
            <th class="descricao">Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        <tr>
            <?php 
                    // print_r("<tr>");
                    // print_r("<td>" . $gasto->descricao . "</td>");
                    // print_r("<td>" . pila($gasto->valor) . "</td>");
                    // print_r("<td>" . br2bd($gasto->data) . "</td>");
                    // // print_r("<td>" . $gasto['categorias']['nome'] . "</td>");
                    // echo "<td><button><a href='" . base_url('deletarDespesa/') . $gasto->id . "'>Deletar</a></button>";
                    // echo "<td><button><a href='" . base_url('updateDespesa/') . $gasto->id . "'>Editar</a></button>";
                    // echo "</tr>";
                endforeach;?>
        </tr>
    </div>
    <?php $this->endSection();?>