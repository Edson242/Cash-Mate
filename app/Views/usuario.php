<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <?php $dados = session()->get('variavelDeSessao');?>
    <?php $this->extend('includes/template'); ?>
    <?php $this->section('content');?>
    <h1 class="title">Área do Usuário</h1>
    <p class="text" id="ipc">Usuário: <?php print_r($dados['nome'])?></p>
    <p class="text">Email: <?php print_r($dados['email'])?></p>
    <p class="textPrin">Alterar Dados</p>
    <form action="/alterarDados" method="post" id="form">
        <label for="">Email:</label>
        <input type="email" name="email" id="email" value="<?php print_r($dados['email'])?>">
        <label for="">Senha:</label>
        <input type="password" name="senha1" id="senha1">
        <label for="">Confirmar Senha:</label>
        <input type="password" name="senha2" id="senha2">
        <input type="submit" value="Alterar" id="btnSub">
    </form>
    <?php $this->endSection();?>
</body>
</html>