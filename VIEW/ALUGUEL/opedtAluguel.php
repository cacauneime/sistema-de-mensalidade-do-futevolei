<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluguel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluguel.php";

$id = $_POST['id'];
$cliente = $_POST['cliente'];
$telefone = $_POST['telefone'];
$data_aluguel = $_POST['data_aluguel'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fim = $_POST['hora_fim'];
$quadra = $_POST['quadra'];
$valor = $_POST['valor'];

$aluguel = new \MODEL\Aluguel();
$aluguel->setId($id);
$aluguel->setCliente($cliente);
$aluguel->setTelefone($telefone);
$aluguel->setDataAluguel($data_aluguel);
$aluguel->setHoraInicio($hora_inicio);
$aluguel->setHoraFim($hora_fim);
$aluguel->setQuadra($quadra);
$aluguel->setValor($valor);

$dalAluguel = new \DAL\Aluguel();
$dalAluguel->Update($aluguel);

header("location: lstAluguel.php");

?>
