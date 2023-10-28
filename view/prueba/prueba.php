<?php
include_once "../../models/Usuario.php";


$u = new USuario();
$u->cedula = "12";
$u->nombre = "EL PROFEv2";
$u->email = "elcacho2@gmail.com";
try{
    $u->save();
    $total = @Usuario::count();
    echo "Usuarios guardado";
    echo "Total: $total";
}
catch(Exception $error){
    $msj = $error->getMessage();
    if(strstr($msj, "Duplicate")){
        echo "El usuario ya existe";
    }
}
?>