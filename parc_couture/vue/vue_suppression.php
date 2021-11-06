<?php
session_start();

include "../model/User.php";
include "../connect/connect.php";
include "header.php"; ?>

    <div class="user__inscription form_sondage">
        <p>Etes vous sûr de vouloir supprimer votre compte ?</p>
        <p><a class="inscription_button" href="../vue/vue_suppression_conf.php">Confirmer</a></p>
        <p><a class="inscription_button" href="../controler/connexion_user.php">Annuler</a></p>
    </div>

<?php include('footer.php');
