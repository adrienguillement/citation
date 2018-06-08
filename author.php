<?php

$connection = new Connexion();
$db = $connection->connect();

$sql_select_random='SELECT * FROM auteurs WHERE nom=? and prenom=?';
$st = $db->prepare($sql_select_random);
$st->bindParam(1, $_GET['nom']);
$st->bindParam(2, $_GET['prenom']);
$st->execute();
while($ligne = $st->fetch()){
    $auteur = new Auteurs($ligne['siecle'], $ligne['prenom'], $ligne['nom'], $ligne['image'], $ligne['audio'], $ligne['idauteur']);
}
var_dump($_GET);
$st=null;


?>
<div class="container">
    <div class="row">
        <div class=""
        <div class="col-10">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="assets/img/<?= $auteur->getImage(); ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $auteur->getNom()." ".$auteur->getPrenom(); ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>

                    <!-- BALISE AUDIO -->
                    <?php
                    if($auteur->getAudio()):
                        $mp3 = "assets/audio/".$auteur->getAudio();
                        ?>
                        <audio
                            id="t-rex-roar"
                            controls
                            autoplay>
                            <source src="<?= $mp3; ?>". type="audio/mpeg" />
                            Votre navigateur ne supporte pas l'audio.
                        </audio>

                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
