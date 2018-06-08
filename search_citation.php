<?php
if(isset($_POST['search'])) :

    $search = $_POST['search'];

    $connection = new Connexion();
    $db = $connection->connect();

    $sql_select_random='SELECT * FROM citation INNER JOIN auteurs ON citation.idauteur=auteurs.idauteur WHERE citation.texte LIKE ?';
    $st = $db->prepare($sql_select_random);
    $st->bindValue(1, "%$search%", PDO::PARAM_STR);
    $st->execute();

    $citations = [];

    while($ligne = $st->fetch()){
        $citations[] = [new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']),
                        new Auteurs($ligne['siecle'], $ligne['prenom'], $ligne['nom'], $ligne['image'], $ligne['idauteur'])];

    }
?>

<div class="container">
    <?php foreach($citations as $each): ?>
        <div style="margin:10px" class="card" style="width: 30rem;">
            <div class="card-body">
            <h5 class="card-title"><?= $each[0]->getTexte(); ?></h5>
            <?php
            $lien = "author.php/?prenom=".$each[1]->getPrenom()."&nom=".$each[1]->getNom();
            ?>
            <a href="<?= $lien ?>" class="btn btn-primary"><?= $each[1]->getPrenom()." ".$each[1]->getNom(); ?></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
endif
?>