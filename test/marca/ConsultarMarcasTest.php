<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/marcaModel.php");

class ConsultarMarcasTest extends TestCase{
	private $marca;

	public function setUp():void{
		$this->marca = new marcaModel();
	}

	//marca consultados correctamente
	public function testConsultaExitosa(){
        $marca = $this->marca->listar();
        foreach ($marca as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>