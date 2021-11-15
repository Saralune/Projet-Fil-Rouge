<?php
session_start();
include  '../connect/connect.php';
include '../model/Atelier.php';

try{
    if(!empty(isset($_POST['nom_atelier'])) && !empty(isset($_POST['date_atelier']))
        && !empty(isset($_POST['description_atelier'])) && !empty(isset($_POST['prix_atelier']))
        && !empty(isset($_POST['animateur_atelier'])) && !empty(isset($_POST['places_atelier']))) {

        $atelier = new Atelier(
            htmlspecialchars($_POST['nom_atelier'], ENT_NOQUOTES),
            htmlspecialchars($_POST['date_atelier']),
            htmlspecialchars($_POST['description_atelier'], ENT_NOQUOTES),
            htmlspecialchars($_POST['prix_atelier']),
            htmlspecialchars($_POST['animateur_atelier']),
            htmlspecialchars($_POST['places_atelier'])
        );
        $id_user = $_SESSION['idUser'];

        if ($atelier->showAtelier($bdd)) {
            include '../vue/header.php';
            echo '
                <div class="user__inscription form_sondage"> 
                    <p>L\'atelier existe déjà !</p>
                    <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Réessayer</a></p>
                </div>
                ';
            include '../vue/footer.php';
        }

        else {
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
                try{
                    $atelier->createAtelier($bdd);
                    include '../vue/header.php';
                    echo '
                <div class="user__inscription form_sondage">
                   <p>L\'atelier a bien été créé !</p>
                   <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
                   <p><a class="inscription_button" href="../controler/connexion_user.php">Compte</a></p>   
                   <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Créer un autre atelier</a></p>
                   <p><a class="inscription_button" href="../controler/display_atelier.php">Voir tous les ateliers</a></p> 
                </div>
            ';
                    include '../vue/footer.php';
                }
                catch(Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }
            }
        }
    }
    else{
        include '../vue/header.php';
        echo '
            <div class="user__inscription form_sondage"> 
                <p>Merci de remplir tous les champs !</p>
                <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Réessayer</a></p>
            </div>
        ';
        include '../vue/footer.php';
    }

} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
