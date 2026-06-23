<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/turma.php";

$id = $_GET['id'];

$dalTurma = new \DAL\Turma();
$dalTurma->Delete($id);

header("location: lstTurma.php");

?>
