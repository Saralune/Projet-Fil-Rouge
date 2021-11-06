<?php
    //création de la session
    session_start();

    include('../connect/connect.php');
    include('../model/User.php');

    /*-----------------------------------------------------
                If user connected :
    -----------------------------------------------------*/
    if($_SESSION['connected']){
        $user_connected = new User(
            $_SESSION['nomUser'],
            $_SESSION['prenomUser'],
            $_SESSION['mailUser'],
            $_SESSION['rueUser'],
            $_SESSION['cpUser'],
            $_SESSION['villeUser'],
            $_SESSION['telUser'],
            $_SESSION['identifiantUser'],
            $_SESSION['mdpUser']
        );

        if($_SESSION['admin']){
            $user_connected->displayAdminAccount($bdd);
        } else {
            $user_connected->displayAccount($bdd);
        }
    }

    /*-----------------------------------------------------
                If user not connected :
    -----------------------------------------------------*/
    //test existence des champs
    if(!empty(isset($_POST['mail_user'])) && !empty(isset($_POST['mdp_user'])) && !$_SESSION['connected']) {
        //création des 2 variables qui vont récupérer le contenu des super globales post
        $mail_user = htmlspecialchars($_POST['mail_user']);
        $mdp_user = htmlspecialchars($_POST['mdp_user']);

        //créé un nouvel user
        $user = new User("", "", "$mail_user", "", "", "", "", "", "$mdp_user");
        $user->hashMdp();

        //is user exists DB ?
        if ($user->showUser($bdd)) {
            //is mail & mdp match
            if ($user->userConnnected($bdd)) {
                $user->generateSuperGlobale($bdd);

                if($_SESSION['admin']){
                    $user->displayAdminAccount($bdd);
                } else {
                    $user->displayAccount($bdd);
                }
            } else {
                include '../vue/header.php';
                echo '
                <div class="user__inscription form_sondage">
                    <p>Le mot de passe est incorrect.</p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Réessayer</a></p>
                </div>';
                include '../vue/footer.php';
            }
        } else {
            include '../vue/header.php';
            echo '
                <div class="user__inscription form_sondage">
                    <p>Le compte n\'existe pas.</p>
                    <p><a class="inscription_button" href="../vue/vue_connexion.php">Réessayer</a></p>
                    <p><a class="inscription_button" href="../vue/vue_inscription.php">S\'inscrire</a></p>
                </div>';
            include '../vue/footer.php';
        }
    }