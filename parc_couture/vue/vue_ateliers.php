<?php session_start(); ?>

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

    <p class="confirm_atelier">
        <button type="button" class="element_centre inscription_button"
                id="atelier__update<?php echo $id ?>" data-toggle="modal" data-target="#modalUpdateAtelier">
            Modifier
        </button>
    </p>
    <p class="confirm_atelier">
        <button type="button" class="inscription_button" id="atelier__delete<?php echo $id ?>">
            <strong>Supprimer</strong>
        </button>
    </p>

</div>

<script>
    let btnUpdate<?php echo $id ?> = document.getElementById('atelier__update<?php echo $id ?>');
    /*let btnDelete<?php /*echo $id */?> = document.getElementById('atelier__delete<?php /*echo $id*/ ?>');*/

    btnUpdate<?php echo $id ?>.addEventListener('click', () => {
        $('#modalUpdateAtelier<?php echo $id ?>').modal('show');
    });

    /*btnDelete<?php /*echo $id*/ ?>.addEventListener('click', () => {
        window.location.href = "../controler/delete_atelier.php";
    });*/

</script>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalUpdateAtelier<?php echo $id ?>"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Modification de l'atelier n°<?php echo $id ?></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>

            <div class="modal-body">
                <form class="form_sondage" action="../controler/update_atelier.php" method="post">

                    <input type="hidden" value="<?php echo $id ?>" name="id_atelier" id="id_atelier">

                    <div class="atelier__grid">
                        <label for="nom_atelier" class="form_label row-1 grid-col-1">Titre de l'atelier :</label>
                        <input type="text" value="<?php echo $nom ?>" class="grid-col-2 grid-row row-1"
                               name="nom_atelier" id="nom_atelier" required>

                        <label for="date_atelier" class="form_label row-2 grid-col-1">Date de l'atelier :</label>
                        <input type="datetime-local" value="<?php echo $date ?>" class="grid-col-2 grid-row row-2"
                               name="date_atelier" id="date_atelier" required>

                        <label for="animateur_atelier" class="form_label row-3 grid-col-1">Animateur de l'atelier :</label>
                        <input type="text" value="<?php echo $animateur ?>" class="grid-col-2 grid-row row-3"
                               name="animateur_atelier" id="animateur_atelier" required>


                        <label for="prix_atelier" class="form_label row-4 grid-col-1">Prix de l'atelier :</label>
                        <input type="number" value="<?php echo $prix ?>" class="grid-col-2 grid-row row-4"
                               name="prix_atelier" id="prix_atelier" required>


                        <label for="places_atelier" class="form_label row-5 grid-col-1">Nombre de places :</label>
                        <input type="number" value="<?php echo $places ?>" class="grid-col-2 grid-row row-5"
                               name="places_atelier" id="places_atelier" required>

                        <label for="description_atelier" class="form_label row-6 grid-col-1">Description :</label>
                        <textarea class="grid-col-2 grid-row row-6" name="description_atelier" rows="5"
                                  id="description_atelier" required><?php echo $description ?></textarea>
                    </div>

                    <p class="confirm_atelier"><input class="inscription_button" type="submit" value="Confirmer"></p>
                    <p class="confirm_atelier"><button type="button" class="cancel_button" data-bs-dismiss="modal">Annuler</button></p>

                </form>
            </div>

        </div>
    </div>
</div>