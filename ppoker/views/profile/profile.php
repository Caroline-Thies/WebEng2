<div class="row banner">
    <h1>Willkommen auf deiner Profilseite, <?php echo "$fname"; ?>!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla est sequi doloremque consequatur culpa, excepturi repellat, delectus incidunt alias voluptatem sed a illo vero? Cumque a veniam mollitia velit id.</p>
</div>
<div class="inset row">
    <div class="col-md">
        <h2>Deine Spiele</h2>
        <?php
            if(isset($playedGames)){
                echo "<p>An diesen Spielen hast du bereits teilgenommen:</p>";
                foreach($playedGames as $game){
                    require("gameThumbnail.php");
                    echo "<div class='col-md'>
                    <p><a class='rounded button' href='?page=results&game=".$game->getId()."'>Ergebnisse</a></p>
                    </div>";
                }
            } else {
                echo "<p>Du hast noch an keinen Schätzkartenspielen teilgenommen. Sobald sich das ändert, werden sie hier aufgelistet sein.";
            }
        ?>
    </div>
    <div class="col-md">
        <h2>Einladungen</h2>
        <?php
            if(!isset($openInvitations)){
                echo "<p>Du hast gerade keine offenen Einladungen.</p>";
            }else{
                echo "<p>Zu diesen Spielen wurdest du eingeladen:</p>";
                foreach($openInvitations as $game){
                    require("gameThumbnail.php");
                    echo "<div class='col-md'>
                    <p><a class='rounded button' href='?page=game&gameId=".$game->getId()."'>Teilnehmen</a></p>
                    </div>";
                }
            }
        ?>
        
    </div>
</div>