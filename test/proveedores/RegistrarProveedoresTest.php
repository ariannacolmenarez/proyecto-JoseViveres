<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/proveedoresModel.php");


class RegistrarproveedoresTest extends TestCase{

	private $proveedores;

	public function setUp():void{
		$this->proveedores = new proveedoresModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->proveedores->setnombre("ANGELs");
        $this->proveedores->setnroDoc("27629588");
        $this->proveedores->settipoDoc("CI");
        $this->proveedores->setdireccion("");
        $this->proveedores->setcontacto("0245211254");
		$this->assertEquals(1, $this->proveedores->registrar($this->proveedores));
	}
	
}
	

 ?>