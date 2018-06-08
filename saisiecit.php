<?php

require 'class/autoloader.php';
Autoloader::register();

include_once("head.php");


extract($_POST);
if(isset($author_name)){

    $connection = new Connexion();
    $db = $connection->connect();

    // Check if author already exist
    $sql_check_author = 'SELECT * from auteurs WHERE nom = :nom AND prenom = :prenom';
    $st = $db->prepare($sql_check_author);
    $st->bindParam(':nom', $author_name);
    $st->bindParam(':prenom', $author_prenom);
    $st->execute();

    // If author already exist
    if($auteur = $st->fetch()) {
        $sql_insert_citation='INSERT INTO citation(idauteur, texte) values(:idauthor, :text)';
        $st = $db->prepare($sql_insert_citation);
        $st->bindParam(':idauthor', $auteur['idauteur']);
        $st->bindParam(':text', $citation);
        $st->execute();
    } else {
        //Author do not exist

        try{
            $century = intval($century);
            $sql_insert_author='INSERT INTO auteurs(nom, prenom, siecle) values(:nom, :prenom, :siecle)';
            $st = $db->prepare($sql_insert_author);
            $st->bindParam(':nom', $author_name);
            $st->bindParam(':prenom', $author_prenom);
            $st->bindParam(':siecle', $century);
            $st->execute();


            $author_id = $db->lastInsertId();

            $sql_insert_citation='INSERT INTO citation(idauteur, texte) values(:idauthor, :text)';
            $st = $db->prepare($sql_insert_citation);
            $st->bindParam(':idauthor', $author_id);
            $st->bindParam(':text', $citation);
            $st->execute();
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Succès</strong> La citation vient d'être ajoutée.
            </div>
            <?php
        } catch(Exception $e) {

        }

    }
/*
    $sql_insert_author='INSERT INTO auteurs(nom, prenom, siecle) values(:nom, :prenom, :sicle)';
    $st = $db->prepare($sql_select_random);
    $st->bindParam(':p1', $nom);
    $st->bindParam(':p2', $prix);
    $st->execute();

    $citations = [];

    while($ligne = $st->fetch()){
        $citations[] = [new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']),
            new Auteurs($ligne['siecle'], $ligne['prenom'], $ligne['nom'], $ligne['image'], $ligne['idauteur'])];

    }*/
}

$form = new Form();
$form->setText("author_name", "Nom", True);
$form->setText("author_prenom", "Prénom");
$form->setDropdown(["16", "17", "18", "19", "20", "21"], "Siècle", "century");
$form->setTextArea("citation", "Citation", True);
$form->setSubmit("Ajouter");

?>
<div class="container">
    <div class="row">
        <div class="col-10">
            <?= $form->getForm(); ?>
        </div>
    </div>
</div>
    <img src="functions/identicon.php?size=48&hash=e4d909c290d0fb1ca068ffaddf22cbd0" />
<?php
include_once("footer.php"); ?>