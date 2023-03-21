<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ingresoModel.php");

class AnularingresosTest extends TestCase{
	private $ingreso;

	public function setUp():void{
		$this->ingreso = new ingresoModel();
	}

	
	//Ingreso Anulado correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->ingreso->eliminarIngreso(16);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>