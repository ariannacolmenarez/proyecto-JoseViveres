<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/productosModel.php");

class ConsultarProductosTest extends TestCase{
	private $productos;

	public function setUp():void{
		$this->productos = new productosModel();
	}

	//productos consultados correctamente
	public function testConsultaExitosa(){
        $prod = $this->productos->listar();
        foreach ($prod as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>