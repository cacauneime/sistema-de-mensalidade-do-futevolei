<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalAluno = new \DAL\Aluno();
$aluno = $dalAluno->SelectById($id);

$dalTurma = new \DAL\Turma();
$turmas = $dalTurma->Select();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Editar Aluno</h1>

            <form method="POST" action="opedtAluno.php">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" value="<?php echo $aluno->getId(); ?>" disabled>
                    <input type="hidden" name="id" value="<?php echo $aluno->getId(); ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required minlength="3" maxlength="50" 
                           value="<?php echo htmlspecialchars($aluno->getNome()); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone *</label>
                    <input type="tel" id="telefone" name="telefone" required pattern="[0-9\-\(\) ]+" maxlength="15" 
                           value="<?php echo htmlspecialchars($aluno->getTelefone()); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required maxlength="50" 
                           value="<?php echo htmlspecialchars($aluno->getEmail()); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="turma">Turma *</label>
                    <select id="turma" name="turma" required class="validate">
                        <option value="">Selecione uma turma</option>
                        <?php
                            foreach ($turmas as $turma) {
                                $selected = ($turma->getId() == $aluno->getTurma()) ? 'selected' : '';
                                echo '<option value="' . $turma->getId() . '" ' . $selected . '>' . htmlspecialchars($turma->getNome()) . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_inscricao">Data de Inscrição *</label>
                    <input type="date" id="data_inscricao" name="data_inscricao" required 
                           value="<?php echo $aluno->getDataInscricao(); ?>" class="validate">
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <button type="submit" class="btn-custom">Atualizar Aluno</button>
                    <a href="lstAluno.php" class="btn-custom" style="background-color: #999;">Cancelar</a>
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
