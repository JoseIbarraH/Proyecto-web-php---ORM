<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "gastos/models/Gasto.php";

class GastoController
{
    
    //
    public static function ejecutarAccion()
    {
        // Recuperamos el campo accion (es el boton Guardar)
        $accion = @$_REQUEST["accion"];
        
        // Validamos si la accion es Guardar
        switch ($accion) {
            case "Guardar":
                // Invocamos al metodo guardar 
                GastoController::guardar();
                break;
            case "Buscar":
                // Invocamos al metodo buscar 
                GastoController::buscar();
                break;
            case "Editar":
                // Invocamos al metodo editar 
                GastoController::editar();
                break;
            case "Eliminar":
                // Invocamos al metodo eliminar 
                GastoController::eliminar();
                break;
            case "todo":
                // Invocamos al metodo listar_todo 
                GastoController::listar_todo();
                break;
            default:
                // Sino es la accion correcta, mandamos un error
                header("Location: ../view/error.php?msj-Accion no permitida");
                exit;
        }
    }


    public static function guardar()
    {
        // Recuperar los campos enviados por el fomulario
        $fecha = @$_REQUEST["fecha"];
        $valor = @$_REQUEST["valor"];
        $detalles = @$_REQUEST["detalles"];
        $usuario_id = @$_REQUEST["cc"];
        // Crear una instancia (objeto) de tipo Usuario
        $u = new Gasto();
        // Ponerle los campos como valores de las propiedades
        $u->fecha = $fecha;
        $u->valor = $valor;
        $u->detalles = $detalles;
        $u->usuario_id = $usuario_id;
        // Intentar guardar el Usuario en la BD
        try {
            // Guardar el usuario
            $u->save();
            // Contar los Usuarios guadados
            $total = @Gasto::count();
            $msj = "Gasto guardado, Total: $total";
            // Redireccionar a la pagina guardar enviandole un mensaje 
            header("Location: ../view/gastos/agregar.php?msj=$msj");
            exit;
        }
        // Capturar algun posible error o Excepcion
        catch (Exception $error) {
            // Verificar si el error es de clave primaria Duplicada 
            if (strstr($error->getMessage(), "Duplicate")) {
                $msj = "El Gasto ya existe";
            } else {
                // Otro mensaje en caso de que sea otra la causa del error
                $msj = "Ocurrió un error al Guardar el Gasto";
            }
            // Redireccionamos a la pagina agregar con el mensaje de error
            header("Location: ../view/gastos/agregar.php?msj=$msj");
            exit;
        }
    }



    public static function buscar()
    {
        // Recuperar los campos enviados por el fomulario 

        $id = @$_REQUEST["id"];
        // Intentar guardar el Usuario en la BD
        try {
            // Buscamos el usuario
            $u = Gasto::find($id);

            // colocamos el usuario en la sesion
            $_SESSION["gasto.find"] = serialize($u);
            $msj = "Gasto encontrado";
            // Redireccionar a la pagina buscar enviadole un mensaje 
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
        // Capturar algun posible error o Excepcion
        catch (Exception $error) {
            // Verificar si el error es porque no existe esa cedula en la BD
            if (strstr($error->getMessage(), $id)) {
                $msj = "El gasto con id: $u no existe";
            } else {
                // Otro mensaje en caso de que sea otra la causa del error 
                $msj = "Ocurrió un error al Buscar el Gasto";
            }

            // Redireccionamos a la pagina buscar con el mensaje de error 
            $_SESSION["gasto.find"] = null;
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function editar(){
        $id = @$_REQUEST["id"];
        $u = $_SESSION["gasto.find"];
        if ($u->id != $id) {
            $msj = "EL id no corresponde";
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
        $fecha = @$_REQUEST["fecha"];
        $valor = @$_REQUEST["valor"];
        $detalles = @$_REQUEST["detalles"];
        $u->fecha = $fecha;
        $u->valor = $valor;
        $u->detalles = $detalles;
        try {
            $u->save();
            $_SESSION["gasto.find"] = serialize($u);
            $msj = "Gasto Editado";
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
        catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msj = "El gasto con id: $id no existe";
            } else {
                $msj = "Ocurrió un error al Editar el Gasto";
            }
            $_SESSION["gasto.find"] = null;
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
    }


    public static function eliminar()
    {
        $id = @$_REQUEST["id"];
        $u = $_SESSION["gasto.find"];
        $u = unserialize($u);
        if ($u->id != $id) {
            $msj = "La id no corresponde al gasto que desea eliminar";
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
        try {
            $u->delete();
            $_SESSION["gasto.find"] = null;
            $total = @Gasto::count();
            $msj = "Gasto Eliminado, Total: $total";
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
        catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msj = "El Usuario con Cedula: $id no existe";
            } else if (strstr($error->getMessage(), "Integrity constraint violation")) {
                $msj = "error";
            } else {
                $msj = "Ocurrió un error al Eliminar el gasto con id: $id";
            }
            $_SESSION["gasto.find"] = null;
            header("Location: ../view/gastos/buscar.php?msj=$msj");
            exit;
        }
    }
    //
    public static function listar_todo()
    {
        try {
            // Obtener todos los gastos
            $gastos = Gasto::all();
            if ($gastos == null) {
                $_SESSION["gastos.all"] = null;
                $msj = "Total Gastos: 0";
            } else {
                $total = count($gastos);
                // Serializar (convertir en texto) la lista de gastos
                $gastos = serialize($gastos);
                // Colocamos la lista de gastos en sesión para poder
                // recuperarla en la página de reporte de gastos
                $_SESSION["gastos.all"] = $gastos;
            }
            // Redireccionamos hacia la página de reportes
            $msj = "Total Gastos: $total";
            header("Location: ../view/gastos/listar_todo.php?msj=$msj");
        } catch (Exception $error) {
            $_SESSION["gastos.all"] = null;
            header("Location: ../view/gastos/listar_todo.php?msj=Total Gastos: 0");
        }
    }

}

// Inicamos el procesamiento de la accion
GastoController::ejecutarAccion();