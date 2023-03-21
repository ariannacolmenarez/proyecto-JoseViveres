<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/presentacionModel.php");


class RegistrarPresentacionTest extends TestCase{

	private $presentacion;

	public function setUp():void{
		$this->presentacion = new presentacionModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->presentacion->setvolumen("100");
        $this->presentacion->setmedidas("metros");
        $this->presentacion->setunidades("1");
		$this->assertEquals(1, $this->presentacion->registrar($this->presentacion));
	}
	
}