<?php
  class Fiche{
    private $nom;
    private $dateDebut;
    private $dateFin;
    private $statut;
    private $listePas = array();

    public function __construct($nom, $listePas){
      $this->nom=$nom;
      $this->listePas = (is_array($listePas))?$listePas:[];
    }
    public function ajouterPas($pas){
        $this->listePas[]=$pas;
    }
    public function initialiserFiche(){
        $this->dateDebut=null;
        $this->dateFin=null;
        $this->statut="En cours";
        foreach($this->listePas as $pas){
            $pas->initialiserPas();
        }
    }
    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of listePas
     */ 
    public function getListePas()
    {
        return $this->listePas;
    }

    /**
     * Set the value of listePas
     *
     * @return  self
     */ 
    public function setListePas($listePas)
    {
        $this->listePas = $listePas;

        return $this;
    }
  }
?>