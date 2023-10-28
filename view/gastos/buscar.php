<?php
    date_default_timezone_set('America/Bogota');

    require_once "../validar_sesion.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/gastos/models/Usuario.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/gastos/models/Gasto.php";
    $msj = @$_REQUEST["msj"];
    $g = @$_SESSION["gasto.find"];
    $g = unserialize($g);
    $u = @$_SESSION["usuario.login"];
    $u = unserialize($u);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <script src="../js/validaciones.js"> </script>
</head>

<body>
    <center>
        <h1>BUSCAR GASTO</h1>
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
                    <th style="text-align: right">ID:</th>
                    <td><input type="number" id="id" name="id" 
                    value="<?= @$g->id ?>" required
                    placeholder="Digita el ID"></td>
                </tr>
                <tr>
                    <th style="text-align: right">FECHA:</th>
                    <td><input type="date" id="fecha" name="fecha" readonly
                    value="<?= date("Y-m-d", strtotime(@$g->fecha)) ?>" 
                    placeholder="Digita la Fecha"></td>
                </tr>
                <tr>
                    <th style="text-align: right">VALOR:</th>
                    <td><input type="number" step="any" id="valor" name="valor" readonly 
                    value="<?= @$g->valor ?>"
                    placeholder="Digita el Valor"></td>
                </tr>
                <tr>
                    <th style="text-align: right">DETALLES:</th>
                        <td><textarea id="detalles" name="detalles" readonly><?= @$g->detalles ?></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <input type="reset" id="limpiar" value="Limpiar">&nbsp; &nbsp; &nbsp;&nbsp;
                        <input type="submit" id="accion" name="accion" value="Buscar"> &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="editar" name="accion" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="eliminar" name="accion" value="Eliminar">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Mostramos el mensaje enviado por el Controlador-->
        <span style="color: red;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>
    <script>
        habilitarBotonesGastos();
        confirmarOperacion();
    </script>
</body>

</html>
