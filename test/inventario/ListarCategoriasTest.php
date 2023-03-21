<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/inventarioModel.php");

class ListarCategoriasTest extends TestCase{
	private $inventario;

	public function setUp():void{
		$this->inventario = new inventarioModel();
	}

	//categorias consultados correctamente
	public function testConsultaExitosa(){
        $cat = $this->inventario->listarCategoriasProd();
        foreach ($cat as $item) {
            $this->assertIsObject($item);
        }
	}

}

 ?>