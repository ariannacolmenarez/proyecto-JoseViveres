<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/deudasModel.php");
class RegistrarAbonoTest extends TestCase{

	private $cuentas;

	public function setUp():void{
		$this->cuentas = new deudasModel();
	}
	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->cuentas->setid_abono("12");
        $this->cuentas->setmetodo_abono("1");
        $this->cuentas->setvalor_abono("12");
        $this->cuentas->setconcepto_abono("PAGADA");
        $this->cuentas->setfecha_abono("11/12/23");
		$this->assertEquals(1, $this->cuentas->registrarAbono($this->cuentas,"1","8"));
	}
	
}
	

 ?>