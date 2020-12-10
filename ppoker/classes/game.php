<?php
    class Game{
        private $id;
        private $title;
        private $question;
        private $datum;

        public function __construct($id, $title, $question, $datum){
            $this->id = $id;
            $this->title = $title;
            $this->question = $question;
            $this->datum = $datum;
        }

        public function getId(){
            return $this->id;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getQuestion(){
            return $this->question;
        }

        public function getDatum(){
            return $this->datum;
        }
    }
?>