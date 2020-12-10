<link rel="stylesheet" type="text/css" href="./css/style.css">
<!-- Using Bootstrap: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<nav class="navbar navbar-expand-sm bg-light">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="?page=index">Home</a></li>
        <?php
            if(isset($_SESSION["user"]))
            {
                echo '<li class="nav-item"><a class="nav-link" href="?page=profile">Profil</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="?page=logout">Abmelden</a></li>';
            }
            else {
                echo '<li class="nav-item"><a class="nav-link" href="?page=login">Anmelden</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="?page=registration">Registrieren</a></li>';
            }
        ?>
        <li class="nav-item"><a class="nav-link" href="?page=join">Spiel beitreten</a></li>
    </ul>
</nav>