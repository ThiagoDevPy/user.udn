<?php

class Database {
    private $host;
    private $port;
    private $user;
    private $pass;
    private $dbname;
    private $conexion;




    public function __construct($host, $port, $user, $pass, $dbname) {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect();
    }

    private function connect() {
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->dbname, $this->port);

        // Verificar la conexión
        if ($this->conexion->connect_error) {
            error_log("Conexión fallida: " . $this->conexion->connect_error);
            throw new Exception("Ocurrió un error al intentar conectarse a la base de datos.");
        }

      
    }

    public function close() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    public function getConnection() {
        return $this->conexion;
    }
}

?>