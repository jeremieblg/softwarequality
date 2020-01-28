<?php
  use PHPUnit\Framework\TestCase;
  require_once 'Fiche.php';
  require_once 'Campagne.php';
  class CampagneTest extends TestCase {
    protected $campagne;
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
      $this->campagne=new Campagne("Campagne",null);
    }
    protected function tearDown(): void{
        fwrite(STDOUT,__METHOD__."\n");
        unset($this->campagne);
    }
    /**
     *  @covers Campagne::ajouterFiche
     */
    public function testAjouterFiche(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $fiche1=$this->createStub(Fiche::class);
      $fiche2=$this->createStub(Fiche::class);
      $fiche3=$this->createStub(Fiche::class);
      $fiche4=$this->createStub(Fiche::class);
      $fiche5=$this->createStub(Fiche::class);
      $fiche6=$this->createStub(Fiche::class);
      $fiche7=$this->createStub(Fiche::class);
      $fiche8=$this->createStub(Fiche::class);
      $fiche9=$this->createStub(Fiche::class);
      $fiche10=$this->createStub(Fiche::class);
      $fiche11=$this->createStub(Fiche::class);
      
      $this->campagne->ajouterFiche($fiche1);
      $this->campagne->ajouterFiche($fiche2);
      $this->campagne->ajouterFiche($fiche3);
      $this->campagne->ajouterFiche($fiche4);
      $this->campagne->ajouterFiche($fiche5);
      $this->campagne->ajouterFiche($fiche6);
      $this->campagne->ajouterFiche($fiche7);
      $this->campagne->ajouterFiche($fiche8);
      $this->campagne->ajouterFiche($fiche9);
      $this->campagne->ajouterFiche($fiche10);
      $this->expectException(tooMuchFicheException::class);
      $this->campagne->ajouterFiche($fiche11);
    }

    /**
     *  @covers Campagne::initialiserCampagne
     */
    public function testInitialiserCampagne(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");

      $this->expectException(noRecordOfTheCampaignException::class);
      $this->campagne->initialiserCampagne();

      $mockFiche1=$this->createMock(Fiche::Class);
      $mockFiche1->expects($this->once())
              ->method('initialiserFiche');
      $mockFiche2=$this->createMock(Fiche::Class);
      $mockFiche2->expects($this->once())
              ->method('initialiserFiche');

      $this->campagne=new Campagne('CampagneTest',array($mockFiche1,$mockFiche2));
      $this->campagne->initialiserCampagne();

      $this->assertNull($this->campagne->getDateDebut());
      $this->assertNull($this->campagne->getDateFin());
    }

     /**
     *  @covers Campagne::executerCampagne
     */
    public function testExecuterCampagne(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");

      $this->expectException(noRecordOfTheCampaignException::class);
      $this->campagne->executerCampagne();

      $mockFiche1=$this->createMock(Fiche::Class);
      $mockFiche1->expects($this->once())
              ->method('executerFiche');
      $mockFiche2=$this->createMock(Fiche::Class);
      $mockFiche2->expects($this->once())
              ->method('executerFiche');

      $this->campagne=new Campagne('CampagneTest',array($mockFiche1,$mockFiche2));
      $this->campagne->executerCampagne();

      $this->assertEqualsWithDelta(self::$dateDuJour->getTimestamp(),$this->campagne->getDateDebut()->getTimestamp(),3);
      $this->assertEquals('En cours',$this->campagne->getStatut());

    }
     /**
     *  @covers Campagne::calculStatut
     */
    public function testCalculerStatutKO(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $stubFiche1 = $this->createStub(Fiche::class);
      $stubFiche1->method('getStatut')
                  ->willReturn('KO');

      $stubFiche2 = $this->createStub(Fiche::class);
      $stubFiche2->method('getStatut')
                  ->willReturn('OK');

      $this->campagne->ajouterFiche($stubFiche1);
      $this->campagne->ajouterFiche($stubFiche2);

      $this->campagne->calculerStatut();

      $this->assertEquals('KO', $this->campagne->getStatut());

    }
     /**
     *  @covers Campagne::calculStatut
     */
    public function testCalculerStatutEnCour(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $stubFiche1 = $this->createStub(Fiche::class);
      $stubFiche1->method('getStatut')
                  ->willReturn('En cours');

      $stubFiche2 = $this->createStub(Fiche::class);
      $stubFiche2->method('getStatut')
                  ->willReturn('OK');

      $this->campagne->ajouterFiche($stubFiche1);
      $this->campagne->ajouterFiche($stubFiche2);

      $this->campagne->calculerStatut();

      $this->assertEquals('En cours', $this->campagne->getStatut());

    }
     /**
     *  @covers Campagne::calculStatut
     */
    public function testCalculerStatutOk(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $stubFiche1 = $this->createStub(Fiche::class);
      $stubFiche1->method('getStatut')
                  ->willReturn('OK');

      $stubFiche2 = $this->createStub(Fiche::class);
      $stubFiche2->method('getStatut')
                  ->willReturn('OK');

      $this->campagne->ajouterFiche($stubFiche1);
      $this->campagne->ajouterFiche($stubFiche2);

      $this->campagne->calculerStatut();

      $this->assertEquals('OK', $this->campagne->getStatut());

    }
     /**
     *  @covers Campagne::terminerCampagne
     */
    public function testTerminerCampagne(){
      fwrite(STDOUT,"===========================>".__METHOD__."\n");
      $this->expectException(dateDebutIsEmpty::class);
      $this->campagne->terminerCampagne();
      
      $this->campagne->setDateDebut(self::$dateDuJour->getTimestamp());
      $this->campagne->terminerCampagne();
      $this->assertEqualsWithDelta(self::$dateDuJour->getTimestamp(),$this->campagne->getDateFin()->getTimestamp(),3);

    }
  }
  
?>