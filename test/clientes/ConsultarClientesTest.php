<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/clientesModel.php");

class ConsultarClientesTest extends TestCase{
	private $clientes;

	public function setUp():void{
		$this->clientes = new clientesModel();
	}

	//clientes consultados correctamente
	public function testConsultaExitosa(){
        $news = $this->clientes->listar();
        foreach ($news as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>