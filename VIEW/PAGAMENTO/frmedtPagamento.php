<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/pagamento.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/VIEW/menu.php";

$id = $_GET['id'];

$dalPagamento = new \DAL\Pagamento();
$pagamento = $dalPagamento->SelectById($id);

$dalAluno = new \DAL\Aluno();
$alunos = $dalAluno->Select();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pagamento - Futevôlei</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <h1 class="page-title">Editar Pagamento</h1>

            <form method="POST" action="opedtPagamento.php">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" value="<?php echo $pagamento->getId(); ?>" disabled>
                    <input type="hidden" name="id" value="<?php echo $pagamento->getId(); ?>">
                </div>

                <div class="form-group">
                    <label for="aluno">Aluno *</label>
                    <select id="aluno" name="aluno" required class="validate">
                        <option value="">Selecione um aluno</option>
                        <?php
                            foreach ($alunos as $aluno) {
                                $selected = ($aluno->getId() == $pagamento->getAluno()) ? 'selected' : '';
                                echo '<option value="' . $aluno->getId() . '" ' . $selected . '>' . htmlspecialchars($aluno->getNome()) . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="valor">Valor (R$) *</label>
                    <input type="number" id="valor" name="valor" required min="0.01" step="0.01" 
                           value="<?php echo $pagamento->getValor(); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="data_pagamento">Data do Pagamento *</label>
                    <input type="date" id="data_pagamento" name="data_pagamento" required 
                           value="<?php echo $pagamento->getDataPagamento(); ?>" class="validate">
                </div>

                <div class="form-group">
                    <label for="status">Status *</label>
                    <select id="status" name="status" required class="validate">
                        <option value="">Selecione o status</option>
                        <option value="Pago" <?php echo ($pagamento->getStatus() == 'Pago') ? 'selected' : ''; ?>>Pago</option>
                        <option value="Pendente" <?php echo ($pagamento->getStatus() == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mes_referencia">Mês de Referência *</label>
                    <select id="mes_referencia" name="mes_referencia" required class="validate">
                        <option value="">Selecione o mês</option>
                        <option value="Janeiro" <?php echo ($pagamento->getMesReferencia() == 'Janeiro') ? 'selected' : ''; ?>>Janeiro</option>
                        <option value="Fevereiro" <?php echo ($pagamento->getMesReferencia() == 'Fevereiro') ? 'selected' : ''; ?>>Fevereiro</option>
                        <option value="Março" <?php echo ($pagamento->getMesReferencia() == 'Março') ? 'selected' : ''; ?>>Março</option>
                        <option value="Abril" <?php echo ($pagamento->getMesReferencia() == 'Abril') ? 'selected' : ''; ?>>Abril</option>
                        <option value="Maio" <?php echo ($pagamento->getMesReferencia() == 'Maio') ? 'selected' : ''; ?>>Maio</option>
                        <option value="Junho" <?php echo ($pagamento->getMesReferencia() == 'Junho') ? 'selected' : ''; ?>>Junho</option>
                        <option value="Julho" <?php echo ($pagamento->getMesReferencia() == 'Julho') ? 'selected' : ''; ?>>Julho</option>
                        <option value="Agosto" <?php echo ($pagamento->getMesReferencia() == 'Agosto') ? 'selected' : ''; ?>>Agosto</option>
                        <option value="Setembro" <?php echo ($pagamento->getMesReferencia() == 'Setembro') ? 'selected' : ''; ?>>Setembro</option>
                        <option value="Outubro" <?php echo ($pagamento->getMesReferencia() == 'Outubro') ? 'selected' : ''; ?>>Outubro</option>
                        <option value="Novembro" <?php echo ($pagamento->getMesReferencia() == 'Novembro') ? 'selected' : ''; ?>>Novembro</option>
                        <option value="Dezembro" <?php echo ($pagamento->getMesReferencia() == 'Dezembro') ? 'selected' : ''; ?>>Dezembro</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <button type="submit" class="btn-custom">Atualizar Pagamento</button>
                    <a href="lstPagamento.php" class="btn-custom" style="background-color: #999;">Cancelar</a>
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
