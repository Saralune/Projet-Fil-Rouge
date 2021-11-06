<?php


class Comment
{
    /*-----------------------------------------------------
                        Attributs :
    -----------------------------------------------------*/
    private $id_user;
    private $contenu_commentaire;
    private $approbation_commentaire;
    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($contenu_commentaire, $approbation_commentaire)
    {
        $this->contenu_commentaire = $contenu_commentaire;
        $this->approbation_commentaire = $approbation_commentaire;
    }
    /*-----------------------------------------------------
                    Getter and Setter :
    -----------------------------------------------------*/
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
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getContenuCommentaire()
    {
        return $this->contenu_commentaire;
    }

    /**
     * @param mixed $contenu_commentaire
     */
    public function setContenuCommentaire($contenu_commentaire)
    {
        $this->contenu_commentaire = $contenu_commentaire;
    }

    /**
     * @return mixed
     */
    public function getApprobationCommentaire()
    {
        return $this->approbation_commentaire;
    }

    /**
     * @param mixed $approbation_commentaire
     */
    public function setApprobationCommentaire($approbation_commentaire)
    {
        $this->approbation_commentaire = $approbation_commentaire;
    }

}