<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/seguridadModel.php");

class ModificarRolTest extends TestCase{
	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridadModel();
	}

	//Rol modificado correctamente
	public function testModificacionExitosa(){
        $this->seguridad->setnombreRol("distribuidor");
        $this->seguridad->setdescripcionRol("paola");
        $this->seguridad->setidRol("16");
		$respuesta = $this->seguridad->guardarRol($this->seguridad);
		$this->assertEquals(true, $respuesta);
	}

}

 ?>