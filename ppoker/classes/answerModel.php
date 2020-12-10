<?php
require_once("answer.php");
require_once("databaseAdapter.php");
require_once("game.php");
require_once("user.php");


class answerModel{
    public function getCardsByGame($game){
        $gameId = $game->getId();
        $cards = [];
        $query = 'SELECT karte FROM nimmtteil WHERE planungsspiel = ?';
        $databaseAdapter = new databaseAdapter($query, [$gameId]);
        $result = $databaseAdapter->executeQuery();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                array_push($cards, $row['karte']);
            }
        }
        return $cards;
    }

    public function checkIfParticipated($user, $gameId){
        $userId = $user->getId();
        $query = 'SELECT * FROM nimmtteil WHERE benutzer = ? AND planungsspiel = ?';
        $databaseAdapter = new databaseAdapter($query, [$userId, $gameId]);
        $result = $databaseAdapter->executeQuery();
        if ($result->num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function addTeilnahme($user, $gameId, $card){
        $query = '
            INSERT INTO nimmtteil (Benutzer, Planungsspiel, Datum, Karte)
            VALUES (?, ?, CURRENT_DATE, ?)';
        $databaseAdapter = new databaseAdapter($query, [$user->getId(), $gameId, $card]);
        $databaseAdapter->executeQuery($query);
    }


}
?>