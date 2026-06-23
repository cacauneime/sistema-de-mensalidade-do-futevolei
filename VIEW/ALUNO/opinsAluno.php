<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluno.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluno.php";

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$turma = $_POST['turma'];
$data_inscricao = $_POST['data_inscricao'];

$aluno = new \MODEL\Aluno();
$aluno->setNome($nome);
$aluno->setTelefone($telefone);
$aluno->setEmail($email);
$aluno->setTurma($turma);
$aluno->setDataInscricao($data_inscricao);

$dalAluno = new \DAL\Aluno();
$dalAluno->Insert($aluno);

header("location: lstAluno.php");

?>
