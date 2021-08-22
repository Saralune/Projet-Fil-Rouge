<?php include('header.php'); ?>

<div class="connexion">

    <form class="form_connexion" action="vue_profil.php" method="post">
        <p>Adresse mail :   <input type="text" name="mail_utilisateur"></p><br>
        <p>Mot de passe :  <input type="password" name="mdp_utilisateur"></p> 

        <p><input class="inscription_button" type="submit" value="Connexion"></p>

        <a class="inscription" href="#"><p class="">Je souhaite m'inscrire !</p></a>
    
    </form>
    
</div>

<?php include('footer.php'); ?>