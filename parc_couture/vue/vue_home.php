
<?php include('header.php'); ?>

        <!--Sondage & Tutos-->
        <div class="pastilles">
            <a href="../vue/vue_sondage.php">
                <img class="sondage" src="pics/icon_sondage.png" alt="Lien pour accéder au sondage" />
            </a>
            <a href="../vue/vue_tutos.php">
                <img class="tutos" src="pics/icon_tutos.png" alt="Lien pour accéder aux tutos" />
            </a>
        </div>

        <!--Carousel-->
        <div id="carousel_id" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../vue/pics/pic3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Réalisation</h5>
                        <p>Ce que vous pourrez faire après 2h chez nous.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../vue/pics/" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Réalisation</h5>
                        <p>Ce que vous pourrez faire après UNE après-midi au parc.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../vue/pics/" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Rencontre</h5>
                        <p>Venez nous voir !</p>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>

        </div>

        <!--Calendrier & Concept-->
        <div class="calendar_concept">

            <!--EN COURS - Aperçu du calendrier de réservation-->
            <div class="calendrier">
                <h6>Ceci est un calendrier</h6>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores quia tenetur nobis harum quo? Consequuntur ipsam rerum, praesentium porro quibusdam deleniti culpa voluptatibus libero ad, possimus saepe delectus explicabo perspiciatis?
                    Deleniti consequuntur aspernatur placeat ipsum, eius ipsa, ratione optio ab, similique suscipit maxime nemo laboriosam a accusamus excepturi velit. Neque aut magnam asperiores optio ad, quas maxime dolorem fuga at!
                    Iste aspernatur hic facere facilis omnis, nam tempore sunt vitae cum possimus minus deleniti veritatis, fugiat delectus libero ducimus quos alias totam? Nobis, at. Vitae magnam praesentium soluta. Suscipit, at.
                </p>
            </div>

            <!--Concept-->
            <div class="concept">
                <h6>Notre concept...</h6>
                <p>
                    Passionnés de couture, nous avons voulu la rendre accessible tous ! <br>
                    A travers ce parc et ses activités mais aussi avec ses ateliers en ligne et ses patrons de couture à télécharger.
                </p>

                <p>
                    N’hésitez pas à participer à notre sondage afin de pouvoir vous proposer ce qu'il y a de meilleur. <br>
                    Votre avis nous intéresse !
                </p>
            </div>
        </div>

<?php include('footer.php'); ?>
