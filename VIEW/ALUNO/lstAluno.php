<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

use DAL\Aluno;

$dalAluno = new DAL\Aluno();

if (isset($_GET['busca_nome']) && !empty($_GET['busca_nome'])) {
    $termo = $_GET['busca_nome'];
    $lista = $dalAluno->SelectByNome($termo);
} else {
    $termo = "";
    $lista = $dalAluno->Select();
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
    <title>Listar Alunos</title>
</head>

<body class="blue lighten-5">
    <div class="container">
        <h1 style="text-align: center; color: #1976d2; margin-top: 40px;">Listar Alunos</h1>

        <div class="row yellow lighten-3 black-text" style="margin-top: 20px; padding: 15px; border-radius: 5px;">
            <form action="lstAluno.php" method="get" class="col s12">
                <div class="input-field col s12">
                    <input id="search" type="search" name="busca_nome" class="col s6" value="<?php echo htmlspecialchars($termo); ?>">
                    <label for="icon_prefix"> Filtrar por nome...</label>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Filtrar
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col s12">
                <a href="frminsAluno.php" class="btn waves-effect waves-light green">
                    <i class="material-icons left">add</i>Novo Aluno
                </a>
            </div>
        </div>

        <table class="striped responsive-table hover" style="margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>TURMA</th>
                <th>DATA INSCRIÇÃO</th>
                <th>
                    <a class="btn-floating btn-small waves-effect waves-light green">
                        <i class="material-icons">add</i>
                    </a>
                </th>
            </tr>
            <?php
                foreach ($lista as $aluno) {
                    echo '<tr>';
                    echo '<td>' . $aluno->getId() . '</td>';
                    echo '<td>' . htmlspecialchars($aluno->getNome()) . '</td>';
                    echo '<td>' . htmlspecialchars($aluno->getTelefone()) . '</td>';
                    echo '<td>' . htmlspecialchars($aluno->getEmail()) . '</td>';
                    echo '<td>' . $aluno->getTurma() . '</td>';
                    echo '<td>' . $aluno->getDataInscricao() . '</td>';
                    echo '<td>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light blue" href="frmedtAluno.php?id=' . $aluno->getId() . '"><i class="material-icons">edit</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light orange" href="frmdetAluno.php?id=' . $aluno->getId() . '"><i class="material-icons">visibility</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light red" href="javascript:if(confirm(\'Tem certeza?\')){window.location=\'opremAluno.php?id=' . $aluno->getId() . '\'}"><i class="material-icons">delete</i></a>';
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
