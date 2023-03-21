<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/usuariosModel.php");

class ConsultarUsuariosTest extends TestCase{
	private $usuarios;

	public function setUp():void{
		$this->usuarios = new usuariosModel();
	}

	//Usuarios consultados correctamente
	public function testConsultaExitosa(){
        $news = $this->usuarios->listar();
        foreach ($news as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>