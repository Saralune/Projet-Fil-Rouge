<?php
    //création de la session
    session_start();

    /*-----------------------------------------------------
                        Imports :
    -----------------------------------------------------*/ 
    //ajout de la vue page connexion
    include('../vue/vue_connexion.php');
    //connexion à la BDD
    include('../connect/connect.php');


    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/  
    //test existence des champs nom_article et conntenu_article
    if(!empty(isset($_POST['nom_article'])) && !empty(isset($_POST['contenu_article']))){
        //création des 2 variables qui vont récupérer le contenu des super globales post
        $name = htmlspecialchars($_POST['nom_article']);
        $content = htmlspecialchars($_POST['contenu_article']);
 
        //ajout du model
        include('../model/model_connexion.php');
    }
    else{
        //affichage dans la page html de ce que l'on a enregistré en bdd
        echo'<p>Veuillez remplir les champs de formulaire</p>';
    }

    /*-----------------------------------------------------
                Gestion des messages d'erreurs :
    -----------------------------------------------------*/