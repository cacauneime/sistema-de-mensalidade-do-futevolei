<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/pagamento.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalPagamento = new \DAL\Pagamento();
$pagamento = $dalPagamento->SelectById($id);

$dalAluno = new \DAL\Aluno();
$aluno = $dalAluno->SelectById($pagamento->getAluno());

$status_class = ($pagamento->getStatus() == 'Pago') ? 'status-pago' : 'status-pendente';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pagamento - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Detalhes do Pagamento</h1>

            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td><?php echo $pagamento->getId(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Aluno:</strong></td>
                            <td><?php echo htmlspecialchars($aluno->getNome()); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Valor:</strong></td>
                            <td>R$ <?php echo number_format($pagamento->getValor(), 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Data do Pagamento:</strong></td>
                            <td><?php echo $pagamento->getDataPagamento(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td><span class="<?php echo $status_class; ?>"><?php echo $pagamento->getStatus(); ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>Mês de Referência:</strong></td>
                            <td><?php echo htmlspecialchars($pagamento->getMesReferencia()); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <a href="lstPagamento.php" class="btn-custom">Voltar</a>
                <a href="frmedtPagamento.php?id=<?php echo $pagamento->getId(); ?>" class="btn-edit">Editar</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
</footer>

</body>
</html>
