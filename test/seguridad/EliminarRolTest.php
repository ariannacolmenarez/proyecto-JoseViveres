<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/seguridadModel.php");

class EliminarRolTest extends TestCase{
	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridadModel();
	}

	
	//Eliminar rol ya asignado
	public function testUsuarioAsignado(){
		$respuesta = $this->seguridad->eliminarRol(18);
		$this->assertEquals(0, $respuesta);
	}
	
	//Eliminar rol no asignado
	public function testEliminacionExitosa(){
		$respuesta = $this->seguridad->eliminarRol(18);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>