<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/balanceModel.php");

class ConsultarIngresoTest extends TestCase{
	private $balance;

	public function setUp():void{
		$this->balance = new balanceModel();
	}

	//balance consultados correctamente
	public function testConsultaExitosa(){
        $ingresos = $this->balance->listar("09-03-23");
        foreach ($ingresos as $item) {
            $this->assertIsArray($item);
        }
	}

}

 ?>