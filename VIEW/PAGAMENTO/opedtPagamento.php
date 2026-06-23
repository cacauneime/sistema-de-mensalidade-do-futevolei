<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/pagamento.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/pagamento.php";

$id = $_POST['id'];
$aluno = $_POST['aluno'];
$valor = $_POST['valor'];
$data_pagamento = $_POST['data_pagamento'];
$status = $_POST['status'];
$mes_referencia = $_POST['mes_referencia'];

$pagamento = new \MODEL\Pagamento();
$pagamento->setId($id);
$pagamento->setAluno($aluno);
$pagamento->setValor($valor);
$pagamento->setDataPagamento($data_pagamento);
$pagamento->setStatus($status);
$pagamento->setMesReferencia($mes_referencia);

$dalPagamento = new \DAL\Pagamento();
$dalPagamento->Update($pagamento);

header("location: lstPagamento.php");

?>
