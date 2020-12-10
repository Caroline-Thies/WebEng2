<div class="banner"> 
<h1>
    <?php echo $title;?>
</h1>
<h2>
    <?php echo $question;?>
</h2>
</div>
<form class="inset horizontalFlex" method="post" action="?page=game">
    <input type="hidden" name="gameId" value="<?php echo $gameId ?>">
    <button type="submit" class="card" id="card0" name="card" value="0">0</button>
    <button type="submit" class="card" id="card1" name="card" value="1">1</button>
    <button type="submit" class="card" id="card2" name="card" value="2">2</button>
    <button type="submit" class="card" id="card3" name="card" value="3">3</button>
    <button type="submit" class="card" id="card5" name="card" value="5">5</button>
    <button type="submit" class="card" id="card8" name="card" value="8">8</button>
    <button type="submit" class="card" id="card13" name="card" value="13">13</button>
    <button type="submit" class="card" id="card20" name="card" value="20">20</button>
    <button type="submit" class="card" id="card40" name="card" value="40">40</button>
    <button type="submit" class="card" id="card80" name="card" value="80">80</button>
</form>
