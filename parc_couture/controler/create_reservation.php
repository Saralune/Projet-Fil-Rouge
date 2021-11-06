<?php
    //connexion à la BDD
    include('../connect/connect.php');

    //ajout de la vue
    include('../vue/vue_reservation.php');

    //test existence de l'atelier
    if(!empty(isset($_GET['nom_atelier']))
        && !empty(isset($_GET['date_atelier']))
        && !empty(isset($_GET['animateur_atelier']))
        && !empty(isset($_GET['prix_atelier']))
        && !empty(isset($_GET['description_atelier']))){

        //création des 2 variables qui vont récupérer le contenu des super globales post
        $nom = htmlspecialchars($_GET['nom_atelier']);
        $date = htmlspecialchars($_GET['date_atelier']);
        $animateur = htmlspecialchars($_GET['animateur_atelier']);
        $prix = htmlspecialchars($_GET['prix_atelier']);
        $description = htmlspecialchars($_GET['description_atelier']);
    }
    else{
        //affichage dans la page html de ce que l'on a enregistré en bdd
        echo'<p>Veuillez remplir les champs de formulaire</p>';
    }