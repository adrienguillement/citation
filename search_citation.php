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

<<<<<<< HEAD
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
                            new Auteurs($ligne['idauteur'], $ligne['nom'], $ligne['prenom'], $ligne['siecle'])];
        }
        $st=null;
    }
    //var_dump($citations);
=======
    while($ligne = $st->fetch()){
        $citations[] = [new Citation($ligne['idauteur'], $ligne['texte'], $ligne['idcit']),
                        new Auteurs($ligne['siecle'], $ligne['prenom'], $ligne['nom'], $ligne['image'], $ligne['idauteur'])];
>>>>>>> master

    }
?>

<div class="container">
<<<<<<< HEAD
            <?php foreach($citations as $each): ?>
                <div style="margin:10px" class="card" style="width: 30rem;">
                    <div class="card-body">
                    <h5 class="card-title"><?= $each[0]->getTexte(); ?></h5>
                    <p class="card-text"><?= $each[1]->getNom()." ".$each[1]->getPrenom() ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            <?php endforeach; ?>
=======
    <?php foreach($citations as $each): ?>
        <div style="margin:10px" class="card" style="width: 30rem;">
            <div class="card-body">
            <h5 class="card-title"><?= $each[0]->getTexte(); ?></h5>
            <?php
            $lien = "author.php/?prenom=".$each[1]->getPrenom()."&nom=".$each[1]->getNom();
            ?>
            <a href="<?= $lien ?>" class="btn btn-primary"><?= $each[1]->getPrenom()." ".$each[1]->getNom(); ?></a>
            </div>
>>>>>>> master
        </div>
    <?php endforeach; ?>
</div>
<?php
endif
?>