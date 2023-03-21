<?php
	namespace content\controllers;
	use content\libraries\core\autoload;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use content\libraries\core\builder;
    use content\libraries\core\Conexion;

require ('./assets/phpmailer/Exception.php');
require ('./assets/phpmailer/PHPMailer.php');
require ('./assets/phpmailer/SMTP.php');

class recuperarController extends autoload {
    
    
    public function recuperar(){

        $logitudPass = 6;
        $miPassword = substr( md5(microtime()), 1, $logitudPass);
        $clave = strtoupper($miPassword);
        $correo = trim($_POST['email']);
        $sql= "SELECT * FROM usuarios where correo = '$correo' and estado = 1";
        $desc=Conexion::conect()->prepare($sql);
        $desc->execute();
        $cantidad=$desc->rowCount();
        if ($cantidad == "0") {
            $data = null;
        }else{
            $pass=builder::encriptar($clave);   
            $updateClave = ("UPDATE usuarios SET contraseña ='$pass' WHERE correo ='$correo' ");
            $res=Conexion::conect()->prepare($updateClave);
            $res->execute();
            $mail = new PHPMailer(true);
        
            try {
                
                $mail->SMTPDebug = 0;                      
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com';                    
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'aripaocol@gmail.com';                    
                $mail->Password   = 'pavqktrjkwtwlgxk';                               
                $mail->SMTPSecure = 'ssl';         
                $mail->Port       = 465;   
                $mail->CharSet = 'UTF-8';                              

                $mail->setFrom($mail->Username, 'Market MP');
                $mail->addAddress($correo);     
                $mail->addReplyTo($mail->Username, 'Información');
                $mail->isHTML(true);                                  
                $mail->Subject = 'Recuperación de Acceso - Market MP';
                $mail->Body    = '
                                <h1>Recuperar Contraseña</h1><br>
                                <h3>Tu nueva clave de acceso al sistema es: </h3><h5>'.$clave.'</h5>
                                <p> Regresa al Login del sistema para iniciar sesión utilizando la nueva clave proporcionada</p><br>
                                <h3><a href="'._DIRECTORY_.'">Iniciar Sesión</a></h3>';
                $mail->send();

            } catch (Exception $e) {
                
                echo $e;
            }
            $data=true;
        } 
        print $data;
        
    }

}
?>