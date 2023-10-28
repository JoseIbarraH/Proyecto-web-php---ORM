<?php
// Obtenemos el mensaje enviado por el controlador 
$msj = @$_REQUEST["msj"];
$u = @$_SESSION["usuario.login"];
$u = @unserialize($u);
if ($u) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <link rel="stylesheet" href="../css/estilos.css">
    </link>
</head>

<body class="Sesion">
    <center>
        <h1>INICIO DE SESION</h1>
        <hr>
        <!-- EL FORMULARIO HTML -->
        <form action="../../controllers/UsuarioController.php" method="POST">
            <fieldset style="width: 60%;">
                <legend>Datos de acceso:</legend>
                <table>
                    <tr>
                        <th style="text-align: right">CEDULA:</th>
                        <td><input type="number" id="cc" name="cc" required placeholder="Digita la Cedula"></td>
                    </tr>
                    <tr>
                        <th style="text-align: right"> CLAVE:</th>
                        <td><input type="password" id="pass" name="pass" placeholder="Digita la clave"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right">
                            <input type="reset" id="limpiar" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp; 
                            <input type="submit" id="accion" name="accion" value="Login">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <!-- Mostramos el mensaje enviado por el Controlador-->
        <span style="color: red;">
            <? ($msj != NULL || isset($msj)) ? $msj : "" ?>
        </span>
    </center>
</body>

</html>