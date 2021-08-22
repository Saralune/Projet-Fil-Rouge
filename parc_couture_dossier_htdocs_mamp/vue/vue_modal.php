<!-- Modal-->

<!--DIV ID fullCalendar for eventClick // Do I really need this one ??
<div id="bootstrapModalFullCalendar"></div>-->

<!--https://getbootstrap.com/docs/5.1/components/modal/#using-the-grid-->
<div class="modal fade" id="fullCalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!--modal-lg donne une grande fenêtre dans la page//-->
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">[Nom de l'évenement cliqué...]</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>

        <div class="modal-body" id="modalBody">
            <p>Ceci est le corps du modal.</p>

            <!--VOIR POUR INSTALLER UN POPOVER SUR UN "I" INFORMATION (genre infobulle)
            <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-bs-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>-->

            <p>Insérer ici les colonnes afin d'organiser la page comme sur la maquette</p>
            <p>Ainsi, nous pourrons dominer le monde. De la couture.</p>

            <!--.ms-auto : push elements on the right-->
            <!--.me-auto : push elements on the left (and the others, after the element with .me-auto, are on the right of the windows)-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">ROW 1 - .col-md-4</div>
                    <div class="col-md-4 ms-auto"> ROW 1 - .col-md-4 .ms-auto</div>
                </div>
                <div class="row">
                    <div class="col-md-3 ms-auto">ROW 2 - .col-md-3 .ms-auto</div>
                    <div class="col-md-2 ms-auto">ROW 2 - .col-md-2 .ms-auto</div>
                </div>
                <div class="row">
                    <div class="col-md-6 ms-auto">ROW 3 - .col-md-6 .ms-auto</div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        ROW 4 - Level 1: .col-sm-9
                        <div class="row">
                            <div class="col-8 col-sm-6">
                                ROW 5 - Level 2: .col-8 .col-sm-6
                            </div>
                            <div class="col-4 col-sm-6">
                                ROW 5 - Level 2: .col-4 .col-sm-6
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <a class="inscription_button" id="eventUrl" target="_blank">Ajouter au panier</a>
            <!--bouton "ajouter au panier" avec modal de bootstrap (remplace le <a>) <button type="button" class="inscription_button">Ajouter au panier</button>-->
        </div>
    </div>
  </div>
</div>






