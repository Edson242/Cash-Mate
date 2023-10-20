<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('errorUpdate')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('errorUpdate') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('successUpdate')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('successUpdate') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('errorDeleted')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('errorUpdate') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('sucessDeleted')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('successUpdate') ?></div>
<?php endif;?>
<!DOCTYPE html>
<html lang="pt-br">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
    <!-- HEITOR VAGABUNDO!! -->
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>   <!-- Array com as despesas -->
    <?php foreach ($gastos as $gasto) :?>
    <button class="btn btn-info shadow rounded"><a href="<?php redirect()->to('/dashboard')?>">Voltar</a></button>
    <div class="container form-control input-sm text-center">
        <form action="/addDespesas" method="post">
            <label for="">Valor</label><br>
            <input class=""  type="number" name="valor" id="valor" placeholder="25" required><br>
            <label for="">Data</label><br>
            <input type="date" name="data" id="data" required><br>
            <label for="">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" placeholder="Lanche" required><br><br>
            <input type='radio' name='opcoes' value='<?php $gasto['categoria_id']?>' required><label>" . $value . "</label><br>";
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    </div>

    <div>
        <form action="" method="POST">
            <label for="nome_categoria">Nome Categoria</label>
            <input type="text" name="categoria_name" id="categoria_name" required>
            <div>
                <ul>
                    <?php 
                    echo "<li>" . $gasto['categorias_name'] . "</li>"?>
                </ul>
            </div>
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
                    print_r("<tr>");
                    print_r("<td>" . $gasto["descricao"] . "</td>");
                    print_r("<td>" . pila($gasto["valor"]) . "</td>");
                    print_r("<td>" . br2bd($gasto['data']) . "</td>");
                    echo "<td><button><a href='" . base_url('deletarDespesa/') . $gasto["id"] . "'>Deletar</a></button>";
                    echo "<td><button><a href='" . base_url('updateDespesa/') . $gasto["id"] . "'>Editar</a></button>";
                    echo "</tr>";
                endforeach;?>
        </tr>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>