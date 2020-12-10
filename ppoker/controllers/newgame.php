<?php
require_once("classes/gameModel.php");
require_once("classes/userModel.php");
require_once("classes/invitationModel.php");
if (isset($_SESSION["user"])){
    if(isset($_POST["newGameSubmit"]) && isset($_POST["title"]) && isset($_POST["question"])){
        $title = $_POST["title"];
        $question = $_POST["question"];
        $gameModel = new GameModel();
        $game = $gameModel->addGame($title, $question);
        $gameId = $game->getId();
        $_SESSION["lastCreatedGameId"] = $gameId; //needed for invitations
        $userModel = new UserModel();
        $userList = $userModel->getUserList();
        require_once("views/newgame/newgameSuccess.php");
        require_once("views/newgame/invitePlayer.php");
    }
    else{
        require_once("views/newgame/newgame.html");
    }
    if(isset($_POST["invitePlayer"])){
        $mail = $_POST["invitationAddress"];
        $userModel = new UserModel();
        $invitedUser = $userModel->getUserByMail($mail);
        $gameId = $_POST["game"];
        if(!$invitedUser){
            require_once("views/newgame/inviteError.html");
        }else{
            $invitationModel = new InvitationModel();
            if(!$invitationModel->checkIfAlreadyInvited($invitedUser, $gameId)){
                $invitationModel->addInvitation($_SESSION["user"], $invitedUser, $gameId);
                $fullInvitedUserName = $invitedUser->getFirstName()." ".$invitedUser->getLastName();
                require_once("views/newgame/inviteSuccess.php");
            }else{
                require_once("views/newgame/inviteError.html");
            }
        }
        require_once("views/newgame/invitePlayer.php");
    }
} else {
    require_once("templates/loggedOutError.html");
}