<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <?php $dados = session()->get('variavelDeSessao');?>
    <?php $this->extend('includes/template'); ?>
    <?php $this->section('content');?>
    <h2>Usuário</h2>
    <p>Usuário: <?php print_r($dados['nome'])?></p>
    <p>Email: <?php print_r($dados['email'])?></p>
    <h4>Alterar Dados</h4>
    <form action="/alterarDados" method="post">
        <label for="">Email:</label>
        <input type="email" name="email" id="email" value="<?php print_r($dados['email'])?>">
        <label for="">Senha:</label>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Alterar">
    </form>
    <?php $this->endSection();?>
</body>
</html>