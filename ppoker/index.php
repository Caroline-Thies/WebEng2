<?php
require_once("classes/user.php");//to keep logged in user in session
if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET["page"])){
    $page = htmlspecialchars($_GET["page"]);
} else {
    $page = "index";
}

include("templates/header.php");
include("controllers/".$page.".php");
include("templates/footer.html");
?>