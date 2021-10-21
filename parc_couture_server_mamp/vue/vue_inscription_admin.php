<?php include('header.php');
include('../connect/connect.php');?>

    <form class="form_sondage-admin" action="../controler/create_user.php" method="post">

        <div class="form_group">
            <p class="form_group-child">
                <label for="nom_user" class="form_label">Nom
                    <input type="text" value=""  id="nom_user" name="nom_user" required></label>
            </p>

            <p class="form_group-child">
                <label for="prenom_user">Prénom
                    <input type="text" value=""  id="prenom_user" name="prenom_user" required></label>
            </p>
        </div>

        <p class="form_group-child">
            <label for="rue_user">Adresse
                <input type="text" value=""  id="rue_user" name="rue_user" required></label>
        </p>

        <div class="form_group">
            <p class="form_group-child">
                <label for="cp_user">Code Postal
                    <input type="text" value="" size="5"  id="cp_user" name="cp_user" required></label>
            </p>

            <p class="form_group-child">
                <label for="ville_user">Ville
                    <input type="text" value=""  id="ville_user" name="ville_user" required></label>
            </p>
        </div>

        <p class="form_group-child">
            <label for="tel_user">Téléphone
                <input type="text" value=""  id="tel_user" name="tel_user" required placeholder="06..." size="10"></label>
        </p>

        <p class="form_group-child">
            <label for="mail_user">Adresse mail
                <input type="text" value=""  id="mail_user" name="mail_user" required></label>
        </p>

        <p class="form_group-child">
            <label for="identifiant_user">Identifiant
                <input type="text" value=""  id="identifiant_user" name="identifiant_user" required></label>
        </p>

        <div class="form_group">
            <p class="form_group-child">
                <label for="mdp_user">Mot de passe
                    <input type="password" value=""  id="mdp_user" name="mdp_user" required></label>
            </p>
        </div>

        <p class="form_group-child">
            <label for="mdp_admin">Mot de passe Admin
                <input type="password" value=""  id="mdp_admin" name="mdp_admin" required></label>
        </p>

        <p><input class="inscription_button" type="submit" value="Inscription"></p>
    </form>

<?php include('footer.php');
