<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Usado para adicionar ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistema de Gestão de Mensalidades</title>
</head>

<body class="blue lighten-5">
    <div class="container">
        <div class="row" style="margin-top: 40px;">
            <div class="col s12" style="text-align: center; margin-bottom: 30px;">
                <img src="/futevolei_mensalidades/images/logo.png" alt="Logo Futevôlei" style="height: 120px; width: auto;">
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h1 style="text-align: center; color: #1976d2;">Bem-vindo ao Sistema de Gestão de Mensalidades</h1>
                <p style="font-size: 16px; color: #666; text-align: center;">
                    Olá, <strong><?php echo $_SESSION['login']; ?></strong>! 
                    Este é o painel de controle do sistema de mensalidades da escola de futevôlei.
                </p>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <div class="col s12 m6 l4">
                <a href="ALUNO/lstAluno.php" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-content white-text" style="background-color: #1976d2; border-radius: 8px; padding: 24px; text-align: center; min-height: 150px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <i class="material-icons" style="font-size: 48px; display: block; margin-bottom: 16px;">people</i>
                            <span class="card-title" style="font-size: 20px; font-weight: 600;">Alunos</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s12 m6 l4">
                <a href="TURMA/lstTurma.php" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-content white-text" style="background-color: #4caf50; border-radius: 8px; padding: 24px; text-align: center; min-height: 150px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <i class="material-icons" style="font-size: 48px; display: block; margin-bottom: 16px;">groups</i>
                            <span class="card-title" style="font-size: 20px; font-weight: 600;">Turmas</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s12 m6 l4">
                <a href="PAGAMENTO/lstPagamento.php" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-content white-text" style="background-color: #ff9800; border-radius: 8px; padding: 24px; text-align: center; min-height: 150px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <i class="material-icons" style="font-size: 48px; display: block; margin-bottom: 16px;">payment</i>
                            <span class="card-title" style="font-size: 20px; font-weight: 600;">Pagamentos</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s12 m6 l4">
                <a href="ALUGUEL/lstAluguel.php" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-content" style="background-color: #fdd835; border-radius: 8px; padding: 24px; text-align: center; min-height: 150px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <i class="material-icons" style="font-size: 48px; display: block; margin-bottom: 16px; color: #333;">sports_volleyball</i>
                            <span class="card-title" style="font-size: 20px; font-weight: 600; color: #333;">Aluguéis</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Sobre o Sistema</span>
                        <p>
                            Este sistema foi desenvolvido para gerenciar as mensalidades e informações dos alunos 
                            da escola de futevôlei. Através dele, você pode:
                        </p>
                        <ul style="margin-left: 20px;">
                            <li>✓ Cadastrar e gerenciar alunos</li>
                            <li>✓ Criar e organizar turmas</li>
                            <li>✓ Registrar e acompanhar pagamentos</li>
                            <li>✓ Gerenciar aluguéis de quadras</li>
                            <li>✓ Visualizar relatórios de mensalidades</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer style="text-align: center; padding: 20px; margin-top: 40px; background-color: #f5f5f5; border-top: 1px solid #ddd;">
        <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
