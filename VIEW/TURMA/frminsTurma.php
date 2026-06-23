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
    <title>Inserir Turma</title>
</head>

<body class="blue lighten-5">
    <div class="container deep-orange lighten-1 col s12 " style="margin-top: 40px; padding: 20px; border-radius: 5px;">
        <div class="center light-blue darken-3 white-text col s12" style="padding: 20px; border-radius: 5px;">
            <h3>Inserir Turma</h3>
        </div>


        <div class="row grey lighten-2 black-text" style="padding: 20px; margin-top: 20px; border-radius: 5px;">
            <form action="opinsTurma.php" method="post" class="row">

                <div class="input-field col s8">
                    <input placeholder="Informar o nome da turma" id="nome"
                        name="nome" type="text" class="validate" required minlength="3" maxlength="50">
                    <label for="nome">Nome da Turma: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar o horário" id="horario"
                        name="horario" type="time" class="validate" required>
                    <label for="horario">Horário: </label>
                </div>

                <div class="input-field col s8">
                    <select id="dia_semana" name="dia_semana" required class="validate">
                        <option value="">Selecione um dia</option>
                        <option value="Segunda">Segunda</option>
                        <option value="Terça">Terça</option>
                        <option value="Quarta">Quarta</option>
                        <option value="Quinta">Quinta</option>
                        <option value="Sexta">Sexta</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                    <label for="dia_semana">Dia da Semana: </label>
                </div>

                <div class="input-field col s8">
                    <select id="nivel" name="nivel" required class="validate">
                        <option value="">Selecione um nível</option>
                        <option value="Iniciante">Iniciante</option>
                        <option value="Intermediário">Intermediário</option>
                        <option value="Avançado">Avançado</option>
                    </select>
                    <label for="nivel">Nível: </label>
                </div>

                <div class="row center col s8" style="margin-top: 20px;">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    <a href="lstTurma.php" class="btn waves-effect waves-light grey" style="margin-left: 10px;">Cancelar</a>
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
