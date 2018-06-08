<?php

class Auteurs
{

    // Attributes
    private $idauteur;
    private $nom;
    private $prenom;
    private $siecle;
    private $image;

    /**
     * Auteurs constructor.
     * @param $idauteur
     * @param $nom
     * @param $prenom
     * @param $siecle
     * @param $image
     */
    public function __construct($siecle, $prenom, $nom, $image, $idauteur="")
    {
        ($idauteur != "") ?: $this->idauteur = $idauteur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->siecle = $siecle;
        $this->image = $image;
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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}