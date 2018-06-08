<?php

$connection = new Connexion();
$db = $connection->connect();

$sql_select_random='SELECT * FROM citation INNER JOIN auteurs ON citation.idauteur=auteurs.idauteur ORDER BY RAND() LIMIT 1;';
$st = $db->prepare($sql_select_random);
$st->execute();
while($ligne = $st->fetch()){
    $citation = new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']);
    $auteur = new Auteurs($ligne['idauteur'], $ligne['nom'], $ligne['prenom'], $ligne['siecle']);
}
$st=null;
?>

<div class="col-lg-12 Bandeau">
        <div  class="col-lg-12">
                <h5><?php echo $citation->getTexte(); ?></h5>
                <p><?php echo $auteur->getPrenom()." ".$auteur->getNom(); ?></p>
        </div>
</div>