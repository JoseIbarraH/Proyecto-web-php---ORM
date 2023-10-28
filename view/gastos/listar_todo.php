<?php
require_once "../validar_sesion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Gasto.php";
$msj = @$_REQUEST["msj"];
$gastos = @$_SESSION["Gastos.all"];
$gastos = unserialize($gastos);
$u = @$_SESSION["usuario.login"];
$u = @unserialize($u);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <link rel="stylesheet" href="../css/estilos.css">
    </link>
</head>

<body class="Reporte">
    <center>
        <h1>REPORTE DE GASTOS DE
            <?= strtoupper($u->nombre) ?>
        </h1>
        <hr>
        <?php
        // SI LA LISTA ES NULA O ESTA VACIA
        if ($gastos == null || count($gastos) <= 0) {
            ?>
            <span style="color: #900D40; background-color: #FAD7CE;"> No existen gastos registrados para
                <?= $u->nombre ?>
            </span>
            <?php
        } else {
            ?>
            <fieldset style="width: 40%;">
                <legend>Informacion de los Gastos:</legend>
                <table>
                    <!-- CREAR UNA FILA (TR: TABLE ROW) PARA LAS COLUMNAS -->
                    <tr>
                        <!-- CREAR CELDA DE CABECERA (TH: TABLE HEAD) PARA LOS DATOS DEL GASTO-->
                        <th>#</th>
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>VALOR</th>
                    </tr>
                    <?php
                    $total_gastos = 0;
                    // RECORRER CADA UNO DE LOS GASTOS EN LA LISTA
                    foreach ($gastos as $i => $g) {
                        ?>
                        <!-- CREAR UNA FILA (TR: TABLE ROW) POR CADA GASTO -->
                        <tr style="text-align: left;">
                            <!-- CREAR UNA CELDA DE DATO (TD: TABLE DATA) POR CADA DATO DEL GASTO -->
                            <td>
                                <?= ($i + 1) ?>
                            </td>
                            <td>
                                <?= $g->id ?>
                            </td>
                            <td>
                                <?= date('Y-m-d', strtotime($g->fecha)) ?>
                            </td>
                            <!-- CREAR UN ENLACE PARA EL ENVIAR CORREO POR CADA GASTO -->
                            <td>$
                                <?= $g->valor ?>
                            </td>
                        </tr>
                        <?php
                        $total_gastos += $g->valor;
                    }
                    ?>
                    <tr>
                        <td colspan="3" style="text-align: right;">
                            <h4><b>TOTAL:</b></h4>
                        </td>
                        <td style="text-align: left;">
                            <h4>$
                                <?= $total_gastos ?>
                            </h4>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <?php
        }
        ?>
        <!-- Mostramos el mensaje enviado por el Controlador-->
        <span style="color: red;">
            <?= ($msj != NULL || isset($msj)) ? $msj : "" ?>
        </span>
    </center>
    </bɔdy>
</html>