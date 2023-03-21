<?php
namespace content\controllers;
use content\models\clientesModel;
use content\controllers\bitacoraController;
use content\libraries\core\autoload;

class clientesController extends autoload {
    private $model;
    private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new clientesModel;
        $this->bitacora = new bitacoraController;

    }

    public function  listar(){
        $data = '<div class="list-group list-group-flush mt-2" id="cliente">';

        $respuesta = $this->model->listar();
        if(in_array("Consultar Clientes", $_SESSION['permisos'])){ 
            foreach ($respuesta as $regist) {
                $data .= '<a ';
                if(in_array("Consultar Clientes", $_SESSION['permisos'])){ 
                    $data .= 'onclick="consultarclientes('.$regist["id"].');"';
                }
                $data .=' type="button" class="list-group-item text-dark list-group-item-action py-3">
                                <div class="row align-items-center">
                                <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                                <div class="col px-4">'.$regist['nombre'].' <small class="text-muted">'.$regist['telefono'].'</small></div>
                                <div class="col text-end"><i class="ti-marker-alt "></i></div>
                                </div> 
                            </a>';
            };
        }

        $data .= '</div>';

        echo $data;

    }

    public function consultar($id){
      
        $resp = $this->model->consultar($id);

        $resultados [] = [
            "nombre"=>$resp->getnombre(),
            "tipo_doc"=>$resp->gettipoDoc(),
            "nro_doc"=>$resp->getnroDoc(),
            "telefono"=>$resp->gettelefono(),
            "id"=>$resp->getid(),
        ];
        echo json_encode($resultados);
      
    }

    public function guardar(){
        if (!empty($_POST['idcliente'] && $_POST['nombrecliente'] && $_POST['telefonocliente'] )) {
            if (preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|", $_POST['nombrecliente'] )&&
            preg_match("|^[0-9,$]*$|", $_POST['telefonocliente'])) {
                $p=new clientesModel();

                $p->setid($_POST['idcliente']);
                $p->setnombre($_POST['nombrecliente']);
                $p->setnroDoc($_POST['nro_doccliente']);
                $p->settipoDoc($_POST['tipo_doccliente']);
                $p->settelefono($_POST['telefonocliente']);

                $this->model->guardar($p);
                
                    $fecha=date('Y-m-d');
                    $accion='Se modificó un cliente con numero de documento '.$_POST['nro_doccliente'].' ';
                    $modulo='Clientes';
                    $id=$_SESSION['id_usuario'];
                    $this->bitacora->insertar(
                        $fecha,
                        $accion,
                        $modulo,
                        $id);
            }
				
		}
    }

    public function registrar(){
        if (!empty( $_POST['nombrecliente'] && $_POST['telefonocliente'])) {
            if (preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|", $_POST['nombrecliente'] )&&
                preg_match("|^[0-9,$]*$|", $_POST['telefonocliente'])) {

                $p=new clientesModel();

                $p->setnombre($_POST['nombrecliente']);
                $p->setnroDoc($_POST['nro_doccliente']);
                $p->settipoDoc($_POST['tipo_doccliente']);
                $p->settelefono($_POST['telefonocliente']);

                $resp=$this->model->registrar($p);
                if ($resp) {
                    $fecha=date('Y-m-d');
                    $accion='Se registro un nuevo cliente con numero de documento '.$_POST['nro_doccliente'].' ';
                    $modulo='Clientes';
                    $id=$_SESSION['id_usuario'];
                    $this->bitacora->insertar(
                        $fecha,
                        $accion,
                        $modulo,
                        $id);
                }
                echo json_encode($resp);
            }
		}
    }

    public function eliminar(){
			$this->model->eliminar($_POST['idcliente']);
                $fecha=date('Y-m-d');
                $accion='Se eliminó un cliente con el id'.$_POST['idcliente'].' ';
                $modulo='Clientes';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

    public function buscar(){
        $data = '<div class="list-group list-group-flush mt-2" id="cliente">';
        $respuesta = $this->model->buscar($_POST["busqueda"]);
        if ($respuesta->rowCount() > 0) {
            foreach ($respuesta as $regist) {
                $data .= '<a onclick="consultarclientes('.$regist["id"].');" type="button" class="list-group-item text-dark list-group-item-action py-3">
                            <div class="row align-items-center">
                            <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                            <div class="col px-4">'.$regist['nombre'].' <small class="text-muted">'.$regist['telefono'].'</small></div>
                            <div class="col text-end"><i class="ti-marker-alt "></i></div>
                            </div> 
                        </a>';
            };
        }else {$data .= '<div class="row align-items-center">
                        <div class="col text-secondary text-center">No hay registros</div>
                      </div>';
        }
        $data .= '</div>';

        echo $data;
    }



}

?>