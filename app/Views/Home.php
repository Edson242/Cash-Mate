<?php if (!session()->get('usuario')) : ?>
    <?php return redirect()->to('login') ?>
<?php endif ?>
<?php $dados = session()->get('variavelDeSessao'); ?>

<?= view('templates/header') ?>

<h1>Bem-vindo, <?php echo $dados['email']; ?></h1>

<a href="<?= site_url('login/logout') ?>">Sair</a>

<?= view('templates/footer') ?>