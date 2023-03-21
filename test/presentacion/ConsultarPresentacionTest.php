<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/presentacionModel.php");

class ConsultarpresentacionTest extends TestCase{
	private $presentacion;

	public function setUp():void{
		$this->presentacion = new presentacionModel();
	}

	//presentaciones consultadas correctamente
	public function testConsultaExitosa(){
        $pres = $this->presentacion->listar();
        foreach ($pres as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>