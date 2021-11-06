<?php

session_start();
include '../connect/connect.php';
include '../model/Atelier.php';
try {
    //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
    $reponse = $bdd->query('SELECT id_atelier as id, nom_atelier as title, date_atelier as start, 
       description_atelier as description, prix_atelier as price, animateur_atelier as animateur, places_atelier as places
                            FROM atelier');

    //variable $output (Arraylist) contenant le résultat de la requéte
    $output = $reponse->fetchAll(PDO::FETCH_ASSOC); //retourne une Arraylist

} catch (Exception $e) {
    //affichage d'une exception en cas d’erreur
    die('Erreur : ' . $e->getMessage());
}

echo json_encode($output);

