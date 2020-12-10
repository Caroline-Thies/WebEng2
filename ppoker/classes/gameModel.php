<?php
    include_once("game.php");
    include_once("databaseAdapter.php");
    class gameModel {
        public function addGame($title, $question){
            $query = "INSERT INTO planungsspiel (taskname, beschreibung, einrichtungsdatum) 
            VALUES (?, ?, CURRENT_DATE)";
            $databaseAdapter = new databaseAdapter($query, [$title, $question]);
            $databaseAdapter->executeQuery();
            $id = $databaseAdapter->getLastId();
            return $this->getGameById($id);
        }
        public function getGameById($id){
            $query = "SELECT * FROM planungsspiel WHERE id = ?";
            $databaseAdapter = new databaseAdapter($query, [$id]);
            $result = $databaseAdapter->executeQuery();
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $this->rowToGame($row);
            }
        }
        public function getGamesByUserId($id){
            $query = "SELECT ID, Taskname, Beschreibung, Einrichtungsdatum FROM nimmtteil
            JOIN planungsspiel ON nimmtteil.planungsspiel = planungsspiel.id
            WHERE benutzer = ?";
            $gamesList = array();
            $databaseAdapter = new databaseAdapter($query, [$id]);
            $result = $databaseAdapter->executeQuery();
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    array_push($gamesList, $this->rowToGame($row));
                }
                return $gamesList;
            }
        }
        private function rowToGame($row){
            $game = new Game($row["ID"], $row["Taskname"], $row["Beschreibung"], $row["Einrichtungsdatum"]);
            return $game;
        }
    }
?>