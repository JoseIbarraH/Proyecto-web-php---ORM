<?php
// Obtenemos el mensaje enviado por el controlador

require_once "../validar_sesion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Usuario.php";

$msj = @$_REQUEST["msj"];
$usuarios = @$_SESSION["usuarios.all"];
$usuarios = unserialize($usuarios);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
        <script src="../js/validaciones.js"> </script>
        <link rel="stylesheet" href="../css/estilos.css">
        </link>
    </head>
    <body>
        <center>
            <h1>REPORTE DE USUARIOS</h1>
            <hr>
            <?php
            if ($usuarios == null || count($usuarios) <= 0) {
                ?>
                <span style="color: #900040; background-color: #FAD7CE;"> No existen Usuarios registrados
                </span>
            <?php
            } else {
                ?>
                <fieldset style="width: 70%;">
                    <legend>Informacion de los Usuarios: </legend>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                        </tr>
                        <?php
                        foreach ($usuarios as $i => $u) {
                            ?>
                            <tr style="text-align: left;">
                                <td>
                                    <?= ($i + 1) ?>
                                </td>
                                <td>
                                    <?= $u->cedula ?>
                                </td>
                                <td>
                                    <?= $u->nombre ?>
                                </td>

                                <td><a href="mailto:<?= $u->email ?>">
                                        <?= $u->email ?>
                                    </a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </fieldset>
                <?php
            }
            ?>

            <span style="color: red;">
                <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
            </span>
        </center>
    </body>
</html>