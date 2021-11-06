<?php
//création de la session
session_start();

include('../connect/connect.php');
include('../model/Atelier.php');

/*UTILISER WIDTH POUR REGLER AU FORMAT DE LA PAGE*/

try {
    $reponse = $bdd->query('SELECT a.*, u.prenom_user FROM atelier a 
                                    INNER JOIN utilisateur_connecte u 
                                    ON a.id_user = u.id_user
                                    ORDER BY id_atelier DESC
                                    ');

    include '../vue/header.php';
    echo '<div class="flex-grow-1 form_sondage form_connexion user__information">';
    while($donnees = $reponse->fetch()) {

            $id = $donnees['id_atelier'];
            $nom = $donnees['nom_atelier'];
            $date = $donnees['date_atelier'];
            $description = $donnees['description_atelier'];
            $prix = $donnees['prix_atelier'];
            $animateur = $donnees['animateur_atelier'];
            $places = $donnees['places_atelier'];
            $id_user = $donnees['id_user'];
            $prenom_user = $donnees['prenom_user'];

            include '../vue/vue_ateliers.php';
/*            echo '
                    <div class="form_sondage width-page">
                        <h4 class="user__infos">Atelier n°' . $id . ' : </h4>
            
                        <div>
                            <p><strong>Nom :</strong> ' . $nom . '</p>
                            <p><strong>Date :</strong> ' . $date . '</p>
                            <p><strong>Animateur :</strong> ' . $animateur . '</p>
                            <p><strong>Description :</strong> ' . $description . '</p>
                            <p><strong>Prix :</strong> ' . $prix . '</p>
                            <p><strong>Nombre de places disponibles :</strong> ' . $places . '</p>
                            <p><strong>Créé par :</strong> ' . $prenom_user . '</p>
                        </div>
            
                        <p class="element_centre"><a class="inscription_button" href="../controler/delete_atelier.php">Supprimer</a></p>
                        <p class="element_centre"><a class="inscription_button" href="../vue/vue_update_atelier.php">Modifier</a></p>
            
                    </div>
                    ';*/


    }
    echo '</div>';
    include '../vue/footer.php';
    $reponse->close();
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}