<?php
    require_once "../validar_sesion.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Usuario.php";
    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["usuario.find"];
    $u = @unserialize($u);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <script src="../js/validaciones.js"></script>
</head>

<body>
    <center>
        <h1>BUSCAR USUARIO</h1>
        <hr>
        <!-- EL FORMULARIO HTML -->
        <form action="../../controllers/UsuarioController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right"> CEDULA: </th>
                    <td><input type="number" id="cc" name="cc"
                    value="<?=@$u->cedula ?>"required placeholder="Digita la cedula"></td>
                </tr>
                <tr>
                    <th style="text-align: right"> CLAVE: </th>
                    <td><input type="password" id="pass" name="pass" readonly
                    value="<?=@$u->clave ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right"> NOMBRE: </th>
                    <td><input type="text" id="nombre" name="nombre" readonly
                    value="<?=@$u->nombre ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right"> EMAIL: </th>
                    <td><input type="email" id="correo" name="correo"readonly
                    value="<?= @$u->email ?>"></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <input type="reset" id="limpiar" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="accion" name="accion" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="editar" name="accion" value="Editar" disabled>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="eliminar" name="accion" value="Eliminar" disabled>
                    </td>
                </tr>
            </table>
        </form>
        <!-- Mostramos el mensaje enviado por el controlador -->
        <span style="color: red;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>
    <script>
        habilitarBotones();
        confirmarOperacion();
    </script>
</body>

</html>