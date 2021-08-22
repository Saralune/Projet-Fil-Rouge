<?php
/*-----------------------------------------------------
                    Requête préparée :


                    ///////////////A MODIFIER AVEC MES VARIABLES

-----------------------------------------------------*/ 
    try{
            //Préparation de la requete SQL, nous stockons dans une variable $req la requete à éxecuter
            $req = $bdd->prepare('INSERT INTO article(nom_article, contenu_article) values (:nom_article, :contenu_article)');
        
            //Exécution de la requête SQL, création à l'aide d'un tableau qui va contenir 
            //le ou les paramètres à affecter à la requête SQL
            $req->execute(array(
                'nom_article' => $name,
                'contenu_article' => $content
            ));

            //affichage des données d'une colonne de la bdd par son nom d'attribut
            echo '<p>' . $name .'</p>';
            echo '<p>' . $content .'</p>';

            //fermeture de la connexion à la bdd
            $req -> closeCursor();
    }
    catch(Exception $e)
    {
            //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }
