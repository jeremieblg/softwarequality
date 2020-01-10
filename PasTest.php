<?php
  use PHPUnit\Framework\TestCase;
  require 'Pas.php';  
  
  class PasTest extends TestCase
  {
    function testExecuterPas(){
      $this->markTestIncomplete('En cours');
    }
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
  }

?>