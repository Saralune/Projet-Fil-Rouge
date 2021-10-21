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
    private $descritpion_atelier;

    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($nom_atelier, $date_atelier, $animateur_atelier, $prix_atelier, $descritpion_atelier)
    {
        $this->nom_atelier = $nom_atelier;
        $this->date_atelier = $date_atelier;
        $this->animateur_atelier = $animateur_atelier;
        $this->prix_atelier = $prix_atelier;
        $this->descritpion_atelier = $descritpion_atelier;
    }

    /*-----------------------------------------------------
                    Fonctions :
    -----------------------------------------------------*/

    //méthode ajout d'un utilisateur en bdd
    public function createAtelier($bdd)
    {
        //récupération des valeurs de l'objet
        $id_atelier = $this->getIdAtelier();
        $nom_atelier = $this->getNomAtelier();
        $date_atelier = $this->getDateAtelier();
        $animateur_atelier = $this->getAnimateurAtelier();
        $prix_atelier = $this->getPrixAtelier();
        $description_atelier = $this->getDescritpionAtelier();

        try
        {
            //requête ajout d'un atelier
            $req = $bdd->prepare('INSERT INTO atelier(nom_atelier, date_atelier, animateur_atelier, prix_atelier, description_atelier) 
                VALUES (:nom_atelier, :date_atelier, :animateur_atelier, :prix_atelier, :description_atelier)');
            //éxécution de la requête SQL
            $req->execute(array(
                'nom_atelier' => $nom_atelier,
                'date_atelier' => $date_atelier,
                'prix_atelier' => $prix_atelier,
                'animateur_atelier' => $animateur_atelier,
                'description_atelier' => $description_atelier,
            ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour vérifier si un atelier existe dans la bdd
    public function showAtelier($bdd)
    {
        //récupération des valeurs de l'objet
        $id_atelier = $this->getIdAtelier();
        $nom_atelier = $this->getNomAtelier();
        /*$prix_atelier = $this->getPrixAtelier();
        $date_atelier = $this->getDateAtelier();
        $animateur_atelier = $this->getAnimateurAtelier();
        $description_atelier = $this->getDescritpionAtelier();*/
        try
        {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM atelier WHERE id_atelier = '.$id_atelier.' OR nom_atelier = "'.$nom_atelier.'" 
                 LIMIT 1');
            //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {
                        echo("données");

            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }


    //méthode génération d'un token de connexion
    public function createToken($bdd)
    {
        //récuparation des valeurs de l'objet
        $id_atelier = $this->getIdAtelier();
        $nom_atelier = $this->getNomAtelier();
        //chaine token en clair
        $token = "$id_atelier$nom_atelier";
        //encodage en md5 du token
        $token = md5($token);
        //retourne le token
        return $token;
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
    public function setNomAtelier($nom_atelier)
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
    public function setDateAtelier($date_atelier)
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
    public function setAnimateurAtelier($animateur_atelier)
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
    public function setPrixAtelier($prix_atelier)
    {
        $this->prix_atelier = $prix_atelier;
    }

    /**
     * @return mixed
     */
    public function getDescritpionAtelier()
    {
        return $this->descritpion_atelier;
    }

    /**
     * @param mixed $descritpion_atelier
     */
    public function setDescritpionAtelier($descritpion_atelier)
    {
        $this->descritpion_atelier = $descritpion_atelier;
    }

}