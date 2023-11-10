<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <h2>Relatório</h2>
    <div class="despesas">
        <table id="tabela">
        <tr>
            <th class="descricao">Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Categoria</th>
        </tr>
        <tr><?php $data = dadosRelatorio();
        foreach ($data as $gasto) :?>
            <?php 
                    // print_r("<tr>");
                    // print_r("<td>" . $gasto->descricao . "</td>");
                    // print_r("<td>" . pila($gasto->valor) . "</td>");
                    // print_r("<td>" . br2bd($gasto->data) . "</td>");
                    // print_r("<td>" . categoria($gasto->categoria_id) . "</td>");
                    // echo "</tr>";
                endforeach;?>
        </tr>
    </div>
</body>
</html>