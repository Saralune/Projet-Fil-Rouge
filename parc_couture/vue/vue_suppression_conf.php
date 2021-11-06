<?php
session_start();

include "../model/User.php";
include "../connect/connect.php";
include "../vue/header.php";

$user = new User(
    $_SESSION['nomUser'],
    $_SESSION['prenomUser'],
    $_SESSION['mailUser'],
    $_SESSION['rueUser'],
    $_SESSION['cpidUser'],
    $_SESSION['villeidUser'],
    $_SESSION['telidUser'],
    $_SESSION['identifiantUser'],
    $_SESSION['mdpUser']
);

$user->deleteUser($bdd);
session_destroy();
?>

    <div class="user__inscription form_sondage">
        <p>Votre compte a bien été supprimé.</p>
        <p><a class="inscription_button" href="vue_home.php">Accueil</a></p>
    </div>

<?php include('../vue/footer.php');
