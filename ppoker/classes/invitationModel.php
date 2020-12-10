<?php
require_once("invitation.php");
require_once("databaseAdapter.php");
require_once("gameModel.php");
class InvitationModel{

    public function getOpenInvitationsByReciever($reciever){
        $id = $reciever->getId();
        $query = "SELECT einladung.Sender, einladung.Empfaenger, einladung.Spiel FROM einladung LEFT JOIN nimmtteil ON einladung.spiel = nimmtteil.Planungsspiel WHERE einladung.Empfaenger = ? AND nimmtteil.Karte IS NULL";
        $databaseAdapter = new DatabaseAdapter($query, [$id]);
        $result = $databaseAdapter->executeQuery();
        $invitationList = [];
        if ($result->num_rows > 0){
            $gameModel = new GameModel();
            while($row = $result->fetch_assoc()){
                $gameId = $row["Spiel"];
                array_push($invitationList, $gameModel->getGameById($gameId));
            }
            return $invitationList;
        }
    }

    public function checkIfAlreadyInvited($reciever, $gameId){
        $recieverId = $reciever->getId();
        $query = "SELECT * FROM einladung WHERE empfaenger = ? AND Spiel = ?";
        $databaseAdapter = new DatabaseAdapter($query, [$recieverId, $gameId]);
        $result = $databaseAdapter->executeQuery();
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function addInvitation($sender, $reciever, $gameId){
        $senderId = $sender->getId();
        $recieverId = $reciever->getId();
        $query = "INSERT INTO einladung (Sender, Empfaenger, Spiel) VALUES (?,?,?)";
        $databaseAdapter = new DatabaseAdapter($query, [$senderId, $recieverId, $gameId]);
        $databaseAdapter->executeQuery();
    }
}