<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."gastos/lib/config.php";

    class Usuario extends ActiveRecord\Model{
        //si la clave primaria no se llama id tenemos que indicar cual es la primary key
        public static $primary_key = "cedula";
        //Un usuario tiene muchos Gastos
        public static $has_many = array(array("gastos"));

    }

?>