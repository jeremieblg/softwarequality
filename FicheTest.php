<?php
  use PHPUnit\Framework\TestCase;
  require 'Fiche.php';
  require 'Pas.php';

  class FicheTest extends TestCase {

    public function testAjouterPas(){
      $fiche=new Fiche('nom',null);
      $pas=$this->createStub(Pas::class);
      $fiche->ajouterPas($pas);
      $this->assertEquals(1,count($fiche->getListePas()));
    }
    public function testInitialiserFiche(){
      $pas1=$this->createStub(Pas::Class);
      $pas2=$this->createStub(Pas::Class);
      $mockPas=$this->createMock(Pas::Class);
      $mockPas->expects($this->exactly(2));
      $mockPas->method('initialiserPas');
      $listePas[]=array($pas1,$pas2);
      $fiche=new Fiche('nomFiche',$listePas);
      $fiche->initialiserFiche();
    }
  }
  
?>