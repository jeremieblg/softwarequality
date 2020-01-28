<?php
  use PHPUnit\Framework\TestCase;
  require 'Fiche.php';
  require 'Pas.php';
  require 'tooMuchPasException.php';
  class FicheTest extends TestCase {
    protected $fiche;

    protected function setUp():void{
      fwrite(STDOUT,__METHOD__."\n");
      $this->fiche=new Fiche("fiche",null);
    }
    protected function tearDown(): void
    {
        fwrite(STDOUT,__METHOD__."\n");
        unset($this->fiche);
    }
    
    
    public function testAjouterPas(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $pas1=$this->createStub(Pas::class);
      $pas2=$this->createStub(Pas::class);
      $pas3=$this->createStub(Pas::class);
      $pas4=$this->createStub(Pas::class);
      $this->fiche->ajouterPas($pas1);
      $this->fiche->ajouterPas($pas2);
      $this->fiche->ajouterPas($pas3);
      $this->expectException(tooMuchPasException::class);
      $this->fiche->ajouterPas($pas4);
      // $this->assertEquals(1,count($this->fiche->getListePas()));
    }
    public function testInitialiserFiche(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $mockPas1=$this->createMock(Pas::Class);
      $mockPas1->expects($this->once())
              ->method('initialiserPas');
      $mockPas2=$this->createMock(Pas::Class);
      $mockPas2->expects($this->once())
              ->method('initialiserPas');

      $this->fiche=new Fiche('nom',array($mockPas1,$mockPas2));
      $this->fiche->initialiserFiche();

      $this->assertNull($this->fiche->getDateDebut());
      $this->assertNull($this->fiche->getDateFin());
    }
    public function testExecuterFiche(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $mockPas1=$this->createMock(Pas::Class);
      $mockPas1->expects($this->once())
              ->method('initialiserPas');
      $mockPas2=$this->createMock(Pas::Class);
      $mockPas2->expects($this->once())
              ->method('initialiserPas');

      $this->fiche=new Fiche('nom',array($mockPas1,$mockPas2));
      $this->fiche->executerFiche();

      $this->assertEquals(date('Y-m-d'),$this->fiche->getDateDebut());
      $this->assertNull($this->fiche->getDateFin());
    }
    public function testTerminerFiche(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $mockPas1=$this->createMock(Pas::Class);
      $mockPas1->expects($this->once())
              ->method('initialiserPas');
      $mockPas2=$this->createMock(Pas::Class);
      $mockPas2->expects($this->once())
              ->method('initialiserPas');

      $this->fiche=new Fiche('nom',array($mockPas1,$mockPas2));
      $this->fiche->terminerFiche();

      $this->assertEquals(date('Y-m-d'),$this->fiche->getDateFin());
    }
  }
  
?>