<?php
require_once("classes/answerModel.php");
require_once("classes/gameModel.php");
if($_SESSION["user"]){ //is the user logged in?
    if(isset($_GET["game"])){ //is the game variable set?
        $gameId = $_GET["game"];
        $gameModel = new GameModel();
        if($game = $gameModel->getGameById($gameId)){ //is the game variable valid?
            $answerModel = new AnswerModel();
            $cards = $answerModel->getCardsByGame($game);
            if($cards){ //are there answers to the game?
                $gameTitle = $game->getTitle();
                $gameQuestion = $game->getQuestion();
                require_once("views/results/results.php");
            }else{
                require_once("views/results/noResultsFound.html");
            }
        }else{
            require_once("views/results/invalidGameId.html");
        }
    }else{
        require_once("views/results/invalidGameId.html");
    }
}else{
    require_once("templates/loggedOutError.html");
}