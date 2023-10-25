<?php $this->extend('includes/template'); ?>
<?php $this->section('content');?>
<?php $dadosUser = session()->get('variavalDeSessao');?>
<h1>Bem vindo <?php echo $dadosUser;?></h1>
<?php $this->endSection();?>