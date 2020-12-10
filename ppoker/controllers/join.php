<?php
if(isset($_SESSION["user"])){
    require_once("views/join/join.html");
}else{
    require_once("templates/loggedOutError.html");
}
