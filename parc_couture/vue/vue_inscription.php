<?php include('header.php');
include('../connect/connect.php');?>

<form class="form_sondage" action="../controler/create_user.php" method="post">

    <h2>Inscription : </h2>
    <p></p>

    <div class="inscription__grid">

        <label for="nom_user" class="form_label grid-col-1 row-1">Nom</label>
        <input type="text" class="grid-col-2 grid-row row-1"  id="nom_user" name="nom_user" required>

        <label for="prenom_user" class="form_label grid-col-3 row-1">Prénom</label>
        <input type="text" class="grid-col-4 grid-row row-1" id="prenom_user" name="prenom_user" required>

        <label for="rue_user" class="form_label grid-col-1 row-2">Adresse</label>
        <input type="text" class="grid-col-2-span-all row-2-span grid-row"  id="rue_user" name="rue_user" required>

        <label for="ville_user" class="form_label grid-col-1 row-3">Ville</label>
        <input type="text" class="grid-col-2 row-3 grid-row" id="ville_user" name="ville_user" required>

        <label for="cp_user" class="form_label grid-col-3 row-3">Code Postal</label>
        <input type="text" size="5" class="grid-col-4 row-3 grid-row" id="cp_user" name="cp_user" required>

        <label for="tel_user" class="form_label grid-col-1 row-4">Téléphone</label>
        <input type="text" id="tel_user" class="grid-col-2 row-4 grid-row" name="tel_user" required placeholder="06..." size="10">


        <label for="mail_user" class="form_label grid-col-1 row-5">Adresse mail</label>
        <input type="text" id="mail_user" class="grid-col-2 row-5 grid-row" name="mail_user" required>


        <label for="identifiant_user" class="form_label grid-col-3 row-5">Identifiant</label>
        <input type="text" id="identifiant_user" class="grid-col-4 row-5 grid-row" name="identifiant_user" required>


        <label for="mdp_user" class="form_label grid-col-1 row-6">Mot de passe</label>
        <input type="password" id="mdp_user" class="grid-col-2 row-6 grid-row" name="mdp_user" required>

    </div>

    <p class="confirm_atelier"><input class="inscription_button" type="submit" value="Inscription"></p>
       <!-- <p class="form_group-child">
            <label for="repeat_mdp_user">Confirmation mot de passe
            <input type="password" value=""  name="repeat_mdp_user" required></label>
        </p>-->
</form>




<?php include('footer.php'); ?>