<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <?php $this->extend('includes/template'); ?>
    <?php $this->section('content');?>
    <h2>Relatório</h2>
    <button><a href="/gerarRelatorio">Gerar Relatório</a></button>
    <div class="despesas">
        
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
        </tr>
        <tr><?php foreach ($gastos as $gasto) :?>
            <?php 
                    // echo "<pre>";
                    // print_r($gasto);
                    print_r("<tr>");
                    print_r("<td>" . $gasto->descricao . "</td>");
                    print_r("<td>" . pila($gasto->valor) . "</td>");
                    print_r("<td>" . br2bd($gasto->data) . "</td>");
                    // print_r("<td>" . categoria($gasto->categoria) . "</td>");
                    print_r("<td>" . categoria($gasto->categoria_id) . "</td>");
                    echo "</tr>";
                endforeach;?>
        </tr>
    </div>
    <?php $this->endSection();?>
</body>
</html>