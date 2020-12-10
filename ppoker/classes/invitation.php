<?php
    require_once("user.php");
    require_once("game.php");
    class Invitation{
        private $sender;
        private $reciever;
        private $game;

        public function __construct($sender, $reciever, $game){
            $this->sender = $sender;
            $this->reciever = $reciever;
            $this->game = $game;
        }

        public function getSender(){
            return $this->sender;
        }

        public function getReciever(){
            return $this->reciever;
        }

        public function getGame(){
            return $this->game;
        }
    }