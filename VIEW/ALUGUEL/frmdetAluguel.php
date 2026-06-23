<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluguel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalAluguel = new \DAL\Aluguel();
$aluguel = $dalAluguel->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluguel - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body class="blue lighten-5">
    <div class="container">
        <div class="row" style="margin-top: 40px;">
            <div class="col s12 m8 offset-m2">
                <h1 style="text-align: center; color: #1976d2;">Detalhes do Aluguel</h1>

                <div class="card" style="margin-top: 30px;">
                    <div class="card-content">
                        <table class="table">
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td><?php echo $aluguel->getId(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cliente:</strong></td>
                                <td><?php echo htmlspecialchars($aluguel->getCliente()); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Telefone:</strong></td>
                                <td><?php echo htmlspecialchars($aluguel->getTelefone()); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Data:</strong></td>
                                <td><?php echo $aluguel->getDataAluguel(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Hora Início:</strong></td>
                                <td><?php echo $aluguel->getHoraInicio(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Hora Fim:</strong></td>
                                <td><?php echo $aluguel->getHoraFim(); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Quadra:</strong></td>
                                <td><?php echo htmlspecialchars($aluguel->getQuadra()); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Valor:</strong></td>
                                <td>R$ <?php echo number_format($aluguel->getValor(), 2, ',', '.'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <a href="lstAluguel.php" class="btn waves-effect waves-light" style="background-color: #1565c0;">
                        <i class="material-icons left">arrow_back</i>Voltar
                    </a>
                    <a href="frmedtAluguel.php?id=<?php echo $aluguel->getId(); ?>" class="btn waves-effect waves-light orange">
                        <i class="material-icons left">edit</i>Editar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer style="text-align: center; padding: 20px; margin-top: 40px; background-color: #f5f5f5; border-top: 1px solid #ddd;">
        <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
