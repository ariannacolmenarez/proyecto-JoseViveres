<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\usuariosModel;
use content\controllers\bitacoraController;
use content\libraries\core\builder;
use content\models\seguridadModel;

class usuariosController extends autoload {
    private $model;
    private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new usuariosModel;
        $this->bitacora = new bitacoraController;

    }

    public function  listar(){
        $data = '<div class="list-group list-group-flush mt-2" id="usuarios2">';

        $respuesta = $this->model->listar();

        if(in_array("Consultar Usuarios", $_SESSION['permisos'])){

            foreach ($respuesta as $regist) {
                if($regist['nombre'] != "SUPERUSUARIO"){
                     $data .= '<a';
                    if(in_array("Modificar Usuarios", $_SESSION['permisos'])){ 
                        $data.=' onclick="editarUsuarios('.$regist["id"].');"';
                    }
                    $data.=' type="button" class="list-group-item text-dark list-group-item-action py-3">
                    <div class="row align-items-center">
                    <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                    <div class="col px-4">'.$regist['nombre'].'</div>
                    </div>
                    </>';
                }else{
                   $data.='<a type="button" class="list-group-item text-dark list-group-item-action py-3">
                                <div class="row align-items-center">
                                <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                                <div class="col px-4">'.$regist['nombre'].'</div>
                                </div>
                                </a>';
                }
            }

        }

        $data .= '</div>';

        echo $data;

    }

    public function  listarRoles(){

        $respuesta = $this->model->listarRoles();
  
        foreach ($respuesta as $r){
          echo'  
          <option class="p-5" value="'.$r->id.'">'.$r->nombre.'</option>';
        };
  
      }

    public function consultar($id){
      
        $resp = $this->model->consultar($id);

        $resultados [] = [
            "nombre"=>$resp->getnombre(),
            "correo"=>$resp->getcorreo(),
            "contraseña"=>builder::desencriptar($resp->getcontraseña()),
            "id"=>$resp->getid(),
            "rol_usuario"=>$resp->getrol_usuario()
        ];
        echo json_encode($resultados);
      
    }

    public function guardar(){
        if (!empty($_POST['id'] && $_POST['nombre1'] && $_POST['correo'] )) {
            if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre1'] ) && 
            preg_match("|^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}+$|", $_POST['correo'] )) {
                $p=new usuariosModel();

                $p->setid($_POST['id']);
                $p->setnombre(strtoupper($_POST['nombre1']));
                $p->setcorreo($_POST['correo']);
                $p->setcontraseña($_POST['contraseña']);
                if(isset($_POST['rol'])){
                    $p->setrol_usuario($_POST['rol']);
                    if($_SESSION['id_usuario']==$_POST['id']){
                        $_SESSION['rol'] = $_POST['rol'];
                        $r = new seguridadModel;
                        $permisos = $r->obtenerPermisos($_SESSION['rol']);
                        $_SESSION["permisos"] = $permisos;
                    }
                }else{
                    $p->setrol_usuario($_SESSION['rol']);
                }

                $this->model->guardar($p);
                $fecha=date('Y-m-d');
                    $accion='Se modificó un Usuario '.$_POST['nombre1'].' ';
                    $modulo='Usuarios';
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
        if (!empty( $_POST['nombre'] && $_POST['correo'] && $_POST['rol'])) {
            if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] ) && preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['contraseña'] ) &&
            preg_match("|^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}+$|", $_POST['correo'] )) {
                $p=new usuariosModel();

                $p->setnombre(strtoupper($_POST['nombre']));
                $p->setcorreo($_POST['correo']);
                $p->setcontraseña($_POST['contraseña']);
                $p->setrol_usuario($_POST['rol']);

                $resp=$this->model->registrar($p);
                $fecha=date('Y-m-d');
                    $accion='Se registro un nuevo Usuario '.$_POST['nombre'].' ';
                    $modulo='Usuarios';
                    $id=$_SESSION['id_usuario'];
                    $this->bitacora->insertar(
                        $fecha,
                        $accion,
                        $modulo,
                        $id);
                echo json_encode($resp);
            }
		}
    }

    public function eliminar(){
			$this->model->eliminar($_POST['id']);
            $fecha=date('Y-m-d');
                $accion='Se eliminó un Usuario con el id: '.$_POST['id'].' ';
                $modulo='Usuarios';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

    public function buscar(){
        $data = '';
        $respuesta = $this->model->buscar($_POST["busqueda"]);
        if ($respuesta->rowCount() > 0) {
            foreach ($respuesta as $regist) {
                $data .= '<a onclick="consultarclientes('.$regist["id"].');" type="button" class="list-group-item text-dark list-group-item-action py-3">
                            <div class="row align-items-center">
                            <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                            <div class="col px-4">'.$regist['nombre'].' <small class="text-muted">'.$regist['correo'].'</small></div>
                            <div class="col text-end"><i class="ti-marker-alt "></i></div>
                            </div> 
                        </a>';
            };
        }else {$data .= '<div class="row align-items-center">
                        <div class="col text-secondary text-center">No hay registros</div>
                      </div>';
        }
        $data .= '';

        echo $data;
    }



}

?>