<?php if($annonces):
    foreach($annonces as $annonce): ?>
        <h2>Départ : <?php echo $annonce->depart; ?></h2>
        <h2>Arrivée : <?php echo $annonce->arrivee; ?></h2>
        <p>le <?php echo $annonce->date; ?></p>
        <p>Par <?php echo $annonce->user->username; ?></p>
        <hr />

        
<?php endforeach;
endif;?>
