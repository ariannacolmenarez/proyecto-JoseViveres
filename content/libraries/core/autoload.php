<?php 
	namespace content\libraries\core; 
	class autoload
	{ protected $views;
		public function __construct()
		{
			//  $this->loadModel();
		}

		// public function loadModel()
		// {   
        //     $modelName = get_class($this);
        //     $res= array_reduce(
        //             str_split($modelName),
        //             function($c, $v) {
        //                 $c .= ctype_upper($v) ? ' ' . $v : $v;
        //                 return $c;
        //             }
        //         );
        //     $modelarray = (explode(" ", $res));
            
                
		// 	$model = $modelarray[0]."Model";
		// 	$routClass = "content/models/".$model.".php";
            
		// 	if (file_exists($routClass)) {
		// 		require_once($routClass);
		// 	}
		// }
		function getView($view, $data="")
		{
			if($view == "login"){
				$view= "view/".$view.".php";
				if (file_exists($view)) {
					require_once($view);
				}
			}else{
				$view = "view/".$view.".php";
				if (file_exists($view)) {
					require_once("content/component/header.php");
					require_once($view);
					require_once("content/component/footer.php");
				}
			}
			
		}
	}
	
?>