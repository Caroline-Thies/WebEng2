<?php
require_once("classes/userModel.php");
if (isset($_POST["submit"])){
    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["password"])){
        $model = new userModel();
        $user = $model->addUser($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["password"]);
        if(is_null($user)){
            include_once("views/registration/registrationError.html");
            include_once("views/registration/registration.html");
        }else{
            include_once("views/registration/registrationSuccess.html");
        }
    }
}else{
    include_once("views/registration/registration.html");
}
$_POST["submit"] = null;
?>


