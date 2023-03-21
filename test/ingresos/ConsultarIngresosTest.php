<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ingresoModel.php");

class ConsultarIngresosTest extends TestCase{
	private $ingreso;

	public function setUp():void{
		$this->ingreso = new ingresoModel();
	}

	//ingreso consultado correctamente
	public function testConsultaExitosa(){
        $ingreso = $this->ingreso->listarIngreso();
        foreach ($ingreso as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>