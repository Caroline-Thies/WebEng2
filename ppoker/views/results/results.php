<div class="banner row">
    <h1>Ergebnisse für das Spiel "<?php echo $gameTitle; ?>":</h1>
    <p><?php echo $gameQuestion; ?></p>
</div>
<div class="inset row">
    <p><h3>Bisher gewählte Karten:</h3></p><br>
    <p>
        <?php 
            foreach($cards as $card){
                echo "<div class='card'>".$card."</div>";
            }
        ?>
    </p>
</div>

