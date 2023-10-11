<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

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

        @media screen and (min-width: 768px) {
            #burguer {
                display: none;
            }
        }
        @media screen and (max-width: 480px){
            #menu {
                display: none;
            }
            i#burguer {
                background-color: rgb(48, 48, 48);
                color: white;
                display: block;
                text-align: center;
                cursor: pointer;
            }
            #burguer:hover {
                background-color: white;
                color: black;
            }
        }
    </style>

</head>

<body>
    <header>
        <i id="burguer" class="material-icons" onclick="clickMenu()">menu</i>
        <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">visão geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">lançamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">config</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Usuário</a>
                    </li>
                </ul>
            <!-- </div>  -->
        </nav>
    </header>

    <main>
        
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