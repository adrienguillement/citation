<?php

$connection = new Connexion();
$db = $connection->connect();

$sql_select_random='SELECT * FROM citation INNER JOIN auteurs ON citation.idauteur=auteurs.idauteur ORDER BY RAND() LIMIT 1;';
$st = $db->prepare($sql_select_random);
$st->execute();
while($ligne = $st->fetch()){
    $citation = new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']);
    $auteur = new Auteurs($ligne['idauteur'], $ligne['nom'], $ligne['prenom'], $ligne['image'], $ligne['siecle']);
}
$st=null;
?>

<div class="container bandeau-container">
    <div class="row">
        <div class="col-12 ">
            <div class="row Bandeau">
                <div class="col-12 col-sm-10">
                <h5><?php echo $citation->getTexte(); ?></h5>
                <p><?php echo $auteur->getNom()." ".$auteur->getPrenom(); ?></p>
                </div>
                <div class="col-2 d-none d-sm-block">
                    <img src="assets/img/<?= $auteur->getImage(); ?>" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</div>