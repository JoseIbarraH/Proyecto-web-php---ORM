<?php
include_once "../../models/Gasto.php";
include_once "../../models/Usuario.php";

$id = 6;

try {
    $g = Gasto::find($id);
    echo "<b>ID: </b> $g->id<br>";
    echo "<b>FECHA: </b> $g->fecha<br>";
    echo "<b>VALOR: $</b> $g->valor<br>";
    echo "<b>DETALLES: </b> $g->detalles<br>";
    $u = $g->usuario;
    echo "<br>";
    echo "-----------------------------<br>";
    echo "USUARIO <br>";
    echo "-----------------------------<br>";
    echo "<b>CEDULA: </b> $u->cedula<br>";
    echo "<b>CLAVE: </b> $u->clave<br>";
    echo "<b>Nombre: </b> $u->nombre<br>";
    echo "<b>EMAIL: </b> $u->email<br>";
}
catch (Exception $error) {
    echo $error->getMessage();
}