<?php
require_once("classes/userModel.php");
if(isset($_POST["loginSubmit"])){
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $model = new UserModel();
        $user = $model->getUserByMail($email);
        if ($user && $user->getPassword()==$password){
            $_SESSION["user"] = $user;
            require_once("views/login/loginSuccess.php");
        }
        else {
            require_once("views/login/loginError.html");
            require_once("views/login/login.html");
        }
    }
} else {
    require_once("views/login/login.html");
}
