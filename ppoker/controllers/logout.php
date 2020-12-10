<?php
if(isset($_POST["logoutSubmit"])){
    $_SESSION["user"] = null;
    require_once("views/logout/logoutSuccess.html");
} else {
    require_once("views/logout/logout.html");
}
