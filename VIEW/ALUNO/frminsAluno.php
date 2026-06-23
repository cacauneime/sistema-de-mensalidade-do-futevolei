<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

    $dalTurma = new \DAL\Turma();
    $turmas = $dalTurma->Select();
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
    <title>Inserir Aluno</title>
</head>

<body class="blue lighten-5">
    <div class="container deep-orange lighten-1 col s12 " style="margin-top: 40px; padding: 20px; border-radius: 5px;">
        <div class="center light-blue darken-3 white-text col s12" style="padding: 20px; border-radius: 5px;">
            <h3>Inserir Aluno</h3>
        </div>


        <div class="row grey lighten-2 black-text" style="padding: 20px; margin-top: 20px; border-radius: 5px;">
            <form action="opinsAluno.php" method="post" class="row">

                <div class="input-field col s8">
                    <input placeholder="Informar o nome completo do aluno" id="nome"
                        name="nome" type="text" class="validate" required minlength="3" maxlength="50">
                    <label for="nome">Nome Completo: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar o telefone" id="telefone"
                        name="telefone" type="tel" class="validate" required pattern="[0-9\-\(\) ]+" maxlength="15">
                    <label for="telefone">Telefone: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar o email" id="email"
                        name="email" type="email" class="validate" required maxlength="50">
                    <label for="email">Email: </label>
                </div>

                <div class="input-field col s8">
                    <select id="turma" name="turma" required class="validate">
                        <option value="">Selecione uma turma</option>
                        <?php
                            foreach ($turmas as $turma) {
                                echo '<option value="' . $turma->getId() . '">' . htmlspecialchars($turma->getNome()) . '</option>';
                            }
                        ?>
                    </select>
                    <label for="turma">Turma: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar a data de inscrição" id="data_inscricao"
                        name="data_inscricao" type="date" class="validate" required>
                    <label for="data_inscricao">Data de Inscrição: </label>
                </div>

                <div class="row center col s8" style="margin-top: 20px;">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    <a href="lstAluno.php" class="btn waves-effect waves-light grey" style="margin-left: 10px;">Cancelar</a>
                </div>
            </form>


        </div>
        <br />

    </div>

    <footer style="text-align: center; padding: 20px; margin-top: 40px; background-color: #f5f5f5; border-top: 1px solid #ddd;">
        <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
