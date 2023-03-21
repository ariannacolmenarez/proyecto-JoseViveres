<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ventasModel.php");

class AnularVentasTest extends TestCase{
	private $ventas;

	public function setUp():void{
		$this->ventas = new ventasModel();
	}

	
	//Venta Anulada correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->ventas->eliminar(136);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>