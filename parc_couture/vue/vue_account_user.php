<?php
session_start();

include('../connect/connect.php');
include('../model/User.php');
include('../vue/header.php');
?>
<div class="flex-grow-1 form_sondage form_connexion user__information">

    <div class="form_sondage width-page">
        <h4 class="user__infos">Mes informations : </h4>
        <p>Mon nom : <?php echo $nom ?> </p>
        <p>Mon prénom : <?php echo$prenom ?> </p>
        <p>Mon adresse mail : <?php echo $mail ?> </p>
        <p>Mon adresse : <?php echo $rue . ',' . $cp . ' ' .$ville ?> </p>
        <p>Mon téléphone : <?php echo $tel ?> </p>
        <p>Mon identifiant : <?php echo $identifiant ?></p>
    </div>

    <p><a class="inscription_button" href="../vue/vue_suppression.php">Supprimer mon compte</a></p>
    <p><a class="inscription_button" href="../vue/vue_modification_compte.php">Modifier mon compte</a></p>
    <p><a class="inscription_button" href="../vue/vue_deconnexion.php">Déconnexion</a></p>

</div>

<?php include('../vue/footer.php');
