<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/aluguel.php";

$id = $_GET['id'];

$dalAluguel = new \DAL\Aluguel();
$dalAluguel->Delete($id);

header("location: lstAluguel.php");

?>
