<?php
  use PHPUnit\Framework\TestCase;
  require 'Pas.php';

  class FicheTest {
    
    public function testAjouterPas(){
      $fiche=new Fiche('nom',null);
      $pas=$this->createStub(Pas::class);
      $fiche->ajouterPas($pas);
      $this->assertEquals(1,count($fiche->getListePas()));
    }
  }
  
?>