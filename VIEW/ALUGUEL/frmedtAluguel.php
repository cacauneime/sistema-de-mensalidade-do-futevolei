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
    <title>Editar Aluguel - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body class="blue lighten-5">
    <div class="container">
        <div class="row" style="margin-top: 40px;">
            <div class="col s12 m8 offset-m2">
                <h1 style="text-align: center; color: #1976d2;">Editar Aluguel de Quadra</h1>

                <form method="POST" action="opedtAluguel.php" style="margin-top: 30px;">
                    <div class="input-field">
                        <input type="text" value="<?php echo $aluguel->getId(); ?>" disabled>
                        <input type="hidden" name="id" value="<?php echo $aluguel->getId(); ?>">
                        <label>ID</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="cliente" name="cliente" required minlength="3" maxlength="50" 
                               value="<?php echo htmlspecialchars($aluguel->getCliente()); ?>" class="validate">
                        <label for="cliente">Cliente *</label>
                    </div>

                    <div class="input-field">
                        <input type="tel" id="telefone" name="telefone" required 
                               value="<?php echo htmlspecialchars($aluguel->getTelefone()); ?>" class="validate">
                        <label for="telefone">Telefone *</label>
                    </div>

                    <div class="input-field">
                        <input type="date" id="data_aluguel" name="data_aluguel" required 
                               value="<?php echo $aluguel->getDataAluguel(); ?>" class="validate">
                        <label for="data_aluguel">Data do Aluguel *</label>
                    </div>

                    <div class="input-field">
                        <input type="time" id="hora_inicio" name="hora_inicio" required 
                               value="<?php echo $aluguel->getHoraInicio(); ?>" class="validate">
                        <label for="hora_inicio">Hora Início *</label>
                    </div>

                    <div class="input-field">
                        <input type="time" id="hora_fim" name="hora_fim" required 
                               value="<?php echo $aluguel->getHoraFim(); ?>" class="validate">
                        <label for="hora_fim">Hora Fim *</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="quadra" name="quadra" required minlength="2" maxlength="20" 
                               value="<?php echo htmlspecialchars($aluguel->getQuadra()); ?>" class="validate">
                        <label for="quadra">Quadra *</label>
                    </div>

                    <div class="input-field">
                        <input type="number" id="valor" name="valor" required min="0.01" step="0.01" 
                               value="<?php echo $aluguel->getValor(); ?>" class="validate">
                        <label for="valor">Valor (R$) *</label>
                    </div>

                    <div style="margin-top: 30px;">
                        <button type="submit" class="btn waves-effect waves-light" style="background-color: #1565c0;">
                            <i class="material-icons left">save</i>Atualizar
                        </button>
                        <a href="lstAluguel.php" class="btn waves-effect waves-light grey">
                            <i class="material-icons left">cancel</i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer style="text-align: center; padding: 20px; margin-top: 40px; background-color: #f5f5f5; border-top: 1px solid #ddd;">
        <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
    </footer>

</body>

</html>
