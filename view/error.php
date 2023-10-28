<?php 
    $msj = @$_REQUEST["msj"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ELEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
</head>

<body>
    <center>
        <h1>MENSAJE</h1>
        <hr>
        <!-- Mostramos el mensaje enviado por el controlador -->
        <span style="color: #900D40; background-color: #FAD7CE;">
            <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
        </span>
    </center>
</body>

</html>