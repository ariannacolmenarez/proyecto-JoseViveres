<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/deudasModel.php");

class ConsultarCuentasCobrarTest extends TestCase{
	private $cuentas;

	public function setUp():void{
		$this->cuentas = new deudasModel();
	}

	//cuentas consultados correctamente
	public function testConsultaExitosa(){
        $cobrar = $this->cuentas->listarDeudasCobrar();
        foreach ($cobrar as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>