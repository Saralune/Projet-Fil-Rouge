<?php
//création de la session
session_start();

include('../model/User.php');
include('../connect/connect.php');

//test si les champs du formulaire sont remplis
if(!empty(isset($_POST['nom_user']))&& !empty(isset($_POST['prenom_user'])) && !empty(isset($_POST['rue_user']))
    && !empty(isset($_POST['cp_user'])) && !empty(isset($_POST['ville_user'])) && !empty(isset($_POST['tel_user']))
    && !empty(isset($_POST['identifiant_user'])) && !empty(isset($_POST['mdp_user']))) {

    //création d'un objet depuis les valeurs contenues dans le formulaire
    $user = new User(
        htmlspecialchars($_POST['nom_user']),
        htmlspecialchars($_POST['prenom_user']),
        $_SESSION['mailUser'],
        htmlspecialchars($_POST['rue_user']),
        htmlspecialchars((int)$_POST['cp_user']),
        htmlspecialchars($_POST['ville_user']),
        htmlspecialchars((int)$_POST['tel_user']),
        htmlspecialchars($_POST['identifiant_user']),
        htmlspecialchars($_POST['mdp_user'])
    );

    //test if inputs are corrects
        $checkCp = !preg_match("/[0-9]{5}/", $_POST['cp_user']);
        $checkTel = !preg_match("/[0-9]{10}/", $_POST['tel_user']);

        $textErrorForm = '';

        if($checkCp || $checkTel){
            if ($checkCp){
                $textErrorForm .= '<p>Le code postal est invalide !</p>';
            }
            if($checkTel){
                $textErrorForm .= '<p>Le téléphone est invalide !</p>';
            }
            //display an error msg
            echo '
                    <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>
    
                    <div class="user__inscription form_sondage"> 
                    ' .$textErrorForm. '
                        <p><a class="inscription_button" href="../vue/vue_modification_compte.php">Réessayer</a></p>
                    </div>
                ';
        }
        else {
            $user->hashMdp();
            if($_SESSION['connected'] &&
                password_verify($user->getMdpUser(), PASSWORD_BCRYPT) == password_verify($_POST['mdp_user'], PASSWORD_BCRYPT)){
                $user->updateUser($bdd);
                $user->generateSuperGlobale($bdd);
                echo '
                    <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>
    
                    <div class="user__inscription form_sondage">
                        <p>Votre compte a bien été modifié !</p>
                        <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
                        <p><a class="inscription_button" href="../vue/vue_profil.php">Mon compte</a></p>
                    </div>
                ';
            }
    }
}

//test si les champs de formulaire ne sont pas remplis
else {
    echo '<p>Merci de remplir tous les champs de formulaire.</p><div>';
}
