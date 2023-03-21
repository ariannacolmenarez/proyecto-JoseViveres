<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/gastosModel.php");


class RegistrarGastosTest extends TestCase{

	private $gastos;

	public function setUp():void{
		$this->gastos = new gastosModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->gastos->setmonto("12");
        $this->gastos->setfecha("11/12/23");
        $this->gastos->sethora("12:38");
        $this->gastos->setestado_movimiento("PAGADA");
        $this->gastos->setid_metodo_pago("3");
        $this->gastos->setid_persona("1");
        $this->gastos->setconcepto("3");
        $this->gastos->setnombre("PAGO A PROVEEDORES");
		$this->assertEquals(1, $this->gastos->registrar($this->gastos));
	}
	
}
	

 ?>