<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/pagamento.php";

$id = $_GET['id'];

$dalPagamento = new \DAL\Pagamento();
$dalPagamento->Delete($id);

header("location: lstPagamento.php");

?>
