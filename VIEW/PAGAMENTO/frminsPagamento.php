<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

    $dalAluno = new \DAL\Aluno();
    $alunos = $dalAluno->Select();
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
    <title>Inserir Pagamento</title>
</head>

<body class="blue lighten-5">
    <div class="container deep-orange lighten-1 col s12 " style="margin-top: 40px; padding: 20px; border-radius: 5px;">
        <div class="center light-blue darken-3 white-text col s12" style="padding: 20px; border-radius: 5px;">
            <h3>Inserir Pagamento</h3>
        </div>


        <div class="row grey lighten-2 black-text" style="padding: 20px; margin-top: 20px; border-radius: 5px;">
            <form action="opinsPagamento.php" method="post" class="row">

                <div class="input-field col s8">
                    <select id="aluno" name="aluno" required class="validate">
                        <option value="">Selecione um aluno</option>
                        <?php
                            foreach ($alunos as $aluno) {
                                echo '<option value="' . $aluno->getId() . '">' . htmlspecialchars($aluno->getNome()) . '</option>';
                            }
                        ?>
                    </select>
                    <label for="aluno">Aluno: </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar o valor" id="valor"
                        name="valor" type="number" class="validate" required min="0.01" step="0.01">
                    <label for="valor">Valor (R$): </label>
                </div>

                <div class="input-field col s8">
                    <input placeholder="Informar a data do pagamento" id="data_pagamento"
                        name="data_pagamento" type="date" class="validate" required>
                    <label for="data_pagamento">Data do Pagamento: </label>
                </div>

                <div class="input-field col s8">
                    <select id="status" name="status" required class="validate">
                        <option value="">Selecione o status</option>
                        <option value="Pago">Pago</option>
                        <option value="Pendente">Pendente</option>
                    </select>
                    <label for="status">Status: </label>
                </div>

                <div class="input-field col s8">
                    <select id="mes_referencia" name="mes_referencia" required class="validate">
                        <option value="">Selecione o mês</option>
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Março">Março</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>
                    <label for="mes_referencia">Mês de Referência: </label>
                </div>

                <div class="row center col s8" style="margin-top: 20px;">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    <a href="lstPagamento.php" class="btn waves-effect waves-light grey" style="margin-left: 10px;">Cancelar</a>
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
