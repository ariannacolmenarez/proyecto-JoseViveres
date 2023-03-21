<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/categoriasModel.php");


class RegistrarcategoriasTest extends TestCase{

	private $categorias;

	public function setUp():void{
		$this->categorias = new categoriasModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->categorias->setnombre("limpieza");
		$this->assertEquals(1, $this->categorias->registrar($this->categorias));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->categorias->setnombre("limpieza");
		$this->assertEquals($this->categorias->getnombre(),$this->categorias->registrar($this->categorias));
	}
	
}