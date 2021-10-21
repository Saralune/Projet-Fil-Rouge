<?php


class Admin
{
    /*-----------------------------------------------------
                           Attributs :
  -----------------------------------------------------*/
    private $id_admin;
    private $nom_admin;
    private $prenom_admin;
    private $mail_admin;
    private $identifiant_admin;
    private $mdp_admin;
    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($nom_admin,  $prenom_admin, $mail_admin, $identifiant_admin, $mdp_admin)
    {   $this->nom_admin = $nom_admin;
        $this->prenom_admin = $prenom_admin;
        $this->mail_admin = $mail_admin;
        $this->identifiant_admin = $identifiant_admin;
        $this->mdp_admin = $mdp_admin;
    }
    /*-----------------------------------------------------
                    Getter and Setter :
    -----------------------------------------------------*/
    /**
     * @return mixed
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param mixed $id_admin
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;
    }

    /**
     * @return mixed
     */
    public function getNomAdmin()
    {
        return $this->nom_admin;
    }

    /**
     * @param mixed $nom_admin
     */
    public function setNomAdmin($nom_admin)
    {
        $this->nom_admin = $nom_admin;
    }

    /**
     * @return mixed
     */
    public function getPrenomAdmin()
    {
        return $this->prenom_admin;
    }

    /**
     * @param mixed $prenom_admin
     */
    public function setPrenomAdmin($prenom_admin)
    {
        $this->prenom_admin = $prenom_admin;
    }

    /**
     * @return mixed
     */
    public function getMailAdmin()
    {
        return $this->mail_admin;
    }

    /**
     * @param mixed $mail_admin
     */
    public function setMailAdmin($mail_admin)
    {
        $this->mail_admin = $mail_admin;
    }

    /**
     * @return mixed
     */
    public function getIdentifiantAdmin()
    {
        return $this->identifiant_admin;
    }

    /**
     * @param mixed $identifiant_admin
     */
    public function setIdentifiantAdmin($identifiant_admin)
    {
        $this->identifiant_admin = $identifiant_admin;
    }

    /**
     * @return mixed
     */
    public function getMdpAdmin()
    {
        return $this->mdp_admin;
    }

    /**
     * @param mixed $mdp_admin
     */
    public function setMdpAdmin($mdp_admin)
    {
        $this->mdp_admin = $mdp_admin;
    }

}