<?php
 if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); 
endif;
    ?>
    <form action="/authenticate" method="POST">
        <label>E-mail</label>
        <input type="text" name="email" class="form-control" required>
        <label>Password</label>
        <input type="password" name="senha" class="form-control" required>
        <input type="submit" class="btn btn-primary"value="Login">
    </form>
