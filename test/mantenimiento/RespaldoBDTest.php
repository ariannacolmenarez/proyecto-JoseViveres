<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/mantenimientoModel.php");

class RespaldoBDTest extends TestCase{
	private $mantenimiento;

	public function setUp():void{
		$this->mantenimiento = new mantenimientoModel();
	}

	//Rol modificado correctamente
	public function testRespaldoExitoso(){
		$respuesta = $this->mantenimiento->respaldo();
		$this->assertEquals(0, $respuesta);
	}

}

 ?>