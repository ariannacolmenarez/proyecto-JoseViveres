<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ventasModel.php");

class ConsultarVentasTest extends TestCase{
	private $ventas;

	public function setUp():void{
		$this->ventas = new ventasModel();
	}

	//ventas consultadas correctamente
	public function testConsultaExitosa(){
        $ventas = $this->ventas->listar("");
        foreach ($ventas as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>