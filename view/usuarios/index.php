<?php
    require_once "../validar_sesion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EJEMPLO DE CRUD PHP CON ORM ACTIVERECORD</title>
    <link rel="stylesheet" href="../css/estilos.css">
    </link>
</head>

<body>
    <center>
        <table>
            <tr>
                <th>MENU DE USUARIOS</th>
            </tr>
            <tr>
                <td><a href="agregar.php">AGREGAR USUARIO</a></td>
            </tr>
            <tr>
                <td><a href="buscar.php">BUSCAR USUARIO</a></td>
            </tr>
            <tr>
                <td><a href="buscar.php">EDITAR USUARIO</a></td>
            </tr>
            <tr>
                <td><a href="buscar.php">ELIMINAR USUARIO</a></td>
            </tr>
            <tr>
                <td><a href="../../controllers/UsuarioController.php?accion=todo">REPORTE DE USUARIO</a></td>
            </tr>
        </table>
    </center>
</body>

</html>