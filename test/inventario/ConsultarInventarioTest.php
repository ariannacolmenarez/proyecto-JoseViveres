<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/inventarioModel.php");

class ConsultarInventarioTest extends TestCase{
	private $inventario;

	public function setUp():void{
		$this->inventario = new inventarioModel();
	}

	//inventario consultados correctamente
	public function testConsultaExitosa(){
        $cat = $this->inventario->listar("");
        foreach ($cat as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>