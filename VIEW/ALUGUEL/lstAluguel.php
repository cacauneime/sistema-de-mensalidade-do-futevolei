<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluguel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluguel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

use DAL\Aluguel;

$dalAluguel = new DAL\Aluguel();

if (isset($_GET['busca_cliente']) && !empty($_GET['busca_cliente'])) {
    $termo = $_GET['busca_cliente'];
    $lista = $dalAluguel->SelectByCliente($termo);
} else {
    $termo = "";
    $lista = $dalAluguel->Select();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Aluguéis - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body class="blue lighten-5">
    <div class="container">
        <h1 style="text-align: center; color: #1976d2; margin-top: 40px;">Listar Aluguéis de Quadra</h1>

        <div class="row white black-text" style="margin-top: 20px; padding: 15px; border-radius: 5px;">
            <form action="lstAluguel.php" method="get" class="col s12">
                <div class="input-field col s12">
                    <input type="search" name="busca_cliente" placeholder="Filtrar por cliente..." value="<?php echo $termo; ?>">
                    <button type="submit" class="btn waves-effect waves-light" style="background-color: #1565c0; margin-top: 10px;">
                        <i class="material-icons left">search</i>Filtrar
                    </button>
                </div>
            </form>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col s12">
                <a href="frminsAluguel.php" class="btn waves-effect waves-light" style="background-color: #1565c0;">
                    <i class="material-icons left">add</i>Novo Aluguel
                </a>
            </div>
        </div>

        <table class="striped responsive-table hover" style="margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>DATA</th>
                <th>HORA INÍCIO</th>
                <th>HORA FIM</th>
                <th>QUADRA</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
            <?php
                foreach ($lista as $aluguel) {
                    echo '<tr>';
                    echo '<td>' . $aluguel->getId() . '</td>';
                    echo '<td>' . htmlspecialchars($aluguel->getCliente()) . '</td>';
                    echo '<td>' . $aluguel->getDataAluguel() . '</td>';
                    echo '<td>' . $aluguel->getHoraInicio() . '</td>';
                    echo '<td>' . $aluguel->getHoraFim() . '</td>';
                    echo '<td>' . htmlspecialchars($aluguel->getQuadra()) . '</td>';
                    echo '<td>R$ ' . number_format($aluguel->getValor(), 2, ',', '.') . '</td>';
                    echo '<td>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light blue" href="frmedtAluguel.php?id=' . $aluguel->getId() . '"><i class="material-icons">edit</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light orange" href="frmdetAluguel.php?id=' . $aluguel->getId() . '"><i class="material-icons">visibility</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light red" href="javascript:if(confirm(\'Tem certeza?\')){window.location=\'opremAluguel.php?id=' . $aluguel->getId() . '\'}"><i class="material-icons">delete</i></a>';
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
