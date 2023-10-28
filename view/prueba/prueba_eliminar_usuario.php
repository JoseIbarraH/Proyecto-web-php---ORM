<?php
include_once "../../models/Usuario.php";

$cedula = "12";

try{
    $lista_objectos_usuarios = Usuario::all();
    $cuenta_usuarios = count($lista_objectos_usuarios);
    echo "<h3><b>TOTAL USUARIOS: </b>$cuenta_usuarios</h3><br><br>";
    echo "REPORTE DE USUARIOS<br>";
    echo "================================<br>";

    foreach($lista_objectos_usuarios as $i => $u){
        echo "USUARIO #".($i+1)."<br>";
        echo "------------------------<br>";
        echo "<b>CEDULA: </b> $u->cedula</br>";
        echo "<b>CLAVE: </b> $u->clave<br>";
        echo "<b>NOMBRE: </b> $u->nombre<br>";
        echo "<b>EMAIL: </b> $u->email<br>";
        echo "<br><br>";
    }

    echo "<h3>ELIMINAMOS EL USUARIO CON CEDULA .$cedula. </h3><br>";

    Usuario::find("321")->delete();

    $lista_objectos_usuarios = Usuario::all();
    $cuenta_usuarios = count($lista_objectos_usuarios);
    echo "<h3><b>TOTAL USUARIOS: </b>$cuenta_usuarios</h3><br><br>";
    echo "NUEVO REPORTE DE USUARIOS<br>";
    echo "===============================<br>";
    foreach($lista_objectos_usuarios as $i => $u){
        echo "USUARIO #".($i+1). "<br>";
        echo "----------------------------<br>";
        echo "<b>CEDULA:</b> $u->cedula<br>";
        echo "<b>CLAVE: </b> $u->clave<br>";
        echo "<b>NOMBRE: </b> $u->nombre<br>";
        echo "<b>EMAIL: </b> $u->email<br>";
        echo "<br><br>";
    }
}
catch(Exception $error){
    echo $error->getMessage();
}