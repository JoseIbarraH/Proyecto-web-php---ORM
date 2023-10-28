<?php
    require_once "../validar_sesion.php";
    // Obtenemos el mensaje enviado por el controlador
    $msj = @$_REQUEST["msj"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
</head>

<body>
    <center>
        <h1>AGREGAR USUARIOS</h1>
        <!-- EL FORMULARIO HTML -->
        <form action="../../controllers/UsuarioController.php" method="POST">
            <hr>
            <table>
                <tr>
                    <th style="text-align: right">CEDULA:</th>
                    <td><input type="number" id="cc" name="cc" required placeholder="Digita la Cedula"></td>
                </tr>
                <tr>
                    <th style="text-align: right">CLAVE:</th>
                    <td><input type="password" id="clave" name="clave" required placeholder="Digita la Clave"></td>
                </tr>
                <tr>
                    <th style="text-align: right">NOMBRE:</th>
                    <td><input type="text" id="nombre" name="nombre" required placeholder="Digita el Nombre"></td>
                </tr>
                <tr>
                    <th style="text-align: right">EMAIL:</th>
                    <td><input type="email" id="email" name="email" required placeholder="Digita el Email"></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <input type="reset" id="limpiar" value="Limpiar">&nbsp; &nbsp; &nbsp; &nbsp; 
                        <input type="submit" id="accion" name="accion" value="Guardar">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Mostramos el mensaje enviado por el Controlador-->
        <span style="color: red;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>
</body>

</html>