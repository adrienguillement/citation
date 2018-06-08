<?php
if(isset($_POST['search'])) :

    $search = $_POST['search'];

    $connection = new Connexion();
    $db = $connection->connect();

    $arrayWords = explode( " ",$search);

    //var_dump($arrayWords);

    $arrayIdCitation = [];

    /*
    foreach word we try to find idcit by comparaison
    with citation.texte / auteurs.nom / auteur.prenom
    because we don't know wich column we need focus
    */
    foreach($arrayWords as $value){

        //search by citation.texte
        $arrayIdCitation1 = [];
        $sql_request='  SELECT idcit
                        FROM citation
                        WHERE citation.texte LIKE ?';
        $st = $db->prepare($sql_request);
        $st->bindValue(1, "%$value%", PDO::PARAM_STR);
        $st->execute();

        while($ligne = $st->fetch()){
            array_push($arrayIdCitation1, $ligne['idcit']);
        }
        $st=null;

        //var_dump($arrayIdCitation1);

        //search by auteurs.nom / auteurs.prenom
        $arrayIdCitation2 = [];
        $sql_request=  'SELECT idcit
                        FROM citation
                            JOIN auteurs ON citation.idauteur = auteurs.idauteur
                        WHERE auteurs.nom LIKE ?
                        OR auteurs.prenom LIKE ?';

        $st = $db->prepare($sql_request);
        $st->bindValue(1, "%$value%", PDO::PARAM_STR);
        $st->bindValue(2, "%$value%", PDO::PARAM_STR);
        $st->execute();

        while($ligne = $st->fetch()){
            array_push($arrayIdCitation2, $ligne['idcit']);
        }
        $st=null;
        //var_dump($arrayIdCitation2);

        //Merge array
        foreach($arrayIdCitation1 as $value){
            if(!in_array($value, $arrayIdCitation)){
                array_push($arrayIdCitation, $value);
            }
        }

        foreach($arrayIdCitation2 as $value){
            if(!in_array($value, $arrayIdCitation)){
                array_push($arrayIdCitation, $value);
            }
        }

        //var_dump($arrayIdCitation);
    }

    $citations = [];

    //Start the complete request
    if(!empty($arrayIdCitation)){


        $in  = str_repeat('?,', count($arrayIdCitation) - 1) . '?';
        $sql_request="SELECT * FROM citation
                            JOIN auteurs ON citation.idauteur=auteurs.idauteur
                            WHERE citation.idcit IN ($in)";
        $st = $db->prepare($sql_request);


        $st->execute($arrayIdCitation);

        $citations = [];

        //Save data in array
        while($ligne = $st->fetch()){
            $citations[] = [new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']),
                new Auteurs($ligne['idauteur'], $ligne['nom'], $ligne['prenom'], $ligne['audio'], $ligne['siecle'])];
        }
        $st=null;
    }
    ?>

    <div class="container">
        <?php foreach($citations as $each): ?>
            <div style="margin:10px" class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $each[0]->getTexte(); ?></h5>
                    <?php
                    $lien = "author.php/?prenom=".$each[1]->getNom()."&nom=".$each[1]->getPrenom();
                    ?>
                    <a data-toggle="modal" data-target="#exampleModal" onclick="generateModal('<?= $each[1]->getNom(); ?>', '<?= $each[1]->getPrenom(); ?>');" href="<?= $lien ?>" class="btn btn-primary"><?= $each[1]->getNom()." ".$each[1]->getPrenom(); ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="dynamicModal"></div>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

        var html = "";
        function generateModal(nom, prenom){
            html += '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header">';
            html += '<h5 class="modal-title" id="exampleModalLabel">'+nom+prenom+'</h5>';
            html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>';
            html += '</div><div class="modal-body">';
            html += '<?php var_dump($auteur->getNom());$_GET['nom'] = $auteur->getNom();$_GET['prenom'] = $auteur->getPrenom();include("author.php");?>';
            html += '</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button>';
            html += '</div></div></div></div>';

            $('#dynamicModal').html(html);
        }

    </script>
    <?php
endif
?>