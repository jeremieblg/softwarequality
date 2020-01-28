<?php
  use PHPUnit\Framework\TestCase;
  require_once 'Fiche.php';
  require_once 'Pas.php';
  require_once 'tooMuchPasException.php';
  class FicheTest extends TestCase {
    protected $fiche;
    protected static $dateDuJour;
    public static function setUpBeforeClass():void{
      fwrite(STDOUT,__METHOD__."\n");
      self::$dateDuJour = new DateTime();      
    }
    public static function tearDownAfterClass():void{
      fwrite(STDOUT,"\n".__METHOD__."\n");
      self::$dateDuJour = null;      
    }

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

      $this->assertEqualsWithDelta(self::$dateDuJour->getTimestamp(),$this->fiche->getDateDebut()->getTimestamp(),3);
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
      $this->assertEqualsWithDelta(self::$dateDuJour->getTimestamp(),$this->fiche->getDateFin()->getTimestamp(),3);

    }
  }
  
?>