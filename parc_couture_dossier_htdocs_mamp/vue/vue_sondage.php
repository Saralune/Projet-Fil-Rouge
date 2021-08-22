<?php include('header.php'); ?>

<div class="concept tarifs_box">           
    <h6>Sondage</h6>

    <div class="tarifs">
        <p>
            Afin de vous proposer le meilleur service dans notre parc 100% couture, nous vous proposons de répondre à ce court sondage.
            Vous pourrez ainsi être actrice (ou acteur !) de votre future visite.
            <br>
            <br>
            Merci de prendre de votre temps pour nous aider.
        </p>
    </div>
</div>

<div class="form_sondage">
    <form action="" method="post">
        <p><strong>- Sur une échelle de 1 à 5 <em>(1 étant peu enthousiaste et 5 très enthousiaste)</em>, 
            à quel point seriez-vous susceptible de venir au parc ? </strong>
            <div class="element_centre">
                <input type="radio" id="venue1" name="note_q1_sondage" value="1">
                <label for="venue1"> 1</label>
                <input type="radio" id="venue2" name="note_q1_sondage" value="2">
                <label for="venue2"> 2</label>
                <input type="radio" id="venue3" name="note_q1_sondage" value="3">
                <label for="venue3"> 3</label>
                <input type="radio" id="venue4" name="note_q1_sondage" value="4">
                <label for="venue4"> 4</label>
                <input type="radio" id="venue5" name="note_q1_sondage" value="5" checked>
                <label for="venue5"> 5</label>
            </div>
        </p>

        <p><label for="source"><strong>- Comment avez-vous entendu parler de notre parc ? </strong></label>
            <select name="note_q2_sondage" id="source">
                <option value="">Choisir une option</option>
                <option value="bouche_a_oreille">Bouche à oreille</option>
                <option value="reseaux_sociaux">Réseaux Sociaux</option>
                <option value="pub">Publicité</option>
                <option value="autre_source">Autre</option>
                <option value="nsp">Ne se prononce pas</option>
            </select>
        </p>

        <p><strong>- Quel(s) thème(s) vous parle le plus : </strong><br>
            <input type="checkbox" id="theme1" name="note_q3_sondage" value="initiation">
            <label for="theme1"> Initiation</label><br>
            <input type="checkbox" id="theme2" name="note_q3_sondage" value="upcycling">
            <label for="theme2"> Upcycling (surcyclage)</label><br>
            <input type="checkbox" id="theme3" name="note_q3_sondage" value="accessoires">
            <label for="theme3"> Accessoires (sacs, lingettes, trousses, ...)</label><br>
            <input type="checkbox" id="theme4" name="note_q3_sondage" value="vetements_enfants">
            <label for="theme4"> Vêtements bébés & enfants</label><br>
            <input type="checkbox" id="theme5" name="note_q3_sondage" value="vetements_adultes">
            <label for="theme5"> Vêtements femmes & hommes</label><br>
            <input type="checkbox" id="theme6" name="note_q3_sondage" value="autre">
            <label for="theme6"> Autre (précisez)</label>
            <input type="text" name="note_q3_sondage"><br>
        </p>

        <p><strong>- Quel est votre niveau en couture ? </strong><br>
            <input type="radio" id="niveau1" name="note_q4_sondage" value="debutant" checked>
            <label for="niveau1"> Débutant(e)</label><br>
            <input type="radio" id="niveau2" name="note_q4_sondage" value="intermediaire">
            <label for="niveau2"> Intérmédiaire</label><br>
            <input type="radio" id="niveau3" name="note_q4_sondage" value="confirme">
            <label for="niveau3"> Confirmé(e)</label><br>
            <input type="radio" id="niveau4" name="note_q4_sondage" value="professionnel">
            <label for="niveau4"> Professionnel(le)</label><br>
        </p>

        <p><strong>- Avez vous des remarques ou suggestions ? </strong><br>
        <textarea name="note_q5_sondage" rows="5" cols="70"></textarea>
        </p>

        <div class="element_centre"><input class="inscription_button" type="submit" value="Envoyer"></div>
    </form>
</div>

<?php include('footer.php'); ?>