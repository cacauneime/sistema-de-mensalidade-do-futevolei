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
    <title>Editar Turma - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Editar Turma</h1>

            <form method="POST" action="opedtTurma.php">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" value="<?php echo $turma->getId(); ?>" disabled>
                    <input type="hidden" name="id" value="<?php echo $turma->getId(); ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Nome da Turma *</label>
                    <input type="text" id="nome" name="nome" required minlength="3" maxlength="50" 
                           value="<?php echo htmlspecialchars($turma->getNome()); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="horario">Horário *</label>
                    <input type="time" id="horario" name="horario" required 
                           value="<?php echo $turma->getHorario(); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="dia_semana">Dia da Semana *</label>
                    <select id="dia_semana" name="dia_semana" required class="validate">
                        <option value="">Selecione um dia</option>
                        <option value="Segunda" <?php echo ($turma->getDiaSemana() == 'Segunda') ? 'selected' : ''; ?>>Segunda</option>
                        <option value="Terça" <?php echo ($turma->getDiaSemana() == 'Terça') ? 'selected' : ''; ?>>Terça</option>
                        <option value="Quarta" <?php echo ($turma->getDiaSemana() == 'Quarta') ? 'selected' : ''; ?>>Quarta</option>
                        <option value="Quinta" <?php echo ($turma->getDiaSemana() == 'Quinta') ? 'selected' : ''; ?>>Quinta</option>
                        <option value="Sexta" <?php echo ($turma->getDiaSemana() == 'Sexta') ? 'selected' : ''; ?>>Sexta</option>
                        <option value="Sábado" <?php echo ($turma->getDiaSemana() == 'Sábado') ? 'selected' : ''; ?>>Sábado</option>
                        <option value="Domingo" <?php echo ($turma->getDiaSemana() == 'Domingo') ? 'selected' : ''; ?>>Domingo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nivel">Nível *</label>
                    <select id="nivel" name="nivel" required class="validate">
                        <option value="">Selecione um nível</option>
                        <option value="Iniciante" <?php echo ($turma->getNivel() == 'Iniciante') ? 'selected' : ''; ?>>Iniciante</option>
                        <option value="Intermediário" <?php echo ($turma->getNivel() == 'Intermediário') ? 'selected' : ''; ?>>Intermediário</option>
                        <option value="Avançado" <?php echo ($turma->getNivel() == 'Avançado') ? 'selected' : ''; ?>>Avançado</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <button type="submit" class="btn-custom">Atualizar Turma</button>
                    <a href="lstTurma.php" class="btn-custom" style="background-color: #999;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 - Sistema de Gestão de Mensalidades - Futevôlei. Todos os direitos reservados.</p>
</footer>

</body>
</html>
