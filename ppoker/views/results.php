<h1>
    <?php 
        if(isset($question))
        {
            echo $question;
        }else {
            echo "Lorem ipsum?";
        }
    ?>
</h1>

<p>Ergebnisse: 
    <?php
        if(isset($cards)){
            foreach ($cards as &$card){
                echo " ".$card."";
            }
        }
        else{
            echo "Noch keine Ergebnisse ;(";
        }
    ?> 
</p>