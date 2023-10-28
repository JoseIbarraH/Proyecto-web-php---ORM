<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."gastos/lib/config.php";

    class Gasto extends ActiveRecord\Model{
        public static $belongs_to = array(array("usuario"));
    }

?>