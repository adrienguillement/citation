<?php

class Citation
{
    // Attributs
    private $idcit;
    private $idauteur;
    private $texte;

    /**
     * Citation constructor.
     * @param $idauteur
     * @param $texte
     */
    public function __construct( $idauteur, $texte, $idcit="")
    {
        ($idcit != "") ?: $this->idcit = $idcit;
        $this->idauteur = $idauteur;
        $this->texte = $texte;
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
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    /**
     * @return string
     */
    public function getIdcit()
    {
        return $this->idcit;
    }

    /**
     * @param string $idcit
     */
    public function setIdcit($idcit)
    {
        $this->idcit = $idcit;
    }
}