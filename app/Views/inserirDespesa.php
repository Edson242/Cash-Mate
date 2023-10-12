<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
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
<body>
    <button class="btn btn-info shadow rounded"><a href="<?php redirect()->to('/dashboard')?>">Voltar</a></button>
    <div class="container form-control input-sm text-center">
        <form action="/addDespesas" method="post">
            <label for="">Valor</label><br>
            <input class=""  type="number" name="valor" id="valor" placeholder="25"><br>
            <label for="">Data</label><br>
            <input type="date" name="data" id="data"><br>
            <label for="">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" placeholder="Lanche"><br><br>
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>