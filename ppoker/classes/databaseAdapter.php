<?php
    class databaseAdapter{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "ppoker";
        private $last_id;
        private $query;
        private $conn;
        private $preparedStatement;

        public function __construct($query, $params = []){
            $this->conn = $this->connectToDb();
            $this->preparedStatement = $this->conn->prepare($query);
            $s = $this->buildDatatypeString($params);
            if ($s){
                $this->preparedStatement->bind_param($s, ...$params);
            }
        }

        public function executeQuery(){
            $this->preparedStatement->execute();
            $result = $this->preparedStatement->get_result();
            $this->last_id = $this->conn->insert_id;
            $this->closeConnection($this->conn, $this->preparedStatement);
            return $result;
        }

        public function getLastId(){
            return $this->last_id;
        }

        private function connectToDb(){
            $conn = $this->createConnection();
            if(!$this->checkConnection($conn)){
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }

        private function createConnection(){
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            return $conn;
        }

        private function checkConnection($conn){
            if($conn->connect_error) {
                return false;
            }
            return true;
        }

        private function closeConnection($conn, $stmt){
            $stmt->close();
            $conn->close();
        }

        private function buildDatatypeString($array){
            $s = "";
            foreach ($array as $i){
                $s = $s."s";
            }
            return $s;
        }
    }
?>