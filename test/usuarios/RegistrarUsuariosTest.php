<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/usuariosModel.php");


class RegistrarUsuariosTest extends TestCase{

	private $usuarios;

	public function setUp():void{
		$this->usuarios = new usuariosModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->usuarios->setnombre("ANGELs");
        $this->usuarios->setcorreo("ANGEL@GsMAIL.COM");
        $this->usuarios->setcontraseña("123456");
        $this->usuarios->setrol_usuario("3");
		$this->assertEquals(true, $this->usuarios->registrar($this->usuarios));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->usuarios->setnombre("ANGELs");
        $this->usuarios->setcorreo("ANGEL@GMAIL.COM");
        $this->usuarios->setcontraseña("123456");
        $this->usuarios->setrol_usuario("3");
		$this->assertEquals(0,$this->usuarios->registrar($this->usuarios));
	}
	
}
	

 ?>