<?php
  use PHPUnit\Framework\TestCase;
  require_once 'Pas.php';  
  
  class PasTest extends TestCase
  {
    function testCreerPas(){
      fwrite(STDOUT,__METHOD__."\n");
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
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertNotNull($pas);
      $pas->initialiserPas();
      return $pas;
    }
    /** 
     * @depends testInitialiserPas
     */
    function testInitialiserPasDateExecution($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertNull($pas->getDateExecution());
    }
    /** 
     * @depends testInitialiserPas
     */
    function testInitialiserPasCommentaire($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertNull($pas->getCommentaire());
    }
    /**
     * @depends testInitialiserPas
     */
    function testInitialiserPasReslutatObtenu($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertNull($pas->getResultatObtenu());
    }
    /**
     * @depends testInitialiserPas
     */
    function testInitialiserPasStatut($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertEquals('non passer',$pas->getStatut());
    }
    /** 
     * @depends testCreerPas
     */
    function testExecuterPas($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $pas->executerPas('ResultatObtenu1','commentaire1','OK');
      $this->assertNotNull($pas);
      return $pas;
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasDateExecution($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertEquals(date('Y-m-d'), $pas->getDateExecution());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasResultatObtenu($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertEquals('ResultatObtenu1', $pas->getResultatObtenu());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasCommentaire($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertEquals('commentaire1', $pas->getCommentaire());
    }
    /**
     * @depends testExecuterPas
     */
    function testExecuterPasStatut($pas){
      fwrite(STDOUT,__METHOD__."\n");
      $this->assertEquals('OK', $pas->getStatut());
    }

  }

?>