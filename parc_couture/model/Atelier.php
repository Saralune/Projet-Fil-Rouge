<?php

class Atelier
{
    /*-----------------------------------------------------
                               Attributs :
    -----------------------------------------------------*/
    private $id_atelier;
    private $nom_atelier;
    private $date_atelier;
    private $animateur_atelier;
    private $prix_atelier;
    private $description_atelier;
    private $places_atelier;
    private $id_user;

    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($nom_atelier, $date_atelier, $description_atelier,
                                $prix_atelier, $animateur_atelier, $places_atelier)
    {
        $this->nom_atelier = $nom_atelier;
        $this->date_atelier = $date_atelier;
        $this->animateur_atelier = $animateur_atelier;
        $this->description_atelier = $description_atelier;
        $this->prix_atelier = $prix_atelier;
        $this->places_atelier = $places_atelier;
    }

    /*-----------------------------------------------------
                    Fonctions :
    -----------------------------------------------------*/

    //méthode ajout d'un utilisateur en bdd
    public function createAtelier($bdd) {
        $nom_atelier = $this->getNomAtelier();
        $date_atelier = $this->getDateAtelier();
        $description_atelier = $this->getDescriptionAtelier();
        $prix_atelier = $this->getPrixAtelier();
        $animateur_atelier = $this->getAnimateurAtelier();
        $places_atelier = $this->getPlacesAtelier();
        $id_user = $_SESSION['idUser'];

        try {
            $req = $bdd->prepare('INSERT INTO atelier(nom_atelier, date_atelier, description_atelier, 
                    prix_atelier, animateur_atelier, places_atelier, id_user) 
                        VALUES (:nom_atelier, :date_atelier, :description_atelier, 
                                :prix_atelier, :animateur_atelier, :places_atelier, :id_user)'
            );

            $req->execute(array(
                'nom_atelier' => $nom_atelier,
                'date_atelier' => $date_atelier,
                'description_atelier' => $description_atelier,
                'prix_atelier' => $prix_atelier,
                'animateur_atelier' => $animateur_atelier,
                'places_atelier' => $places_atelier,
                'id_user' => $id_user
            ));

            $req->close();
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour vérifier si un atelier existe dans la bdd
    public function showAtelier($bdd) {
        $id_atelier = $this->getIdAtelier();

        try {
            $reponse = $bdd->query('SELECT * FROM atelier WHERE id_atelier = "'.$id_atelier.'" LIMIT 1');

            while($donnees = $reponse->fetch()) {
                if($id_atelier == $donnees['id_atelier']) {
                    return true;
                }
                else {
                    return false;
                }
            }
            $reponse->close();
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function displayAtelier($bdd){
        $id_atelier = $this->getIdAtelier();

        try {
            $reponse = $bdd->query('SELECT a.nom_atelier, u.prenom_user FROM atelier a 
                                    INNER JOIN utilisateur_connecte u 
                                    ON a.id_user = u.id_user
                                    WHERE id_atelier = "'.$id_atelier.'" 
                                    ORDER BY id_atelier DESC
                                    ');


            while($donnees = $reponse->fetch()) {
                if($id_atelier == $donnees['id_atelier']) {
                    $id = $donnees['id_atelier'];
                    $nom = $donnees['nom_atelier'];
                    $date = $donnees['date_atelier'];
                    $description = $donnees['description_atelier'];
                    $prix = $donnees['prix_atelier'];
                    $animateur = $donnees['animateur_atelier'];
                    $places = $donnees['places_atelier'];
                    $id_user = $donnees['id_user'];
                    $prenom_user = $donnees['prenom_user'];

                    /*include '../vue/header.php';*/
                    echo '
                        <div class="flex-grow-1 form_sondage form_connexion user__information">
    
                            <div class="form_sondage width-page">
                                <h4 class="user__infos">Atelier n°' . $id . ' : </h4>
                    
                                <div>
                                    <p>Nom : ' . $nom . '</p>
                                    <p>Date : ' . $date . '</p>
                                    <p>Animateur : ' . $animateur . '</p>
                                    <p>Description : ' . $description . '</p>
                                    <p>Prix : ' . $prix . '</p>
                                    <p>Nombre de places disponibles : ' . $places . '</p>
                                    <p>Créé par : ' . $prenom_user . '<!--inner join avec n° id_user & nom_user--> </p>
                                </div>
                    
                    
                            </div>
                    
                        </div>
                    ';
                    /*include '../vue/footer.php';
                    die();*/
                }

            }
            $reponse->close();
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode de suppression d'un utilisateur
    public function deleteAtelier($bdd){
        //récupération des valeurs de l'objet
        $id_atelier = $this->getIdAtelier();

        try
        {
            //requête ajout d'un utilisateur
            $req = $bdd->prepare('DELETE FROM atelier WHERE id_atelier = '.$id_atelier.';');
            $req->execute();
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
        //fermeture de la connexion à la bdd
        $req->closeCursor();
    }

    //méthode mise à jour des informations d'un utilisateur nom et prénom
    public function updateAtelier($bdd)
    {
        $id_atelier = $this->getIdAtelier();
        $nom_atelier = htmlspecialchars($this->getNomAtelier());
        $date_atelier = htmlspecialchars($this->getDateAtelier());
        $description_atelier = htmlspecialchars($this->getDescriptionAtelier());
        $animateur_atelier = htmlspecialchars($this->getAnimateurAtelier());
        $prix_atelier = htmlspecialchars($this->getPrixAtelier());
        $places_atelier = htmlspecialchars($this->getPlacesAtelier());
        $id_user = $this->getIdUser();

        try
        {
            //requête modification d'un atelier
            $reponse = $bdd->prepare('UPDATE atelier 
                        SET nom_atelier = "'.$nom_atelier.'",
                        date_atelier = "'.$date_atelier.'",
                        description_atelier = "'.$description_atelier.'",
                        animateur_atelier = "'.$animateur_atelier.'",
                        prix_atelier = "'.$prix_atelier.'",
                        places_atelier = "'.$places_atelier.'",
                        id_user = "'.$id_user.'"
                        WHERE id_atelier = '.$id_atelier.' LIMIT 1');

            /*parler du champ modification
            places totales ou places restantes*/

            $reponse->execute(array(
                'nom_atelier' => $nom_atelier,
                'date_atelier' => $date_atelier,
                'description_atelier' => $description_atelier,
                'animateur_atelier' => $animateur_atelier,
                'prix_atelier' => $prix_atelier,
                'places_atelier' => $places_atelier,
                'id_user' => $id_user
            ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    public function getAtelier($bdd){
        $id_atelier = $this->getIdAtelier();

        try {
            $reponse = $bdd->query('SELECT * FROM atelier WHERE id_atelier = "'.$id_atelier.'" LIMIT 1');

            while($donnees = $reponse->fetch()) {
                if($id_atelier == $donnees['id_atelier']) {
                    $nom = $donnees['nom_atelier'];
                    $date = $donnees['date_atelier'];
                    $description = $donnees['description_atelier'];
                    $prix = $donnees['prix_atelier'];
                    $animateur = $donnees['animateur_atelier'];
                    $places = $donnees['places_atelier'];
                }
                /*else {

                }*/
            }
            $reponse->close();
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    /*-----------------------------------------------------
                Getter and Setter :
    -----------------------------------------------------*/
    /**
     * @return mixed
     */
    public function getIdAtelier()
    {
        return $this->id_atelier;
    }

    /**
     * @param mixed $id_atelier
     */
    public function setIdAtelier($id_atelier)
    {
        $this->id_atelier = $id_atelier;
    }

    /**
     * @return mixed
     */
    public function getNomAtelier()
    {
        return $this->nom_atelier;
    }

    /**
     * @param mixed $nom_atelier
     */
    public function setNomAtelier($nom_atelier): void
    {
        $this->nom_atelier = $nom_atelier;
    }

    /**
     * @return mixed
     */
    public function getDateAtelier()
    {
        return $this->date_atelier;
    }

    /**
     * @param mixed $date_atelier
     */
    public function setDateAtelier($date_atelier): void
    {
        $this->date_atelier = $date_atelier;
    }

    /**
     * @return mixed
     */
    public function getAnimateurAtelier()
    {
        return $this->animateur_atelier;
    }

    /**
     * @param mixed $animateur_atelier
     */
    public function setAnimateurAtelier($animateur_atelier): void
    {
        $this->animateur_atelier = $animateur_atelier;
    }

    /**
     * @return mixed
     */
    public function getPrixAtelier()
    {
        return $this->prix_atelier;
    }

    /**
     * @param mixed $prix_atelier
     */
    public function setPrixAtelier($prix_atelier): void
    {
        $this->prix_atelier = $prix_atelier;
    }

    /**
     * @return mixed
     */
    public function getDescriptionAtelier()
    {
        return $this->description_atelier;
    }

    /**
     * @param mixed $description_atelier
     */
    public function setDescriptionAtelier($description_atelier): void
    {
        $this->description_atelier = $description_atelier;
    }

    /**
     * @return mixed
     */
    public function getPlacesAtelier()
    {
        return $this->places_atelier;
    }

    /**
     * @param mixed $places_atelier
     */
    public function setPlacesAtelier($places_atelier): void
    {
        $this->places_atelier = $places_atelier;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }

}