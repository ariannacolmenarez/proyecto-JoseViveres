<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/ingresoModel.php");
class RegistraringresoTest extends TestCase{

	private $ingreso;

	public function setUp():void{
		$this->ingreso = new ingresoModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->ingreso->setnro_factura("12213123");
        $this->ingreso->setfecha("11/12/23");
        $this->ingreso->setestado_factura("PAGADA");
        $this->ingreso->setfecha_factura("11/12/23");
        $this->ingreso->setproveedor("1");
        $this->ingreso->setmetodo_factura("1");
        
        $this->ingreso->setid_producto(array(
            array(
            "id"=>"30",
            "nombre"=>"huevos",
            "costo"=>"12.00",
            "venta"=>"1",
            "cantidad"=>"1",
            )
        ));
		$this->assertEquals(1, $this->ingreso->registrar($this->ingreso));
	}
	
}
	

 ?>