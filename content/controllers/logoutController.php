<?php
namespace content\controllers;
use content\libraries\core\autoload;

class logoutController extends autoload{

		public function logout()
		{
			session_destroy();
			header("location:"._DIRECTORY_);
		}

	}
?>