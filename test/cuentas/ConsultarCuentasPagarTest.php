<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/deudasModel.php");

class ConsultarCuentasPagarTest extends TestCase{
	private $cuentas;

	public function setUp():void{
		$this->cuentas = new deudasModel();
	}

	//cuentas consultados correctamente
	public function testConsultaExitosa(){
        $pagar = $this->cuentas->listarDeudasPagar();
        foreach ($pagar as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>