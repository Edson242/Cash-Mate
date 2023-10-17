<?php if(session()->getFlashdata('errorUpdateDespesa')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('errorUpdateDespesa') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('successUpdateDespesa')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('successUpdateDespesa') ?></div>
<?php endif;?>
<!DOCTYPE html>
<html lang="pt-br">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Despesa</title>
</head>
<body>
    <div class="container form-control input-sm">
    <?php foreach ($despesa as $despesas) :?>
        <form action="<?php base_url('updateDespesa/') . $despesas['id']?>" method="post">
            <label for="">Valor</label><br>
            <input class=""  type="number" name="valor" id="valor" value="<?= $despesas['valor']; ?>"><br>
            <label for="">Data</label><br>
            <input type="date" name="data" id="data" value="<?= $despesas['data']; ?>"><br>
            <label for="">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" value="<?= $despesas['descricao']; ?>"><br><br>
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>