<div id="registrationSuccess" class="hidden">
    <p>Das Spiel wurde erfolgreich erzeugt! Der Code ist <?php echo $gameId;?></p>
    <button>Beitreten</button>
</div>
<div id="emailSuccess">
    <form>
        <label for="email">Sie können direkt Mitspieler über ihre E-Mail Adresse einladen. Geben Sie dazu die Adresse hier ein. Befindet sich ein Nutzer mit dieser Adresse in unserer Datenbank, erhält dieser eine Benachrichtigung.</label><br>
        <input type="text" name="email" id="email">
        <button type="submit">Einladen</button>
    </form>
</div>