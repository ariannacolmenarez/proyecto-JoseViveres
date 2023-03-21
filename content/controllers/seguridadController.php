<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\seguridadModel;
use content\controllers\bitacoraController;

class seguridadController extends autoload {
  private $model;
  private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new seguridadModel;
        $this->bitacora = new bitacoraController;

    }

    public function seguridad(){
        $data['page_tag'] = "Seguridad | Market MP";
        $data['page_title'] = "Seguridad";
        parent::getView("seguridad", $data);
        
    }


    public function  listarRoles(){
        $data = '<thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
  
        $respuesta = $this->model->listarRoles();
        if(in_array("Consultar Roles", $_SESSION['permisos'])){
            foreach ($respuesta as $regist) 
            { 
              $data .= '<tr>
                            <td>'.$regist['nombre'].'</td>
                            <td>'.$regist['descripcion'].'</td>
                            <td>
                            <div class="row">
                                ';
                                if(in_array("Eliminar Roles", $_SESSION['permisos']) && $regist['nombre'] != "superusuario" ){ 
                                $data.='<div class="col-lg-2 col-md-4">
                                <button onclick="eliminarRol('.$regist['id'].');" class="btn btn-outline-danger btn-rounded btn-icon">
                                    <i class="ti-trash"></i>
                                </button>
                                </div>';
                                }
                                if(in_array("Modificar Roles", $_SESSION['permisos'])&& $regist['nombre'] != "superusuario" ){
                                $data.='
                                <div class="col-lg-2 col-md-4">
                                <button onclick="consultarRoles('.$regist['id'].');" class="btn btn-outline-primary btn-rounded btn-icon" data-bs-target="#exampleModalToggle20" data-bs-toggle="modal">
                                    <i class="ti-marker-alt"></i>
                                </button>
                                </div>';
                                }
                                if(in_array("Crear Permisos", $_SESSION['permisos'])&& $regist['nombre'] != "superusuario" ){ 
                                $data.='
                                <div class="col-lg-2 col-md-4">
                                <button onclick="permisos('.$regist['id'].');" class="btn btn-outline-secondary btn-rounded btn-icon">
                                    <i class="ti-key"></i>
                                </button>
                                </div>';
                                }
                            $data.='</div>
                            </td>
                        </tr>';
            }
        }
      $data .= '</tbody>';
      echo $data;
  
    }

    public function registrarRol(){
        if (!empty( $_POST['nombre'])) {
            if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
                $p=new seguridadModel();
    
                $p->setnombreRol($_POST['nombre']);
                $p->setdescripcionRol($_POST['desc']);
    
                $resp=$this->model->registrarRol($p);
                $fecha=date('Y-m-d');
                    $accion='Se registro un nuevo rol '.$_POST['nombre'].' ';
                    $modulo='Seguridad';
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

    public function consultarRoles($id){
      
        $resp = $this->model->consultarRoles($id);
  
        $resultados [] = [
          "nombre"=>$resp->getnombreRol(),
          "descripcion"=>$resp->getdescripcionRol(),
        ];
        echo json_encode($resultados);
        
    }

    public function guardarRol(){
        if (!empty($_POST['id'] && $_POST['nombre'] )) {
            if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
                $p=new seguridadModel();
    
                $p->setidRol($_POST['id']);
                $p->setnombreRol($_POST['nombre']);
                $p->setdescripcionRol($_POST['descripcion']);

                $this->model->guardarRol($p);
                $fecha=date('Y-m-d');
                    $accion='Se modificó un Rol '.$_POST['nombre'].' ';
                    $modulo='Seguridad';
                    $id=$_SESSION['id_usuario'];
                    $this->bitacora->insertar(
                        $fecha,
                        $accion,
                        $modulo,
                        $id);   
            }   
        }
    }

    public function eliminarRol($id){
        $this->model->eliminarRol($id);
        $fecha=date('Y-m-d');
                $accion='Se eliminó un Rol con el id: '.$id.' ';
                $modulo='Seguridad';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
    }

    public function permisos(){
			$p = new seguridadModel();
			$rol_id = $_GET['c'];
			$permisos = $p->obtenerPermisos($rol_id);
			$data['page_tag'] = "Permisos | Market MP";
			$data['page_title'] = "Permisos";
			$data['rol_id'] = $rol_id;
			$data['permisos'] = $permisos;
			parent::getView("permisos", $data);
	}

    public function guardarPermisos(){
			
        if(isset($_POST)){
            $p = new seguridadModel();
            $rol_id = $_GET['c'];
            $p->eliminarRol_Permiso($rol_id);
            foreach ($_POST['permisos'] as $key => $permiso_id) {
                $p->insertarRol_Permiso($rol_id, $permiso_id);
            }
			$permisos = $p->obtenerPermisos($_SESSION['rol']);
            $_SESSION["permisos"] = $permisos;
            header("location:"._DIRECTORY_."seguridad");
        }
        else{
            header("location:"._DIRECTORY_);
        }
        
    }


}
?>