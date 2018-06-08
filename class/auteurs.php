<?php

class auteurs
{

    // Attributes
    private $idauteur;
    private $nom;
    private $prenom;
    private $siecle;

    /**
     * auteurs constructor.
     * @param $idauteur
     * @param $siecle
     * @param $prenom
     * @param $nom
     */
    public function __construct($siecle, $prenom, $nom, $idauteur="")
    {
        ($idauteur != "") ?: $this->$idauteur = $idauteur;
        $this->siecle = $siecle;
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getIdauteur()
    {
        return $this->idauteur;
    }

    /**
     * @param mixed $idauteur
     */
    public function setIdauteur($idauteur)
    {
        $this->idauteur = $idauteur;
    }

    /**
     * @return mixed
     */
    public function getSiecle()
    {
        return $this->siecle;
    }

    /**
     * @param mixed $siecle
     */
    public function setSiecle($siecle)
    {
        $this->siecle = $siecle;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}