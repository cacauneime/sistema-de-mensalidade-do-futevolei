<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalTurma = new \DAL\Turma();
$turma = $dalTurma->SelectById($id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Turma - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Detalhes da Turma</h1>

            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td><?php echo $turma->getId(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nome:</strong></td>
                            <td><?php echo htmlspecialchars($turma->getNome()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Horário:</strong></td>
                            <td><?php echo htmlspecialchars($turma->getHorario()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Dia da Semana:</strong></td>
                            <td><?php echo htmlspecialchars($turma->getDiaSemana()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nível:</strong></td>
                            <td><?php echo htmlspecialchars($turma->getNivel()); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <a href="lstTurma.php" class="btn-custom">Voltar</a>
                <a href="frmedtTurma.php?id=<?php echo $turma->getId(); ?>" class="btn-edit">Editar</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
</footer>

</body>
</html>
