<?php
    class AppDB {
        private $host = "localhost";
        private $user = "root";
        private $pass = "admin";
        private $db = "crudpaisajes-phpvue";

        public $connection;
        public function __construct() {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db) 
            or die(mysql_error());
            $this->connection->set_charset("utf8");
        }

        // Insertar
        public function create($table, $data) {
            $response = $this->connection->query("INSERT INTO $table VALUES(null, $data)") or die($this->connection->error);
            if ($response)
                return true;
            return false;
        }

        // Eliminar
        public function delete($table, $condition) {
            $response = $this->connection->query("DELETE FROM $table WHERE $condition") or die($this->connection->error);
            if ($response)
                return true;
            return false;
        }

        // Actualizar
        public function update($table, $fields, $condition) {
            $response = $this->connection->query("UPDATE $table SET $fields WHERE $condition") or die($this->connection->error);
            if ($response)
                return true;
            return false;
        }

        // Buscar
        public function search($table, $condition) {
            $response = $this->connection->query("SELECT * FROM $table WHERE $condition") or die($this->connection->error);
            if ($response)
                return $response->fetch_all(MYSQLI_ASSOC);
            return false;
        }
    }
    
