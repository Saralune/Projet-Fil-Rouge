<?php
session_start();
include ('header.php');
include ('../model/User.php');
?>

<form class="form_sondage flex-grow-1" action="../controler/update_user.php" method="post">

    <div class="">
        <div class="form_group">
            <p class="form_group-child">
                <label for="nom_user" class="form_label">Nom
                    <input type="text" value="<?php echo $_SESSION['nomUser']; ?>"  id="nom_user" name="nom_user" required></label>
            </p>

            <p class="form_group-child">
                <label for="prenom_user">Prénom
                    <input type="text" value="<?php echo $_SESSION['prenomUser']; ?>"  id="prenom_user" name="prenom_user" required></label>
            </p>
        </div>

        <p class="form_group-child">
            <label for="rue_user">Adresse
                <input type="text" value="<?php echo $_SESSION['rueUser']; ?>"  id="rue_user" name="rue_user" required></label>
        </p>

        <div class="form_group">
            <p class="form_group-child">
                <label for="cp_user">Code Postal
                    <input type="text" value="<?php echo $_SESSION['cpUser']; ?>" size="5"  id="cp_user" name="cp_user" required></label>
            </p>

            <p class="form_group-child">
                <label for="ville_user">Ville
                    <input type="text" value="<?php echo $_SESSION['villeUser']; ?>"  id="ville_user" name="ville_user" required></label>
            </p>
        </div>

        <p class="form_group-child">
            <label for="tel_user">Téléphone
                <input type="text" value="<?php echo $_SESSION['telUser']; ?>"  id="tel_user" name="tel_user" size="10" required placeholder="06..."></label>
        </p>

        <p class="form_group-child">
            <label for="identifiant_user">Identifiant
                <input type="text" value="<?php echo $_SESSION['identifiantUser']; ?>"  id="identifiant_user" name="identifiant_user" required></label>
        </p>

        <div class="form_group">
            <p class="form_group-child">
                <label for="mdp_user">Mot de passe
                    <input type="password" placeholder="Confirmez votre mot de passe" size="30"  id="mdp_user" name="mdp_user" required></label>
            </p>

        </div>

        <input type="hidden" value="<?php echo $_SESSION['mailUser']; ?>"  id="mail_user" name="mail_user" required>
        <p><input class="inscription_button" type="submit" value="Modifier"></p>
        <p><a class="inscription_button" href="../controler/connexion_user.php">Annuler</a></p>
    </div>

</form>

<?php include "footer.php";