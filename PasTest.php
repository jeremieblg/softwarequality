<?php
  use PHPUnit\Framework\TestCase;
  require 'Pas.php';  
  
  class PasTest extends TestCase
  {
    function testCreerPas(){
      $pas=new Pas('Action1', 'ResultatAttendu1');
      $this->assertNotNull($pas);
      $pas->setDateExecution(date('Y-m-d'));
      $this->assertNotNull($pas->getDateExecution());
      return $pas;
    }
    /** 
     * @depends testCreerPas
     */
    function testInitialiserPas($pas){
      $this->assertNotNull($pas);
      $pas->initialiserPas();
      return $pas;
    }
    /** 
     * @depends testInitialiserPas
     */
    function testInitialiserPasDateExecution($pas){
      $this->assertNull($pas->getDateExecution());
    }
    /** 
     * @depends testInitialiserPas
     */
    function testInitialiserPasCommentaire($pas){
      $this->assertNull($pas->getCommentaire());
    }
    /**
     * @depends testInitialiserPas
     */
    function testInitialiserPasReslutatObtenu($pas){
      $this->assertNull($pas->getResultatObtenu());
    }
    /**
     * @depends testInitialiserPas
     */
    function testInitialiserPasStatut($pas){
      $this->assertEquals('non passer',$pas->getStatut());
    }
    /** 
     * @depends testCreerPas
     */
    function testExecuterPas($pas){
      $pas->executerPas('ResultatObtenu1','commentaire1','OK');
      $this->assertNotNull($pas);
      return $pas;
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasDateExecution($pas){
      $this->assertSame(date('Y-m-d'), $pas->getDateExecution());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasResultatObtenu($pas){
      $this->assertEquals('ResultatObtenu1', $pas->getResultatObtenu());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasCommentaire($pas){
      $this->assertEquals('commentaire1', $pas->getCommentaire());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasStatut($pas){
      $this->assertEquals('OK', $pas->getStatut());
    }

  }

?>