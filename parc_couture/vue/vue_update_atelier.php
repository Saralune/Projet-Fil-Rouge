<?php
include '../controler/update_atelier.php';
include '../vue/header.php'; ?>

    <!-- Modal -->
<!--    <div class="modal fade" id="modalUpdateAtelier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>-->

<!--
    <form class="form_sondage" action="../controler/update_atelier.php" method="post">
        <h2>Modification de l'atelier : </h2>

        <div class="atelier__grid">
            <label for="nom_atelier" class="form_label row-1 grid-col-1">Titre de l'atelier :</label>
            <input type="text" value="<?php /*echo $nom */?>" class="grid-col-2 grid-row row-1" name="nom_atelier" id="nom_atelier" required>

            <label for="date_atelier" class="form_label row-2 grid-col-1">Date de l'atelier :</label>
            <input type="datetime-local" value="" class="grid-col-2 grid-row row-2" name="date_atelier" id="date_atelier" required>

            <label for="animateur_atelier" class="form_label row-3 grid-col-1">Animateur de l'atelier :</label>
            <input type="text" value="" class="grid-col-2 grid-row row-3" name="animateur_atelier" id="animateur_atelier" required>


            <label for="prix_atelier" class="form_label row-4 grid-col-1">Prix de l'atelier :</label>
            <input type="number" value="" class="grid-col-2 grid-row row-4" name="prix_atelier" id="prix_atelier" required>


            <label for="places_atelier" class="form_label row-5 grid-col-1">Nombre de places :</label>
            <input type="number" value="" class="grid-col-2 grid-row row-5" name="places_atelier" id="places_atelier" required>

            <label for="description_atelier" class="form_label row-6 grid-col-1">Description :</label>
            <!--            <input type="text" value="" class="grid-col-2 grid-row row-6" name="description_atelier" id="description_atelier" size="50" required>
            -->
            <textarea class="grid-col-2 grid-row row-6" name="description_atelier" rows="5" id="description_atelier" required><?php /*echo 'coucou' */?></textarea>

        </div>
        <p></p>

        <p class="confirm_atelier"><input class="inscription_button" id="confirm_atelier" type="submit" value="Modifier"></p>

    </form>
-->
<?php include '../vue/footer.php';
