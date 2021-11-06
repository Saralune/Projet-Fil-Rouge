<?php
session_start();
include "../connect/connect.php";
include "../model/Atelier.php";

$atelier = new Atelier(
/*    $this->getNomAtelier(),
    $this->getDateAtelier(),
    $this->getDescriptionAtelier(),
    $this->getPrixAtelier(),
    $this->getAnimateurAtelier(),
    $this->getPlacesAtelier(),*/
);

$atelier->deleteAtelier($bdd);

include "../vue/header.php";
echo'
    <div class="user__inscription form_sondage">
        <p>L\'atelier a bien été supprimé.</p>
        <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
        <p><a class="inscription_button" href="../controler/connexion_user.php">Mon compte</a></p>
        <p><a class="inscription_button" href="../vue/vue_creation_atelier.php">Créer un atelier</a></p>
        <p><a class="inscription_button" href="../controler/display_atelier.php">Voir les atelier</a></p>
    </div>
';
include('../vue/footer.php');
