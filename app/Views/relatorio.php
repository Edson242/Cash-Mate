<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório</title>
        <style>
            .despesas {
                width: 94%;
            }
            thead {
                display: none;
            }
            td {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            tbody {
                width: 170% !important;
            }
            .btnDash {
                width: 150px;
                cursor: pointer;
                color: white;
            }
            .total {
                background-color: #ccc;
            }
            tbody #desc{
                background: var(--cor02);
                width: 170%;
            }
            tbody .dados {
                /* background: var(--cor02); */
                /* width: 110%; */
                /* text-align: center; */
                margin-left: auto;
                margin-right: auto;
            }
            tbody tr:nth-child(2n){
                background: #fff;
            }
            
        </style>
    </head>
    <body>
        <?php $this->extend('includes/template'); ?>
        <?php $this->section('content');?>
        <div id="botaoBaixar"><button class="btn btn-primary shadow rounded"><a href="/gerarRelatorio">Baixar Relatório</a></button></div>
        <h1 class="title">Relatório</h1>
    <div class="despesas">
        
        <?php
                //echo "<pre>";  
                //print_r($gasto) ?>
        <?php // endforeach; ?>
        <table id="tabela">
            <thead>
                <th class="descricao">Descrição</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Categoria</th>
            </thead>
            <tbody><?php foreach ($gastos as $gasto) :?>
                <?php 
                    // echo "<pre>";
                    // print_r($gasto);
                    print_r("<tr>");
                    print_r("<td id='desc'>" . $gasto->descricao . "</td>");
                    print_r("<td class='dados'>" . pila($gasto->valor) . "</td>");
                    print_r("<td class='dados'>" . br2bd($gasto->data) . "</td>");
                    // print_r("<td>" . categoria($gasto->categoria) . "</td>");
                    print_r("<td class='dados'>" . categoria($gasto->categoria_id) . "</td>");
                    echo "</tr>";
                endforeach;
                echo "<th colspan='2' class='total'>Total</th>";
                echo "<td colspan='2' class='total'>" . calcularGastos() . "</td>";
                ?>
        </tbody>
    </div>
    <?php $this->endSection();?>
</body>
</html>