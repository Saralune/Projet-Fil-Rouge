<?php
    //création de la session
    session_start();

    include('../connect/connect.php');
    include('../model/User.php');
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/  
    //test existence des champs
    if(!empty(isset($_POST['mail_user'])) && !empty(isset($_POST['mdp_user']))){
        //création des 2 variables qui vont récupérer le contenu des super globales post
        $mail_user = htmlspecialchars($_POST['mail_user']);
        $mdp_user = htmlspecialchars($_POST['mdp_user']);

        //créé un nouvel user
        $user = new User("", "", "$mail_user", "", "", "", "", "", "$mdp_user");
        $user->hashMdp();

        //is user exists DB ?
        if($user->showUser($bdd)){
            //is mail & mdp match
            if($user->userConnnected($bdd)){
                $user->generateSuperGlobale($bdd);
                echo($_SESSION['admin']);
                if($_SESSION['connected'] && !$_SESSION['admin']){
                    //header("Location : http://localhost:8888/parc_couture/vue/vue_profil.php", true, 301);
                    echo '
                    <script>
                        window.location.href = "../vue/vue_profil.php";
                    </script>
                    ';
                    die();
                }
                if($_SESSION['connected'] && $_SESSION['admin']){
                    echo '
                    <script>
                        window.location.href = "../vue/vue_profil_admin.php";
                    </script>
                    ';
                    die();
                }
            }
            else {
                //mdp incorrect : error msg
                echo '
                <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>

                <div class="user__inscription form_sondage">
                    <p>Le mot de passe est incorrect.</p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Réessayer</a></p>
                </div>';
            }
        }
        else {
            //account doesn't exists
            echo '
                <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>

                <div class="user__inscription form_sondage">
                    <p>Le compte n\'existe pas.</p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Réessayer</a></p>
                    <p><a class="inscription_button" href="../vue/vue_inscription.php">S\'inscrire</a></p>
                </div>';
        }

    }
    else{
        echo'
            <link href="../vue/style_and_fonts/style.css" rel="stylesheet" type="text/css"/>

                <div class="user__inscription form_sondage">
                    <p>Merci de remplir tous les champs !</p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Réessayer</a></p>
                </div>
        ';
    }