<?php
//include '../controler/display_atelier.php';
?>

<div class="form_sondage width-page">
    <h4 class="user__infos">Atelier n°<?php echo $id ?>: </h4>

    <div>
        <p><strong>Nom : </strong> <?php echo $nom ?></p>
        <p><strong>Date : </strong> <?php echo $date ?></p>
        <p><strong>Animateur : </strong> <?php echo $animateur ?></p>
        <p><strong>Description : </strong> <?php echo $description ?></p>
        <p><strong>Prix : </strong><?php echo $prix ?></p>
        <p><strong>Nombre de places disponibles : </strong> <?php echo $places ?></p>
        <p><strong>Créé par : </strong> <?php echo $prenom_user ?></p>
    </div>

    <p class="element_centre"><a class="inscription_button" id="atelier__delete<?php echo $id ?>" href="../controler/delete_atelier.php">Supprimer</a></p>
    <p class="element_centre"><a class="inscription_button" id="atelier__update<?php echo $id ?>" href="../vue/vue_update_atelier.php">Modifier</a></p>

</div>

<script>
    let btnUpdate<?php echo $id ?> = document.getElementById('atelier__update<?php echo $id ?>');

    btnUpdate<?php echo $id ?>.addEventListener('click', () => {

    });
</script>