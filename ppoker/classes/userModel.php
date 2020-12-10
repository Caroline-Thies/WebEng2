<?php
    require_once("user.php");
    require_once("databaseAdapter.php");

    class UserModel{
        public function getUserList(){
            $query = 'SELECT * FROM benutzer ORDER BY id ASC';
            $databaseAdapter = new databaseAdapter($query);
            $result = $databaseAdapter->executeQuery();
            $userList = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($userList, $this->rowToUser($row));
                }
            }
            return $result;
        }
        public function getUserById($id){
            $query = 'SELECT * FROM benutzer WHERE id = ?';
            $databaseAdapter = new databaseAdapter($query, [$id]);
            $result = $databaseAdapter->executeQuery();
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $this->rowToUser($row);
            }
        }
        public function getUserByMail($mail){
            $query = "SELECT * FROM benutzer WHERE mail = ?";
            $databaseAdapter = new databaseAdapter($query, [$mail]);
            $result = $databaseAdapter->executeQuery();
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $this->rowToUser($row);
            }
        }

        public function addUser($vorname, $nachname, $mail, $password){
            if(!is_null($this->getUserByMail($mail))){
                return;
            }
            $query = "
                INSERT INTO benutzer (`Vorname`, `Nachname`, `Mail`, `Passwort`, `Reg-Datum`)
                VALUES (?, ?, ?, ?, CURRENT_DATE)
            ";
            $databaseAdapter = new databaseAdapter($query, [$vorname, $nachname, $mail, $password]);
            $databaseAdapter->executeQuery();
            $id = $databaseAdapter->getLastId();
            return $this->getUserById($id);
        }

        private function rowToUser($row){
            $user = new User($row["ID"], $row["Vorname"], $row["Nachname"], $row["Mail"], $row["Passwort"], $row["Reg-Datum"]);
            return $user;
        }
    }
?>