<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/seguridadModel.php");


class RegistrarRolTest extends TestCase{

	private $seguridad;

	public function setUp():void{
		$this->seguridad = new seguridadModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->seguridad->setnombreRol("distribuidor");
        $this->seguridad->setdescripcionRol("paolasssss");
		$this->assertEquals(1, $this->seguridad->registrarRol($this->seguridad));
	}
    //el usuario Ingresa los datos incorrectos
    public function testRegistroFallido(){
        $this->seguridad->setnombreRol("encargado");
        $this->seguridad->setdescripcionRol("paolasssss");
		$this->assertEquals($this->seguridad->getnombreRol(), $this->seguridad->registrarRol($this->seguridad));
	}
	
}
	

 ?>