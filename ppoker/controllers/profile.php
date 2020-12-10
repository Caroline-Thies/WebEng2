<?php
require_once("classes/user.php");
require_once("classes/gameModel.php");
require_once("classes/invitationModel.php");
if($_SESSION["user"]){
    $user = $_SESSION["user"];
    $gameModel = new GameModel();
    $id = $user->getId();
    $playedGames = $gameModel->getGamesByUserId($id);
    $invitationModel = new InvitationModel();
    $openInvitations = $invitationModel->getOpenInvitationsByReciever($user);
    $fname = $user->getFirstName();
    require_once("views/profile/profile.php");
}else{
    require_once("templates/loggedOutError.html");
}
