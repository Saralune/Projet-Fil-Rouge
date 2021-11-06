<?php
//création de la session
session_start();

include('../model/User.php');
include('../connect/connect.php');

    //test si les champs du formulaire sont remplis
    if(!empty(isset($_POST['nom_user']))&& !empty(isset($_POST['prenom_user'])) && !empty(isset($_POST['mail_user'])) && !empty(isset($_POST['rue_user']))
        && !empty(isset($_POST['cp_user'])) && !empty(isset($_POST['ville_user'])) && !empty(isset($_POST['tel_user']))
        && !empty(isset($_POST['identifiant_user'])) && !empty(isset($_POST['mdp_user']))) {

        //création d'un objet depuis les valeurs contenues dans le formulaire
        $user = new User(
            htmlspecialchars($_POST['nom_user']),
            htmlspecialchars($_POST['prenom_user']),
            htmlspecialchars($_POST['mail_user']),
            htmlspecialchars($_POST['rue_user']),
            htmlspecialchars((int)$_POST['cp_user']),
            htmlspecialchars($_POST['ville_user']),
            htmlspecialchars((int)$_POST['tel_user']),
            htmlspecialchars($_POST['identifiant_user']),
            htmlspecialchars($_POST['mdp_user'])
        );

        //test si l'utilisateur existe déja
        if($user->showUser($bdd) && !$_SESSION['connected']) {
            //réponse si l'utilisateur existe déja
            echo '<p>L\'utilisateur <span>'.$_POST['mail_user'].'</span> existe déjà.</p><div>';
        }

        if($user->getAdmin() === 1){
            echo'je suis admin';
            //création d'un nouvel admin
            $admin = new Admin(
                $user->getNomUser(),
                $user->getPrenomUser(),
                $user->getMailUser(),
                $user->getIdentifiantUser(),
                $user->getMdpUser()
            );
        }

        //test if inputs are corrects
        else {
            $checkEmail = !preg_match("/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]{2}+/", $_POST['mail_user']);
            $checkCp = !preg_match("/[0-9]{5}/", $_POST['cp_user']);
            $checkTel = !preg_match("/[0-9]{10}/", $_POST['tel_user']);

            $textErrorForm = '';

            if($checkEmail || $checkCp || $checkTel){
                if($checkEmail){
                    $textErrorForm .= '<p>L\'email est invalide !</p>';
                }
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
                        <p><a class="inscription_button" href="../vue/vue_inscription.php">Réessayer</a></p>
                    </div>
                ';
            }
            else {
                $user->hashMdp();
                $user->createUser($bdd);
                //réponse si l'utilisateur existe déja
                //echo '<p>l\'utilisateur <span>'.$_POST['identifiant_user'].'</span> à bien été ajouté.</p><div>';

                echo '
                <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>

                <div class="user__inscription form_sondage">
                    <p>Votre compte a bien été créé !</p>
                    <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Connexion</a></p>
                </div>
            ';
            }
        }

    }

    //test si les champs de formulaire ne sont pas remplis
    else {
        echo '<p>Merci de remplir tous les champs de formulaire.</p><div>';
    }
