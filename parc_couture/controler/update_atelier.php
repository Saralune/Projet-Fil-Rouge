<?php
//création de la session
session_start();

include('../model/Atelier.php');
include('../connect/connect.php');

//test si les champs du formulaire sont remplis
if(!empty(isset($_POST['nom_atelier']))&& !empty(isset($_POST['date_atelier'])) && !empty(isset($_POST['description_atelier']))
    && !empty(isset($_POST['animateur_atelier'])) && !empty(isset($_POST['prix_atelier'])) && !empty(isset($_POST['places_atelier']))) {

    //création d'un objet depuis les valeurs contenues dans le formulaire
    $atelier = new Atelier(
        htmlspecialchars($_POST['nom_atelier']),
        htmlspecialchars($_POST['date_atelier']),
        htmlspecialchars($_POST['description_atelier']),
        htmlspecialchars($_POST['prix_atelier']),
        htmlspecialchars($_POST['animateur_atelier']),
        htmlspecialchars($_POST['places_atelier']),
    );
    $id_user = $_SESSION['idUser'];

    $checkDate = !preg_match("/^(\d{4}-\d{2}-\d{2}T\d{2}:\d{2}(:\d{2})?)$/gm", $_POST['date_atelier']);

    if (!$checkDate) {
        include '../vue/header.php';
        echo '
            <div class="user__inscription form_sondage"> 
                <p>La date est invalide !</p>
                <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Réessayer</a></p>
            </div>
    ';
        include '../vue/footer.php';
    }
    else {
        $atelier->updateAtelier($bdd);
        include '../vue/header.php';
        echo '
            <div class="user__inscription form_sondage">
               <p>L\'atelier a bien été modifié !</p>
               <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
               <p><a class="inscription_button" href="../controler/connexion_user.php">Compte</a></p>   
               <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Créer un atelier</a></p>
               <p><a class="inscription_button" href="../controler/display_atelier.php">Voir tous les ateliers</a></p> 
            </div>
        ';
        include '../vue/footer.php';
    }
}
else {

   $atelier_ = new Atelier(
        $this->getNomAtelier(),
    );

    //$nom = 'coucou';

/*    include '../vue/header.php';
    echo '
            <div class="user__inscription form_sondage">
               <p>Merci de remplir tous les champs !</p>
               <p><a class="inscription_button" href="../vue/vue_update_atelier.php">Réessayer</a></p> 
            </div>
        ';
    include '../vue/footer.php';*/
}


