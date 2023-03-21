<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/balanceModel.php");

class ConsultarEgresosTest extends TestCase{
	private $balance;

	public function setUp():void{
		$this->balance = new balanceModel();
	}

	//balance consultados correctamente
	public function testConsultaExitosa(){
        $egresos = $this->balance->listarEgresos("09-03-23");
        foreach ($egresos as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>