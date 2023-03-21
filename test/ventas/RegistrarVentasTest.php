<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ventasModel.php");
class RegistrarVentasTest extends TestCase{

	private $ventas;

	public function setUp():void{
		$this->ventas = new ventasModel();
	}
	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->ventas->settotal("12");
        $this->ventas->setfecha("11/12/23");
        $this->ventas->sethora("12:38");
        $this->ventas->setestado_movimiento("PAGADA");
        $this->ventas->setid_metodo_pago("3");
        $this->ventas->setid_persona("1"); 
        $this->ventas->setproductos(array(array(
            "value"=>array(
            "id"=>"30",
            "nombre"=>"huevos",
            "precio_venta"=>"15.00",
            "cantidad"=>"47.00",
            "agregado"=>"1",
            "total"=>"15.00"
            )
        )));
		$this->assertEquals(1, $this->ventas->registrar($this->ventas));
	}
	
}
	

 ?>