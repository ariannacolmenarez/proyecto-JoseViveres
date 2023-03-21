<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/marcaModel.php");


class RegistrarMarcaTest extends TestCase{

	private $marca;

	public function setUp():void{
		$this->marca = new marcaModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->marca->setnombre("yaracuy");
		$this->assertEquals(1, $this->marca->registrar($this->marca));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->marca->setnombre("yaracuy");
		$this->assertEquals($this->marca->getnombre(),$this->marca->registrar($this->marca));
	}
	
}