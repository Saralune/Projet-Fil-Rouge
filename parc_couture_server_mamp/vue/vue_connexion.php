<?php include('header.php'); ?>

<div class="connexion">

    <form class="form_connexion" action="../controler/connexion_user.php" method="post">
        <label for="mail_user">Adresse mail :
        <input type="text" id="mail_user" name="mail_user" required></label><br>

        <label for="mdp_user">Mot de passe :
        <input type="password" id="mdp_user" name="mdp_user" required></label>

        <p><input class="inscription_button" type="submit" value="Connexion"></p>

        <!--<p><a>Mot de passe oublié ?</a></p>-->

        <a class="inscription" href="vue_inscription.php"><p class="">Je souhaite m'inscrire !</p></a>
    </form>
    
</div>

<?php include('footer.php'); ?>