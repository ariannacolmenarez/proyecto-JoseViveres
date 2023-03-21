<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/clientesModel.php");


class ModificarClientesTest extends TestCase{

	private $clientes;

	public function setUp():void{
		$this->clientes = new clientesModel();
	}

	//Cliente modificado correctamente
	public function testModificacionExitosa(){
        $this->clientes->setnombre("ANGELs");
        $this->clientes->setnroDoc("");
        $this->clientes->settipoDoc("");
        $this->clientes->settelefono("");
        $this->clientes->setid("19");
		$this->assertEquals(1, $this->clientes->guardar($this->clientes));
	}
	
}