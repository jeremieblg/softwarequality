<?php
  class tooMuchFicheException extends \Exception{}
  class noRecordOfTheCampaignException extends \Exception{}
  class dateDebutIsEmpty extends \Exception{}
  class Campagne{
    private $nom;
    private $dateDebut;
    private $dateFin;
    private $statut;
    private $listeFiche = array();

    public function __construct($nom, $listeFiche){
      $this->nom=$nom;
      $this->listeFiche = (is_array($listeFiche))?$listeFiche:[];
    }
    public function ajouterFiche($fiche){
      if(count($this->listeFiche)>=10){
          throw new tooMuchFicheException;
      }
      $this->listeFiche[]=$fiche;
    }
    public function initialiserCampagne(){
      $this->dateDebut=null;
      $this->dateFin=null;
      $this->statut=null;
      if(count($this->listeFiche)==0){
        throw new noRecordOfTheCampaignException;
      }
      foreach($this->listeFiche as $fiche){
          $fiche->initialiserFiche();
      }
    }
    public function executerCampagne(){
      $this->dateDebut=new dateTime();
      $this->dateFin=null;
      $this->statut="En cours";
      if(count($this->listeFiche)==0){
        throw new noRecordOfTheCampaignException;
      }
      foreach($this->listeFiche as $fiche){
        $fiche->initialiserFiche();
      }
    }
    public function calculerStatut(){
        
      $statuts = array();

      foreach ($this->listeFiche as $fiche){
          $statuts[] = $fiche->getStatut();
      }

      foreach(array_count_values($statuts) as $k => $v){
          if($k == 'KO'){
              $this->statut = 'KO';
              break;
          }
          if($k == 'OK' && $v == count($statuts)){
              $this->statut = 'OK';
              break;
          }
      }

      if($this->statut != 'KO' && $this->statut != 'OK'){
          $this->statut = 'En cours';
      }
    }
    public function terminerCampagne(){
      $this->dateFin=new dateTime();
      if($this->dateDebut==null){
        throw new dateDebutIsEmpty;
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
     * Get the value of listeFiche
     */ 
    public function getListeFiche()
    {
        return $this->listeFiche;
    }

    /**
     * Set the value of listeFiche
     *
     * @return  self
     */ 
    public function setListeFiche($listeFiche)
    {
        $this->listeFiche = $listeFiche;

        return $this;
    }
  }
?>