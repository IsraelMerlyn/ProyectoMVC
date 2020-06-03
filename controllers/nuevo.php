<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje ="";
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render(){
        $this->view->render('nuevo/index');
    }
    
    function subirImagen(){
        $directorio = "image/";

        $archivo = $directorio . basename($_FILES["file"]["name"]);
    
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    
        // valida que es imagen
        $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);
    
        //var_dump($size);
    
        if($checarSiImagen != false){
    
            //validando tamaño del archivo
            $size = $_FILES["file"]["size"];
    
            if($size > 50000000){
                echo "El archivo tiene que ser menor a 500kb";
            }else{
    
                //validar tipo de imagen
                if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                    // se validó el archivo correctamente
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                        echo "El archivo se subió correctamente";
                    }else{
                        echo "Hubo un error en la subida del archivo";
                    }
                }else{
                    echo "Solo se admiten archivos jpg/jpeg";
                }
            }
        }else{
            echo "El documento no es una imagen";
        }
    }
    function SanacionDatos(){
       /* $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $cp = $_POST['cp'];
        $correo = $_POST['correo'];
        //$foto = $_POST['foto'];
        $contra = $_POST['contra'];*/
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            echo("$email es válido");
          } else {
          
            echo("$email no es valido");
          }
    }

    function registrarAlumno(){

    /*if(isset($_POST['enviar'])) {
            $usuario = filter_input_array(INPUT_POST, FILTER_SANITIZE_ENCODED);
            
        }*/    
      /*  $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $cp = $_POST['cp'];
        $correo = $_POST['correo'];
        //$foto = $_POST['foto'];
        $contra = $_POST['contra'];
        $contraDash = password_hash($contra,PASSWORD_DEFAULT);
        //$mensaje ="";
        //$comment = $_POST['comment'];
        $mandarC = $correo;
        $mandarM = $contraDash;*/
       /* $matri = $_POST['matricula'];
        $nomb = $_POST['nombre'];
        $apel = $_POST['apellido'];
        $ed = $_POST['edad'];
        $se = $_POST['sexo'];
        $dir = $_POST['direccion'];
        $ciu = $_POST['ciudad'];
        $tele = $_POST['telefono'];
        $CP = $_POST['cp'];
        $corr = $_POST['correo'];
        //$foto = $_POST['foto'];*/
        
        $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
        //$matricula = filter_input(INPUT_POST,$matri, FILTER_VALIDATE_INT);
        $nombre = filter_input(INPUT_POST, 'nombre' , FILTER_SANITIZE_STRING);
        $apellido = filter_input(INPUT_POST, 'apellido' , FILTER_SANITIZE_STRING);
        $edad = filter_input(INPUT_POST, 'edad', FILTER_SANITIZE_NUMBER_INT);
        $sexo = $_POST['sexo'];
        //$edad = filter_input(INPUT_POST,$no, FILTER_VALIDATE_INT);
        $direccion = filter_input(INPUT_POST, 'direccion' , FILTER_SANITIZE_STRING);        
        $ciudad = filter_input(INPUT_POST,'ciudad' , FILTER_SANITIZE_STRING);        
        $telefono = filter_input(INPUT_POST,'telefono', FILTER_SANITIZE_NUMBER_INT);
        //$telefono= filter_input(INPUT_POST,$te, FILTER_VALIDATE_INT);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
        //$cp= filter_input(INPUT_POST,$c, FILTER_VALIDATE_INT);
        $correo = filter_input(INPUT_POST,'correo' ,FILTER_SANITIZE_EMAIL);     
        //$correo = filter_input(INPUT_POST, $cor ,FILTER_VALIDATE_EMAIL); 
        
        $contra = $_POST['contra'];
        $contraDash = password_hash($contra,PASSWORD_DEFAULT);
        //$mensaje ="";
        //$comment = $_POST['comment'];
        
        //$add="uploads/$file_name";
        $directorio = "image/";
        
        $archivo = $directorio . basename($_FILES["foto"]["name"]);    
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        // valida que es imagen
        $checarSiImagen = getimagesize($_FILES["foto"]["tmp_name"]);    
        //var_dump($size);    
     /*   if($checarSiImagen != false){
    
            //validando tamaño del archivo
            $size = $_FILES["file"]["size"];
    
            if($size > 50000000){
                echo "El archivo tiene que ser menor a 500kb";
            }else{
    
                //validar tipo de imagen
                if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                    // se validó el archivo correctamente
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                        //echo "El archivo se subió correctamente";
                    }else{
                        echo "Hubo un error en la subida del archivo";
                    }
                }else{
                    echo "Solo se admiten archivos jpg/jpeg";
                }
            }
        }*/
        

    //if($this->model->insert(['matricula' =>$matricula,'nombre' =>$nombre, 'apellido' =>$apellido,'edad' =>$edad,'sexo' =>$sexo,'direccion' => $direccion, 'ciudad' =>$ciudad, 'telefono' =>$telefono,'cp' =>$cp,'correo' =>$correo,'foto' =>$foto,'contra' =>$contra])){ 
      
        if($checarSiImagen != false){
        //validando tamaño del archivo
        $size = $_FILES["foto"]["size"];

        if($size > 50000000){
            $mensaje="El archivo tiene que ser menor a 500kb";
        }else{
            //validar tipo de imagen
            if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                // se validó el archivo correctamente
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo)){
                    //echo "El archivo se subió correctamente";
                    if($this->model->insert(['matricula' =>$matricula,'nombre' =>$nombre, 'apellido' =>$apellido,'edad' =>$edad,'sexo' =>$sexo,'direccion' => $direccion, 'ciudad' =>$ciudad, 'telefono' =>$telefono,'cp' =>$cp,'correo' =>$correo,'foto' =>$archivo,'contra' =>$contra])){      
    
                        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'isramerlyn@gmail.com';                 // SMTP username
                    $mail->Password = '123Josue#';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                    //Recipients
                    $mail->setFrom('isramerlyn@gmail.com', 'Mailer');
                    $mail->addAddress($correo, 'Contraseña');     // Add a recipient
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Correo de contacto';
                    $mail->Body    = 'Nombre: ' . $nombre . '<br/>Correo: ' . $correo . '<br/>' . $contraDash;
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                  $mensaje ='Mensaje Enviado al correo, CORRECTAMENTE';
                } catch (Exception $e) {
                   // echo 'Error al enviar el mensaje: ', $correo->ErrorInfo;
                   $mensaje="ERROR" . $correo->ErrorInfo;
                }
                
            $mensaje = "Nuevo alumno creado";
            //$mensaje = "Mensaje enviado al Correo correctamente";
        }else{   
            $mensaje = "La matricula ya existe";
        }
                }else{
                   $mensaje= "Hubo un error en la subida del archivo";
                }
            }else{
                $mensaje="Solo se admiten archivos jpg/jpeg";
            }
        }
    }
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
?>