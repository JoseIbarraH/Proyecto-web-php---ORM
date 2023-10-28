<?php
session_start();
$u = @$_SESSION["usuario.login"];
$u = @unserialize($u);
if(!$u){
    $urlBase = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']."/gastos/view/usuarios/login.php";
    header("Location: $urlBase");
    exit;
}