<?php $this->extend('includes/template'); ?>
<?php $this->section('content');?>
    <!-- <button class="btn btn-info shadow rounded"><a href="<?php // redirect()->to('/dashboard')?>">Voltar</a></button> -->
    <h1 class="title">Lançamentos</h1>
    <div class="container form-control input-sm text-center form">
        <h1 class="textPrin">Despesas</h1>
        <form action="/addDespesa" method="post">
            <label for="">Valor</label><br>
            <input class="input" type="number" name="valor" id="valor" placeholder="25" required><br>
            <label for="">Data</label><br>
            <input class="input" type="date" name="data" id="data" required><br>
            <label for="">Categoria</label><br>
            <?php $categorias = buscarCat();
            foreach ($categorias as $cat) :?>
                <input id="especialInput" type="radio" name="categoria" id="categoria" value="<?php echo $cat->id;?>" required><label for=""><?php echo $cat->nome; ?></label><br>
            <?php endforeach;?>
            <label for="">Descrição</label><br>
            <input class="input" type="text" name="descricao" id="descricao" placeholder="Lanche" required><br><br>
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    </div>

    <div class="container form-control input-sm text-center form" id="formCat">
        <h1 class="textPrin" style="margin-top: 30px;">Categorias</h1>
        <form action="/addCat" method="post">
            <?php 
                foreach ($categorias as $cat) :?>
                    <label><?php echo $cat->nome; ?></label><button class="btn1"><a onclick="confirmarDelCat()">Deletar</a></button> <br>
                    <?php endforeach;?>
                <label for="">Nome</label><br>
            <input class="input" type="text" name="Nome" id="Nome" placeholder="Ex. Alimentação" required><br><br>
            <input type="submit" class="btn btn-success shadow rounded" value="Enviar">
        </form>
    </div>
    <script>
        function confirmarDelCat(){
                // Exibe um diálogo de confirmação
                if (confirm("Tem certeza que deseja excluir esta categoria?")) {
                    // Se o usuário clicar em "OK", redireciona para o controlador para excluir o item
                    <?php foreach ($categorias as $cat) :?>
                        window.location.href = "<?php echo base_url('deletarCat/') . $cat->id;?>";
                    <?php endforeach;?>
                } else {
                    // Se o usuário clicar em "Cancelar", não faz nada
                }
            }
    </script>
    <?php $this->endSection();?>