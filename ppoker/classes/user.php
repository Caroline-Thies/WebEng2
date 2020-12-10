<?php
    class User{
        private $id;
        private $firstName;
        private $lastName;
        private $mail;
        private $password;
        private $regDate;
    
        public function __construct($id, $firstName, $lastName, $mail, $password, $regDate){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->mail = $mail;
            $this->password = $password;
            $this->regDate = $regDate;
        }
    
        public function getId(){
            return $this->id;
        }
    
        public function getFirstName(){
            return $this->firstName;
        }
    
        public function getLastName(){
            return $this->lastName;
        }
    
        public function getMail(){
            return $this->mail;
        }
        
        public function getPassword(){
            return $this->password;
        }

        public function getRegDate(){
            return $this->regDate;
        }
    }
?>