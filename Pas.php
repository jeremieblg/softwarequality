<?php
  class Pas {
    private $action;
    private $resultatAttendu;
    private $resultatObtenu;
    private $commentaire;
    private $dateExecution;
    private $statut;
    
    public function _construct($action, $resultatAttendu){
      $this->action=$action;
      $this->resultatAttendu=$resultatAttendu;
    }
    public function getAction(){
      return $this->action;
    }
    public function getResultatAttendun(){
      return $this->resultatAttendu;
    }
    public function initialiserPas(){
      $this->resultatObtenu = null;
      $this->commentaire = null;
      $this->dateExecution = null;
      $this->statut = 'non passer';
    }

    /**
     * Get the value of dateExecution
     */ 
    public function getDateExecution()
    {
        return $this->dateExecution;
    }

    /**
     * Set the value of dateExecution
     *
     * @return  self
     */ 
    public function setDateExecution($dateExecution)
    {
        $this->dateExecution = $dateExecution;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

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
     * Get the value of resultatObtenu
     */ 
    public function getResultatObtenu()
    {
        return $this->resultatObtenu;
    }

    /**
     * Set the value of resultatObtenu
     *
     * @return  self
     */ 
    public function setResultatObtenu($resultatObtenu)
    {
        $this->resultatObtenu = $resultatObtenu;

        return $this;
    }
  }
  
  
?>