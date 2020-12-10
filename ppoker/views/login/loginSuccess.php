<div>
    <p>Erfolgreich eingeloggt! Herzlich willkommen, 
        <?php echo $_SESSION["user"]->getFirstName()." ".$_SESSION["user"]->getLastName(); ?>!</p>
    <a class="rounded button" href="?page=index">Zurück zur Startseite</a>
</div>