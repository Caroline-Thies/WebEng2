<form method="post" action="?page=newgame" id="invitePlayer" name="invitePlayer">
    <label for="invitationAddress">Geben Sie hier die Mail-Adresse eines Nutzers oder einer Nutzerin an, um diesen oder diese zu diesem Spiel einzuladen:</label>
    <input type="email" required id="invitationAddress" name="invitationAddress">
    <input type="hidden" name="game" value="<?php echo $gameId; ?>">
    <button type="submit" id="invitePlayer" name="invitePlayer">Einladen</button>
</form>