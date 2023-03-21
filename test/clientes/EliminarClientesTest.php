<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/clientesModel.php");

class EliminarClientesTest extends TestCase{
	private $clientes;

	public function setUp():void{
		$this->clientes = new clientesModel();
	}

	
	//cliente eliminado correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->clientes->eliminar(16);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>