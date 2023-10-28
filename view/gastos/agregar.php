<?php
    require_once "../validar_sesion.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Usuario.php";
    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["usuario.login"];
    $u = @unserialize($u);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
</head>

<body>
    <center>
        <h1>AGREGAR GASTOS</h1>
        <hr>
        <!-- EL FORMULARIO HTML -->
        <form action="../../controllers/GastoController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right">USUARIO:</th>
                    <td><span style="font-family: Arial, Helvetica, sans-serif; font-size: medium;">
                            <?= @$u->nombre ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: right">CEDULA:</th>
                    <td><span style="font-family: Arial, Helvetica, sans-serif; font-size: medium;" 
                    id="cc" name="cc">
                            <?= @$u->cedula ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><input type="number" value="<?= @$u->cedula ?>" id="cc" name="cc" readonly hidden></td>
                </tr>
                <tr>
                    <th style="text-align: right">ID:</th>
                    <td><input type="number" id="id" name="id" readonly></td>
                </tr>
                <tr>
                    <th style="text-align: right">FECHA:</th>
                    <td><input type="date" id="fecha" name="fecha" placeholder="Seleccione la Fecha"></td>
                </tr>
                <tr>
                    <th style="text-align: right">VALOR:</th>
                    <td><input type="number" step="any" id="valor" name="valor" required placeholder="Digita el Valor">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: right">DETALLES:</th>
                    <td><textarea id="detalles" name="detalles"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <input type="reset" id="limpiar" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit"
                            id="accion" name="accion" value="Guardar">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Mostramos el mensaje enviado por el Controlador-->
        <span style="color: red;">
            <?= ($msj != null || isset($msj)) ? $msj : "" ?>
        </span>
    </center>
</body>

</html>