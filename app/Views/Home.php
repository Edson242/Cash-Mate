<?php if (!session()->get('usuario')) : ?>
    <?php return redirect()->to('login') ?>
<?php endif ?>

<?= view('templates/header') ?>

<h1>Bem-vindo, <?= session()->get('usuario')->email ?></h1>

<a href="<?= site_url('login/logout') ?>">Sair</a>

<?= view('templates/footer') ?>