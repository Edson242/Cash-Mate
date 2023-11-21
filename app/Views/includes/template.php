<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <?php if(session()->getFlashdata('successUpdateUser')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('successUpdateUser') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('sucessDeleted')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('sucessDeleted') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorDeleted')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('errorDeleted') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorUpdateUser')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('errorUpdateUser') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorSenhaUser')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('errorSenhaUser') ?></div>
        <?php endif;?>
    <style>
        /* Config geral */
        /* :root {
            --cor01: #034AA6;
            --cor02: #035AA6;
            --cor03: #0455BF;
            --cor04: #B3CFFB;
            --cor05: #F2F2F2;
            --fonte01: 'Oswald', sans-serif;
        } */

        a {
            text-decoration: none;
            color: black;
        }

        @media screen and (min-width: 768px) {
            #burguer {
                display: none;
            }
        }
        @media screen and (max-width: 480px){
            /* Menu */ 
            #menu {
                display: none;
                font-size: 22px;
            }
            i#burguer {
                background-color: rgb(48, 48, 48);
                color: white;
                display: block;
                text-align: center;
                cursor: pointer;
                font-size: 27px;
            }
            #menu:hover {
                color: black;
            }
            /* Geral */

            .title {
                font-size: 28px;
                margin-top: 10px;
                text-align: center;
                font-weight: bold;
            }

            /* Usuário */
            .text {
                font-size: 22px;
            }
            .textPrin {
                font-size: 22px;
                font-weight: bold;
                text-align: center;
            }

            #form {
                display: flex;
                flex-direction: column;
                width: 300px;
                height: 200px;
                margin-left: auto;
                margin-right: auto;
            }
            #form > input {
                font-size: 20px;
                border: 1px solid rgb(48, 48, 48);
                border-radius: 8px;
            }
            #form > label {
                font-size: 20px;
                margin-top: 15px;
            }

            #btnSub {
                background-color: rgb(48, 48, 48);
                color: black;
                margin-top: 20px;
                width: 150px;
                height: 150px;
                border-radius: 8px;
                border: none;
                box-shadow: 1px 1px 3px black;
            }
            #btnSub:hover {
                background-color: black;
                color: rgb(48, 48, 48);
            }

            /* Lançamentos */

            form > .input {
                border: 1px solid black;
                border-radius: 8px;
                width: 280px;
                height: 40px;
                font-size: 22px;
            }
            form > label {
                font-size: 22px;
                margin-top: 10px;
                font-weight: 600;
            }
            #especialInput {
                width: 20px;
                height: 20px;
            }
            .btn1{
                border: 1px solid black;
                border-radius: 6px;
                background-color: rgb(48, 48, 48);
                color: black; 
                padding: 3px 5px;
                margin-left: 5px;
            }
            .btn1:hover{
                border: 1px solid black;
                border-radius: 6px;
                background-color: red;
                color: black;
            }
        }
    </style>
</head>
<body>
<header>
        <i id="burguer" class="material-icons" onclick="clickMenu()">menu</i>
        <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/dashboard">visão geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/addDespesa">lançamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/relatorio">relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">config</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuario">Usuário</a>
                    </li>
                </ul>
        </nav>
    </header>

    <main>
        <?php 
        $this->renderSection('content');  
        ?>
    </main>

    <footer>
    </footer>
<script>
    function clickMenu() {
        if(menu.style.display == 'block') {
            menu.style.display = 'none'
        } else {
            menu.style.display = 'block'
        }
    }
</script>
</body>
</html>