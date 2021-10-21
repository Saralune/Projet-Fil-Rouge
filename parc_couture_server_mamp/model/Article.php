<?php


class Article
{
    /*-----------------------------------------------------
                        Attributs :
    -----------------------------------------------------*/
    private $id_article;
    private $nom_article;
    private $contenu_article;
    /*-----------------------------------------------------
                        Constucteur :
    -----------------------------------------------------*/
    public function __construct($nom_article, $contenu_article)
    {
        $this->nom_article = $nom_article;
        $this->contenu_article = $contenu_article;
    }
    /*-----------------------------------------------------
                    Getter and Setter :
    -----------------------------------------------------*/
    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getNomArticle()
    {
        return $this->nom_article;
    }

    /**
     * @param mixed $nom_article
     */
    public function setNomArticle($nom_article)
    {
        $this->nom_article = $nom_article;
    }

    /**
     * @return mixed
     */
    public function getContenuArticle()
    {
        return $this->contenu_article;
    }

    /**
     * @param mixed $contenu_article
     */
    public function setContenuArticle($contenu_article)
    {
        $this->contenu_article = $contenu_article;
    }

}