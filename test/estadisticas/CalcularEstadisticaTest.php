<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/estadisticaModel.php");

class CalcularEstadisticaTest extends TestCase{
	private $estadistica;

	public function setUp():void{
		$this->estadistica = new estadisticaModel();
	}

	//estadistica consultados correctamente
	public function testCalculoExitoso(){
        $calculo = $this->estadistica->calcularEstadistica(array(
            "rango"=>"3/5/2023 - 3/11/202",
            "tipoRango"=>"Semanal",
            "cons"=>"Venta"
        ));
        $this->assertIsArray($calculo);
	}

}

 ?>