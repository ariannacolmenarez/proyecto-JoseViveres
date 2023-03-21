<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/gastosModel.php");

class AnularGastosTest extends TestCase{
	private $gastos;

	public function setUp():void{
		$this->gastos = new gastosModel();
	}

	
	//Gasto Anulado correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->gastos->eliminar(143);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>