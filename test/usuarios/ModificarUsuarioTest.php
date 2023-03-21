<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/usuariosModel.php");

class ModificarUsuarioTest extends TestCase{
	private $usuarios;

	public function setUp():void{
		$this->usuarios = new usuariosModel();
	}

	//Usuario modificado correctamente
	public function testModificacionExitosa(){
        $this->usuarios->setid("18");
        $this->usuarios->setnombre("");
        $this->usuarios->setcorreo("");
        $this->usuarios->setcontraseña("");
        $this->usuarios->setrol_usuario("3");
		$respuesta = $this->usuarios->guardar($this->usuarios);
		$this->assertEquals(true, $respuesta);
	}

}

 ?>