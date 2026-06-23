<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/usuario.php";

session_start();

$login = $_POST['login'];
$pwd = $_POST['pwd'];

$dalUsuario = new \DAL\Usuario();

try {
    $usuario = $dalUsuario->SelectByLogin($login);
    
    $senhamd5 = md5($pwd);
    
    if ($usuario->getSenha() == $senhamd5) {
        $_SESSION['login'] = $usuario->getLogin();
        $_SESSION['id'] = $usuario->getId();
        header("location: home.php");
    } else {
        header("location: index.php?erro=1");
    }
} catch (Exception $e) {
    header("location: index.php?erro=1");
}

?>
