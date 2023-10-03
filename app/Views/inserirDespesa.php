<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif;?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif;?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
</head>
<body>
    <form action="/addDespesas" method="post">
        <label for="">Valor</label>
        <input type="number" name="valor" id="valor">
        <label for="">Data</label>
        <input type="date" name="data" id="data">
        <label for="">Descrição</label>
        <input type="text" name="descricao" id="descricao">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>