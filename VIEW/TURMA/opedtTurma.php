<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/turma.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$horario = $_POST['horario'];
$dia_semana = $_POST['dia_semana'];
$nivel = $_POST['nivel'];

$turma = new \MODEL\Turma();
$turma->setId($id);
$turma->setNome($nome);
$turma->setHorario($horario);
$turma->setDiaSemana($dia_semana);
$turma->setNivel($nivel);

$dalTurma = new \DAL\Turma();
$dalTurma->Update($turma);

header("location: lstTurma.php");

?>
