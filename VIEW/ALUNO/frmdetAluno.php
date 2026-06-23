<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalAluno = new \DAL\Aluno();
$aluno = $dalAluno->SelectById($id);

$dalTurma = new \DAL\Turma();
$turma = $dalTurma->SelectById($aluno->getTurma());
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Detalhes do Aluno</h1>

            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td><?php echo $aluno->getId(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nome:</strong></td>
                            <td><?php echo htmlspecialchars($aluno->getNome()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telefone:</strong></td>
                            <td><?php echo htmlspecialchars($aluno->getTelefone()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?php echo htmlspecialchars($aluno->getEmail()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Turma:</strong></td>
                            <td><?php echo htmlspecialchars($turma->getNome()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Data de Inscrição:</strong></td>
                            <td><?php echo $aluno->getDataInscricao(); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <a href="lstAluno.php" class="btn-custom">Voltar</a>
                <a href="frmedtAluno.php?id=<?php echo $aluno->getId(); ?>" class="btn-edit">Editar</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
</footer>

</body>
</html>
