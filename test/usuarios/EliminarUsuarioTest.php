<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/usuariosModel.php");

class EliminarUsuarioTest extends TestCase{
	private $usuarios;

	public function setUp():void{
		$this->usuarios = new usuariosModel();
	}

	
	//Usuario Eliminado correctamente
	public function testEliminacionExitosa(){
		$respuesta = $this->usuarios->eliminar(20);
		$this->assertEquals(1, $respuesta);
	}
	
}

 ?>