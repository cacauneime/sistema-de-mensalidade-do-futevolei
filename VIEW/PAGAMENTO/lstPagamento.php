<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/pagamento.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/pagamento.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

use DAL\Pagamento;
use DAL\Aluno;

$dalPagamento = new DAL\Pagamento();
$dalAluno = new DAL\Aluno();

if (isset($_GET['filtro_status']) && !empty($_GET['filtro_status'])) {
    $termo = $_GET['filtro_status'];
    $lista = $dalPagamento->SelectByStatus($termo);
} else {
    $termo = "";
    $lista = $dalPagamento->Select();
}

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
    <title>Listar Pagamentos</title>
</head>

<body class="blue lighten-5">
    <div class="container">
        <h1 style="text-align: center; color: #1976d2; margin-top: 40px;">Listar Pagamentos</h1>

        <div class="row white black-text" style="margin-top: 20px; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <form action="lstPagamento.php" method="get" class="col s12">
                <div class="input-field col s12 m6">
                    <select name="filtro_status" onchange="this.form.submit()">
                        <option value="">Todos</option>
                        <option value="Pago" <?php echo ($termo == 'Pago') ? 'selected' : ''; ?>>Pago</option>
                        <option value="Pendente" <?php echo ($termo == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
                    </select>
                    <label>Filtrar por Status:</label>
                </div>
            </form>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col s12">
                <a href="frminsPagamento.php" class="btn waves-effect waves-light" style="background-color: #1565c0;">
                    <i class="material-icons left">add</i>Novo Pagamento
                </a>
            </div>
        </div>

        <table class="striped responsive-table hover" style="margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>ALUNO</th>
                <th>VALOR</th>
                <th>DATA PAGAMENTO</th>
                <th>STATUS</th>
                <th>MÊS REFERÊNCIA</th>
                <th>
                    <a class="btn-floating btn-small waves-effect waves-light green">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
            <?php
                foreach ($lista as $pagamento) {
                    $aluno = $dalAluno->SelectById($pagamento->getAluno());
                    $status_color = ($pagamento->getStatus() == 'Pago') ? 'green' : 'orange';
                    
                    echo '<tr>';
                    echo '<td>' . $pagamento->getId() . '</td>';
                    echo '<td>' . htmlspecialchars($aluno->getNome()) . '</td>';
                    echo '<td>R$ ' . number_format($pagamento->getValor(), 2, ',', '.') . '</td>';
                    echo '<td>' . $pagamento->getDataPagamento() . '</td>';
                    echo '<td><span class="badge ' . $status_color . ' white-text">' . $pagamento->getStatus() . '</span></td>';
                    echo '<td>' . htmlspecialchars($pagamento->getMesReferencia()) . '</td>';
                    echo '<td>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light blue" href="frmedtPagamento.php?id=' . $pagamento->getId() . '"><i class="material-icons">edit</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light orange" href="frmdetPagamento.php?id=' . $pagamento->getId() . '"><i class="material-icons">visibility</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light red" href="javascript:if(confirm(\'Tem certeza?\')){window.location=\'opremPagamento.php?id=' . $pagamento->getId() . '\'}"><i class="material-icons">delete</i></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>

    <footer style="text-align: center; padding: 20px; margin-top: 40px; background-color: #f5f5f5; border-top: 1px solid #ddd;">
        <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
