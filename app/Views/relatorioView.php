<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <style>
        .despesas {
            display: flex;
            justify-content: center;
            margin: auto;
        }
        #tabela {
            width: 100%;
            text-align: center;
        }
        thead {
            background-color: black;
            font-weight: bold;
            color: #fff;
        }
        td {
            padding: 5px 0px;
        }
        tbody tr:nth-child(2n){
            background: #ccc;
        }
        tbody tr, td:nth-child(1){
            width: 20%;
        }
        tbody tr, td:nth-child(2){
            width: 10%;
        }
        tbody tr, td:nth-child(3){
            width: 10%;
        }
        tbody tr, td:nth-child(4){
            width: 10%;
        }
        tbody tr, td:nth-child(5){
            width: 5%;
        }
        tbody tr, td:nth-child(6){
            width: 5%;
        }
        .total {
            background-color: #737373;
        }

        h1 {
            text-align: center;
            padding-bottom: 0px;
        }
        p {
            text-align: center;
            padding-top: 0px;
        }
    </style>
</head>
<body>
    <h1 class="title">Relatório</h1><p id="data"><?php echo dataAtual();?></p>
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
                    print_r("<td>" . $gasto->descricao . "</td>");
                    print_r("<td>" . pila($gasto->valor) . "</td>");
                    print_r("<td>" . br2bd($gasto->data) . "</td>");
                    // print_r("<td>" . categoria($gasto->categoria) . "</td>");
                    print_r("<td>" . categoria($gasto->categoria_id) . "</td>");
                    echo "</tr>";
                endforeach;
                    echo "<th colspan='2' class='total'>Total</th>";
                    echo "<td colspan='2' class='total'>" . calcularGastos() . "</td>";
                ?>
        </tbody>
        <tfoot>
            <td colspan='4' style="font-weight: bolder; padding-top: 20px;">Cash Mate Sistemas &reg;</td>
        </tfoot>
    </div>
</body>
</html>