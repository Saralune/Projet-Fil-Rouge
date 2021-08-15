<?php

    //ajout de la vue
    include('../vue/vue_reservation.php');

    //connexion à la BDD
    include('../connect/connect.php');

    //test existence des champs nom_article et conntenu_article
    if(!empty(isset($_POST['nom_article'])) && !empty(isset($_POST['contenu_article']))){
        //création des 2 variables qui vont récupérer le contenu des super globales post
        $name = htmlspecialchars($_POST['nom_article']);
        $content = htmlspecialchars($_POST['contenu_article']);
 
        //ajout du model
        include('../model/model_reservation.php');
    }
    else{
        //affichage dans la page html de ce que l'on a enregistré en bdd
        echo'<p>Veuillez remplir les champs de formulaire</p>';
    }