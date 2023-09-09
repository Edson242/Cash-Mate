<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        /* Config geral */
        :root {
            --cor01: #034AA6;
            --cor02: #035AA6;
            --cor03: #0455BF;
            --cor04: #B3CFFB;
            --cor05: #F2F2F2;
            --fonte01: 'Oswald', sans-serif;
        }

        * {
            padding: 0px;
            margin: 0px;
        }

        /* Header */
        body {
            background-color: var(--cor02);
        }

        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            color: var(--cor05);
            text-decoration: underline;
        }
        .nav-bar {
            background-color: var(--cor01);
        }

        /* Nav Bar */
        nav {
            position: sticky;
        }
        ul {
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        li {
            /* display: inline-block; */
            font-size: 20px;
            font-family: var(--fonte01);
            /* padding: 0.7em 0px 0.7em 1.2em; */
            padding-left: 1.2em;
            list-style: none;
        }

        .config {
            padding-left: 15em;
            padding-right: 0px;
        }
    </style>

</head>

<body>
    <header>
        <div class="nav-bar">
            <h1 id="marca">Cash Mate</h1>
            <!-- <img src="../imgs/logo.png" alt="logo"> -->
            <nav>
                <ul>
                    <li><a href="#">visão geral</a></li>
                    <li><a href="">lançamentos</a></li>
                    <li><a href="">relatórios</a></li>
                    <li class="config"><a href="">Config</a></li>
                    <li><a href="">Usuário</a></li>
                    <li></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

    </main>

    <footer>

    </footer>
</body>

</html>