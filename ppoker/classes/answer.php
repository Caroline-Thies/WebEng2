<?php
    require_once("classes/user.php");
    require_once("classes/game.php");
    
    class Answer{
        private $user;
        private $game;
        private $card;

        public function __construct($user, $game, $card){
            $this->$user = $user;
            $this->$game = $game;
            $this->$card = $card;
        }

        public function getUser(){
            return $user;
        }

        public function getGame(){
            return $game;
        }

        public function getCard(){
            return $card;
        }
    }
?>