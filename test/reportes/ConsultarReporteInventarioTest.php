<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/reporteInventarioModel.php");

class ConsultarReporteInventarioTest extends TestCase{
	private $reporte;

	public function setUp():void{
		$this->reporte = new reporteInventarioModel();
	}

	//reportes con resultados
	public function testConsultaConResultados(){
        $consulta = $this->reporte->getInventario();
        $this->assertIsArray($consulta);
	}
    //reportes sin resultados
    public function testConsultaSinResultados(){
        $consulta = $this->reporte->getInventario();
        $this->assertEquals("", $consulta);
	}

}

 ?>