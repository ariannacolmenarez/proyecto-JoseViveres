<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/mantenimientoModel.php");

class RestauracionBDTest extends TestCase{
	private $mantenimiento;

	public function setUp():void{
		$this->mantenimiento = new mantenimientoModel();
	}

	//Rol modificado correctamente
	public function testRestauracionExitosa(){
		$respuesta = $this->mantenimiento->restore("localhost", "root", "","joseviveresbd", "./database/07_03_2023_(17-28-42_hrs).sql");
		$this->assertEquals(0, $respuesta);
	}

}

 ?>