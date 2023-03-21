<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/seguridadModel.php");

class AsignarPermisosTest extends TestCase{
	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridadModel();
	}

	//Rol asignado correctamente
	public function testAsignacionExitosa(){
		
		$respuesta = $this->seguridad->insertarRol_Permiso(1,21);
		$this->assertEquals(true, $respuesta);
	}

}

 ?>