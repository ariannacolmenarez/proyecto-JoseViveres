<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/proveedoresModel.php");

class EliminarproveedoresTest extends TestCase{
	private $proveedores;

	public function setUp():void{
		$this->proveedores = new proveedoresModel();
	}

	
	//cliente eliminado correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->proveedores->eliminar(2);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>