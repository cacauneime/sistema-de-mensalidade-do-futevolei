<?php
session_start();
if (!isset($_SESSION['login']))
    header("Location: /futevolei_mensalidades/VIEW/index.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Usado para adicionar ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous">
    </script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="/futevolei_mensalidades/VIEW/js/init.js"></script>

    <title>Futevôlei - Sistema de Gestão de Mensalidades</title>
</head>

<body>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <nav>
        <div class="nav-wrapper blue darken-2 white-text">
            <a href="/futevolei_mensalidades/VIEW/home.php" class="brand-logo center" style="font-size: 24px; font-weight: 600;">
                Futevôlei
            </a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="/futevolei_mensalidades/VIEW/home.php">HOME</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/ALUNO/lstAluno.php">ALUNOS</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/TURMA/lstTurma.php">TURMAS</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/PAGAMENTO/lstPagamento.php">PAGAMENTOS</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/ALUGUEL/lstAluguel.php">ALUGUÉIS</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/logout.php">Logout</a></li>
            </ul>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li style="font-weight: bold; color: white;">Usuário: <?php echo $_SESSION['login'];?></li>
            </ul>

            <ul id="slide-out" class="sidenav light-blue darken-3 white-text">
                <li>
                    <div class="user-view blue darken-2 white-text">
                        <div class="background">
                        </div>
                        <a href="/futevolei_mensalidades/VIEW/home.php"><span class="white-text name">Futevôlei</span></a>
                        <a href="#email"><span class="white-text email"><?php echo $_SESSION['login'];?></span></a>
                    </div>
                </li>
                <li><a href="/futevolei_mensalidades/VIEW/home.php" class="white-text">HOME</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/ALUNO/lstAluno.php" class="white-text"><i class="material-icons white-text">people</i>Alunos</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/TURMA/lstTurma.php" class="white-text"><i class="material-icons white-text">groups</i>Turmas</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/PAGAMENTO/lstPagamento.php" class="white-text"><i class="material-icons white-text">payment</i>Pagamentos</a></li>
                <li><a href="/futevolei_mensalidades/VIEW/ALUGUEL/lstAluguel.php" class="white-text"><i class="material-icons white-text">sports_volleyball</i>Aluguéis</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a href="/futevolei_mensalidades/VIEW/logout.php" class="white-text"><i class="material-icons white-text">exit_to_app</i>Logout</a></li>
            </ul>

        </div>
    </nav>

</body>

</html>
