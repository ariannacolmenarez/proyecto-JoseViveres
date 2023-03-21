<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/proveedoresModel.php");

class ConsultarproveedoresTest extends TestCase{
	private $proveedores;

	public function setUp():void{
		$this->proveedores = new proveedoresModel();
	}

	//proveedores consultados correctamente
	public function testConsultaExitosa(){
        $prov = $this->proveedores->listar();
        foreach ($prov as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>