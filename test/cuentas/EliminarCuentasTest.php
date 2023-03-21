<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/deudasModel.php");

class EliminarCuentasTest extends TestCase{
	private $cuentas;

	public function setUp():void{
		$this->cuentas = new deudasModel();
	}

	
	//eliminar cuentas exitosamente
	public function testEliminacionexitosa(){
		$respuesta = $this->cuentas->eliminar(90);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>