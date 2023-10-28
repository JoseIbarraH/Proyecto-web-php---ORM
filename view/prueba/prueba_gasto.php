<?php
include_once "../../models/Usuario.php";
include_once "../../models/Gasto.php";

$g = new Gasto();
$g->fecha = '2023-09-15';
$g->valor = 25000;
$g->detalles = "Esto es una prueba";
$g->usuario_id = "12";
try{
    $g->save();
    $total = @Gasto::count();
    echo "Gasto guardado";
    echo "Total: $total";
}
catch(Exception $error){
    $msj = $error->getMessage();
    if(strstr($msj, "Duplicate")){
        echo "El Gasto ya existe";
    }
}
?>