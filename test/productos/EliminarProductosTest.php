<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/productosModel.php");

class EliminarProductosTest extends TestCase{
	private $productos;

	public function setUp():void{
		$this->productos = new productosModel();
	}

	
	//eliminar productos exitosa
	public function testEliminarExitosa(){
		$respuesta = $this->productos->eliminar(35);
		$this->assertEquals(0, $respuesta);
	}
	
}

 ?>