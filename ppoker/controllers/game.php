<?php
require_once("classes/gameModel.php");
require_once("classes/answerModel.php");
if(isset($_SESSION["user"])){
    $answerModel = new AnswerModel();
    if(isset($_GET["gameId"]) && $game = (new GameModel())->getGameById($_GET["gameId"])){
        $gameId = $_GET["gameId"];
        if($answerModel->checkIfParticipated($_SESSION["user"], $gameId)){
            require_once("views/game/gameAlreadyParticipatedError.html");
        }else{
            $title = $game->getTitle();
            $question = $game->getQuestion();
            require_once("views/game/game.php");
        }
    }elseif(isset($_POST["card"])){
        $card = $_POST["card"];
        $gameId = $_POST["gameId"];
        if (!$answerModel->checkIfParticipated($_SESSION["user"], $gameId)){ //prevents the dataset to be inserted twice if the user reloads the page
            $answerModel->addTeilnahme($_SESSION["user"], $gameId, $card); 
        }
        require_once("views/game/gameAnswered.php");
    }else{
        require_once("views/game/gameLoadError.html");
    }
}else{
    require_once("templates/loggedOutError.html");
}
