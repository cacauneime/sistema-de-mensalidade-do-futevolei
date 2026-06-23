<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/turma.php";

$nome = $_POST['nome'];
$horario = $_POST['horario'];
$dia_semana = $_POST['dia_semana'];
$nivel = $_POST['nivel'];

$turma = new \MODEL\Turma();
$turma->setNome($nome);
$turma->setHorario($horario);
$turma->setDiaSemana($dia_semana);
$turma->setNivel($nivel);

$dalTurma = new \DAL\Turma();
$dalTurma->Insert($turma);

header("location: lstTurma.php");

?>
