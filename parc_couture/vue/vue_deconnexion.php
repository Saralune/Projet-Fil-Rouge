<?php
session_start();
session_destroy();

echo '   
   <link href="style_and_fonts/style.css" rel="stylesheet" type="text/css"/>     
    <div class="user__inscription form_sondage flex-grow-1">
        <p>Vous avez été déconnecté avec succès.</p>
        <p><a class="inscription_button" href="../vue/vue_home.php">Accueil</a></p>
    </div>
    ';