<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";

$id = $_GET['id'];

$dalAluno = new \DAL\Aluno();
$dalAluno->Delete($id);

header("location: lstAluno.php");

?>
