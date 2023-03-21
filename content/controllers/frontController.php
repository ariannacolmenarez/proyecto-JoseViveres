<?php
namespace content\controllers;
use content\config\settings\SysConfig;

	class frontController {
	
		function __construct($request){
			$url = implode("/", $request);
			preg_match_all('/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/',$url,
			$salida, PREG_PATTERN_ORDER);

			if(!empty($_SESSION['usuario']) || $url == "recuperar"){	
					
				if(!empty($salida[0][0])){
					
					$controlador = $url;
					$arr = explode("/", $controlador);
					$controller = $arr[0];
					$method = $arr[0]; 
					$params = "";

					if (!empty($arr[1]))
					{
						if ($arr[1] != "") {
							$method = $arr[1];
						}	
					}

					if (!empty($arr[2])) 
					{
						if ($arr[2] != "") {
							$params = $arr[2];
						}
					}
					
					$controllerFile = "content/controllers/".$controller."Controller.php";
					
					if(file_exists($controllerFile)){
						
						$cname="content\\controllers\\".$controller."Controller";
						//require_once($controllerFile);

						//$cname = "content\\controllers\\".$c;printf($cname);
						$i = new $cname;
						if (method_exists($i, $method)) {
							$i->{$method}($params);
						}else{
							die("<script>document.location.href='error';</script>");
						}
						
					}else{
						die("<script>document.location.href='error';</script>");
					}
					
				}else{
					$controlador = "content\\controllers\\loginController";
					//require_once "loginController.php";
					$controlador= new $controlador;
					call_user_func(array($controlador,"login"));
					
				}		
			}else{
				$controlador = "content\\controllers\\loginController";
				//require_once "loginController.php";
				$controlador= new $controlador;
				call_user_func(array($controlador,"login"));
				
			}
		}
	}

