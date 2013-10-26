<?php

class LogDAL {
    private $conn;

    function __construct() {
        require("credenciais.php");
        $this->conn = mysql_connect($servername, $username, $passwd);
        if (!($this->conn)) {
            echo "Nao foi possivel ligar a base de dados" . mysql_error();
            exit();
        }
        if (!mysql_select_db($dbname)) {
            echo "Nao foi possivel seleccionar a base de dados" . mysql_error();
            exit();
        }
    }

    function __destruct() {
        mysql_close($this->conn);
    }

    function insert($sql) {
        if(!mysql_query($sql,$this->conn)){
            echo "Erro a adicionar LOG" . mysql_error();
        }        
    }
}

?>
