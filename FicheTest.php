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
      $mockPas1=$this->createMock(Pas::Class);
      $mockPas1->expects($this->once())
              ->method('initialiserPas');
      $mockPas2=$this->createMock(Pas::Class);
      $mockPas2->expects($this->once())
              ->method('initialiserPas');

      $fiche=new Fiche('nom',array($mockPas1,$mockPas2));
      $fiche->initialiserFiche();

      $this->assertNull($fiche->getDateDebut());
      $this->assertNull($fiche->getDateFin());
    }
    // public function testExecuterFiche(){

    // }
  }
  
?>