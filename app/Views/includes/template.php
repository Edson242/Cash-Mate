<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <style>
        /* Config geral */
        :root {
            --cor01: #efefef;
            --cor02: #737373;
            --cor03: #b4ccb9;
            --cor04: #ff6f61;
            --fonte01: 'Oswald', sans-serif;
        }

        a {
            text-decoration: none;
            color: black;
        }
        #burguer {
            display: none;
        }

        .title {
            font-size: 35px;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }

        /* Usuário */
        .text {
            font-size: 25px;
            margin-left: 40px;
            /* margin-top: 15px; */
            margin-bottom: 1em;
        }
        #ipc {
            margin-bottom: 0px !important; 
            margin-top: 1.8em;
        }
        .textPrin {
            font-size: 25px;
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
            margin-left: auto;
            margin-right: auto;
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

        /* Dashboard */
        .despesas {
            display: flex;
            justify-content: center;
        }

        th {
            text-align: center;
            background-color: var(--cor02);
        }
        td {
            padding: 5px 20px;
            background-color: var(--cor03);
        }

        .total{
            margin-top: 15px;
        }

        @media screen and (max-width: 992px){
            /* Menu */ 
            #menu {
                display: none;
                font-size: 22px;
            }
            i#burguer {
                /* background-color: rgb(48, 48, 48); */
                background-color: var(--cor02);
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
                margin-left: 10px;
                /* margin-top: 15px; */
                margin-bottom: 1em;
            }
            #ipc {
                margin-bottom: 0px !important; 
                margin-top: 1.8em;
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
                margin-left: auto;
                margin-right: auto;
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

            /* Dashboard */

        }
    </style>
</head>
<body>
<header>
        <i id="burguer" class="material-icons" onclick="clickMenu()">menu</i>
        <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/dashboard">Visão geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/addDespesa">Lançamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/relatorio">Relatórios</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">Config</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/usuario">Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="confirmLogout()" href="/logout">Logout</a>
                    </li>
                </ul>
        </nav>
        <?php if(session()->getFlashdata('successAddCat')): ?>
            <div id="successAddCat" class="alert alert-success"><?= session()->getFlashdata('successAddCat') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('successUpdateUser')): ?>
            <div id="successUpdateUser" class="alert alert-success"><?= session()->getFlashdata('successUpdateUser') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('sucessDeleted')): ?>
            <div id="sucessDeleted" class="alert alert-success"><?= session()->getFlashdata('sucessDeleted') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorDeleted')): ?>
            <div id="errorDeleted" class="alert alert-error"><?= session()->getFlashdata('errorDeleted') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorUpdateUser')): ?>
            <div id="errorUpdateUser" class="alert alert-error"><?= session()->getFlashdata('errorUpdateUser') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorSenhaUser')): ?>
            <div id="errorSenhaUser" class="alert alert-error"><?= session()->getFlashdata('errorSenhaUser') ?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('errorAddCat')): ?>
            <div id="errorAddCat" class="alert alert-erro"><?= session()->getFlashdata('errorAddCat') ?></div>
        <?php endif;?>
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
    setTimeout(function(){
        document.getElementById('successUpdateUser').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('sucessDeleted').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('errorDeleted').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('errorUpdateUser').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('errorSenhaUser').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('errorAddCat').style.display = 'none';
    }, 5000);
    setTimeout(function(){
        document.getElementById('successAddCat').style.display = 'none';
    }, 5000);

    function confirmLogout(){
        if (confirm("Tem certeza que deseja fazer logout?")) {
            // Se o usuário clicar em "OK", redireciona para o controlador para fazer logout 
            <?php redirect()->to('/logout')?>
        } else {
            // Se o usuário clicar em "Cancelar", não faz nada
        }
    }
</script>
</body>
</html>