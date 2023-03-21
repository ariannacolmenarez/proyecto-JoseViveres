<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/productosModel.php");


class RegistrarProductosTest extends TestCase{

	private $productos;

	public function setUp():void{
		$this->productos = new productosModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->productos->setnombre("vegetales");
        $this->productos->setid_categoria("33");
        $this->productos->setid_marca("1");
        $this->productos->setid_presentacion("5");
        $this->productos->setdescripcion("");
        $this->productos->seturl_img(null);;
		$this->assertEquals(1, $this->productos->registrar($this->productos));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->productos->setnombre("vegetales");
        $this->productos->setid_categoria("33");
        $this->productos->setid_marca("1");
        $this->productos->setid_presentacion("5");
        $this->productos->setdescripcion("");
        $this->productos->seturl_img(null);
		$this->assertEquals($this->productos->getnombre(),$this->productos->registrar($this->productos));
	}
	
}