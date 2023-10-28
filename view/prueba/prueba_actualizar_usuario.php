<?php
include_once "../../models/Usuario.php";

$cedula = "12";

try{
    $u = Usuario::find($cedula);
    echo "DATOS ACTUALES DEL USUARIO<br>";
    echo "--------------------------<br>";
    echo "<b>CEDULA: </b> $u->cedula<br>";
    echo "<b>CLAVE: </b> $u->clave<br>";
    echo "<b>NOMBRE: </b> $u->nombre<br>";
    echo "<b>EMAIL: </b> $u->email<br>";
    echo "<br>";

    echo "CAMBIADO LA CLAVE Y EL EMAIL....<br>";

    $u->clave = "**123**";
    $u->email = "correoxyz@hotmail.com";
    $u->save();

    echo "<b>CEDULA: </b> $u->cedula<br>";
    echo "<b>CLAVE; </b> $u->clave<br>";
    echo "<b>NOMBRE: </b> $u->nombre<br>";
    echo "<b>EMAIL: </b> $u->email<br>";
    echo "<br>";
}
catch(Exception $error){
    echo $error->getMessage();
}