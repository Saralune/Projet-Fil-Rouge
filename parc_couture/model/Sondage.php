<?php


class Sondage
{
    /*-----------------------------------------------------
                           Attributs :
  -----------------------------------------------------*/
    private $id_sondage;
    private $note_q1_sondage;
    private $note_q2_sondage;
    private $note_q3_sondage;
    private $note_q4_sondage;
    private $note_q5_sondage;
    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($note_q1_sondage,  $note_q2_sondage, $note_q3_sondage, $note_q4_sondage, $note_q5_sondage)
    {
        $this->note_q1_sondage = $note_q1_sondage;
        $this->note_q2_sondage = $note_q2_sondage;
        $this->note_q3_sondage = $note_q3_sondage;
        $this->note_q4_sondage = $note_q4_sondage;
        $this->note_q5_sondage = $note_q5_sondage;
    }
    /*-----------------------------------------------------
                    Getter and Setter :
    -----------------------------------------------------*/
    /**
     * @return mixed
     */
    public function getIdSondage()
    {
        return $this->id_sondage;
    }

    /**
     * @param mixed $id_sondage
     */
    public function setIdSondage($id_sondage)
    {
        $this->id_sondage = $id_sondage;
    }

    /**
     * @return mixed
     */
    public function getNoteQ1Sondage()
    {
        return $this->note_q1_sondage;
    }

    /**
     * @param mixed $note_q1_sondage
     */
    public function setNoteQ1Sondage($note_q1_sondage)
    {
        $this->note_q1_sondage = $note_q1_sondage;
    }

    /**
     * @return mixed
     */
    public function getNoteQ2Sondage()
    {
        return $this->note_q2_sondage;
    }

    /**
     * @param mixed $note_q2_sondage
     */
    public function setNoteQ2Sondage($note_q2_sondage)
    {
        $this->note_q2_sondage = $note_q2_sondage;
    }

    /**
     * @return mixed
     */
    public function getNoteQ3Sondage()
    {
        return $this->note_q3_sondage;
    }

    /**
     * @param mixed $note_q3_sondage
     */
    public function setNoteQ3Sondage($note_q3_sondage)
    {
        $this->note_q3_sondage = $note_q3_sondage;
    }

    /**
     * @return mixed
     */
    public function getNoteQ4Sondage()
    {
        return $this->note_q4_sondage;
    }

    /**
     * @param mixed $note_q4_sondage
     */
    public function setNoteQ4Sondage($note_q4_sondage)
    {
        $this->note_q4_sondage = $note_q4_sondage;
    }

    /**
     * @return mixed
     */
    public function getNoteQ5Sondage()
    {
        return $this->note_q5_sondage;
    }

    /**
     * @param mixed $note_q5_sondage
     */
    public function setNoteQ5Sondage($note_q5_sondage)
    {
        $this->note_q5_sondage = $note_q5_sondage;
    }
    /*-----------------------------------------------------
                     Fonctions :
    -----------------------------------------------------*/
    //méthode ajout d'un utilisateur en bdd
    public function createSurvey($bdd)
    {
        //récuparation des valeurs de l'objet
        $note_q1_sondage = $this->getNoteQ1Sondage();
        $note_q2_sondage = $this->getNoteQ2Sondage();
        $note_q3_sondage = $this->getNoteQ3Sondage();
        $note_q4_sondage = $this->getNoteQ4Sondage();
        $note_q5_sondage = $this->getNoteQ5Sondage();
        try
        {
            //requête ajout d'un utilisateur
            $req = $bdd->prepare('INSERT INTO utilisateur_connecte(note_q1_sondage, note_q2_sondage, note_q3_sondage, note_q4_sondage, note_q5_sondage) 
                VALUES (:note_q1_sondage, :note_q2_sondage, :note_q3_sondage, :note_q4_sondage, :note_q5_sondage)');
            //éxécution de la requête SQL
            $req->execute(array(
                'note_q1_sondage' => $note_q1_sondage,
                'note_q2_sondage' => $note_q2_sondage,
                'note_q3_sondage' => $note_q3_sondage,
                'note_q4_sondage' => $note_q4_sondage,
                'note_q5_sondage' => $note_q5_sondage,
            ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    //méthode pour vérifier si un utilisateur existe dans la bdd
    public function showSurvey($bdd)
    {
        //récupération des valeurs de l'objet
        $note_q1_sondage = $this->getNoteQ1Sondage();
        $note_q2_sondage = $this->getNoteQ2Sondage();
        $note_q3_sondage = $this->getNoteQ3Sondage();
        $note_q4_sondage = $this->getNoteQ4Sondage();
        $note_q5_sondage = $this->getNoteQ5Sondage();
        try
        {
            //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
            $reponse = $bdd->query('SELECT * FROM sondage WHERE note_q1_sondage = "'.$note_q1_sondage.'", 
                note_q2_sondage = "'.$note_q2_sondage.'",   note_q3_sondage = "'.$note_q3_sondage.'",
                note_q4_sondage = "'.$note_q4_sondage.'", note_q5_sondage = "'.$note_q5_sondage.'" 
                 LIMIT 1');
            //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {
                //TODO changer les données
                //return $donnees['mdp_user'];
                /*if($identifiant_user == $donnees['identifiant_user'])
                {
                    //retourne true si il existe
                    return true;
                }
                else
                {
                    return false;
                }*/
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
}