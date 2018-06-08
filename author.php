<?php

require 'class/autoloader.php';
Autoloader::register();

include_once("head.php");

$connection = new Connexion();
$db = $connection->connect();

$sql_select_random='SELECT * FROM auteurs WHERE nom=? and prenom=?';
$st = $db->prepare($sql_select_random);
$st->bindParam(1, $_GET['nom']);
$st->bindParam(2, $_GET['prenom']);
$st->execute();
while($ligne = $st->fetch()){
    $auteur = new Auteurs($ligne['siecle'], $ligne['prenom'], $ligne['nom'], $ligne['image'], $ligne['audio'], $ligne['idauteur']);
    var_dump($auteur);
}
$st=null;


include_once("footer.php");
?>

<?php
if($auteur->getAudio()):
$mp3 = "../assets/audio/".$auteur->getAudio();
?>
<audio
    id="t-rex-roar"
    controls
    autoplay>
    <source src="<?= $mp3; ?>". type="audio/mpeg" />
    Votre navigateur ne supporte pas l'audio.
</audio>

<?php endif; ?>