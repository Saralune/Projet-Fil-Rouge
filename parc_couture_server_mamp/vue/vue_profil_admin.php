<?php
session_start();

include('connect/connect.php');
include('model/User.php');

if(!$_SESSION['connected'] && !$_SESSION['admin']){
    echo '     
        <link href="style_and_fonts/style.css" rel="stylesheet" type="text/css"/>  
         
        <div class="user__inscription form_sondage">
            <p>Vous n\'êtes pas autorisé à vous connecter en tant qu\'administrateur.</p>
            <p><a class="inscription_button" href="vue_home.php">Accueil</a></p>
            <p><a class="inscription_button" href="vue_connexion.php">Connexion</a></p>
            <p><a class="inscription_button" href="vue_inscription.php">Inscription</a></p>
        </div>
        ';
    die();
}

include('header.php'); ?>

<div class="flex-grow-1 form_sondage-admin form_connexion user__information">

    <div class="form_sondage-admin width-page">

        <h4 class="user__infos">Mes informations : </h4>

        <h5 class="form_sondage-admin admin__info">Je suis admin !</h5>

        <p>Mon nom : <?php echo $_SESSION['nomUser'] ?></p>
        <p>Mon prénom : <?php echo $_SESSION['prenomUser'] ?></p>
        <p>Mon adresse mail : <?php echo $_SESSION['mailUser'] ?></p>
        <p>Mon adresse : <?php echo ($_SESSION['rueUser'] .', '. $_SESSION['cpUser'] .' '. $_SESSION['villeUser'] ) ?></p>
        <p>Mon téléphone : <?php echo $_SESSION['telUser'] ?></p>
        <p>Mon identifiant : <?php echo $_SESSION['identifiantUser'] ?></p>
    </div>

    <p><a class="inscription_button-admin" href="#">Ajouter un atelier</a></p>
    <p><a class="inscription_button-admin" href="#">Modifier un atelier</a></p>

    <p></p>

    <p><a class="inscription_button" href="vue_suppression.php">Supprimer mon compte</a></p>
    <p><a class="inscription_button" href="vue_modification_compte.php">Modifier mon compte</a></p>
    <p><a class="inscription_button" href="vue_deconnexion.php">Déconnexion</a></p>

</div>

<?php include('footer.php'); ?>

