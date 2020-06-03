<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->alumnos = [];  
        //echo "<p>Nuevo controlador Main</p>";
    }
    function render(){
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function verAlumno($param =null){
      
        $idAlumno =$param[0];
        $alumno =$this->model->getById($idAlumno);

        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula;
        $this->view->alumno = $alumno;
        $this->view->mensaje="";
        $this->view->render('consulta/detalle');
    }
    function correo(){
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
            $mail->setFrom('isramerlyn@gmail.com', '17620045_17620037');
            $mail->addAddress($correo, 'COntraseña');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Correo de contacto';
            $mail->Body    = 'Nombre: ' . $nombre . '<br/>Correo: ' . $correo . '<br/>' . $contraDash;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
          $mensaje ='Mensaje Enviado al correo, CORRECTAMENTE';
        } catch (Exception $e) {
        $mensaje = 'Error al enviar el mensaje:' . $correo->ErrorInfo;
        }
    }
   
    function actualizarAlumno(){
        session_start();

        $matricula = $_SESSION ['id_verAlumno'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $cp = $_POST['cp'];
        $correo = $_POST['correo'];
        $foto = $_POST['foto'];
        $contra = $_POST['contra'];
        $contraDash = password_hash($contra,PASSWORD_DEFAULT);
        unset($_SESSION['$id_verAlumno']);
        



        
        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad, 'sexo' => $sexo, 'direccion' => $direccion, 'ciudad' =>$ciudad, 'telefono' =>$telefono, 'cp'=>$cp, 'correo' =>$correo, 'foto' =>$foto, 'contra'=>$contra])) {
            //actualizar alumno exitoso
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
                $mail->addAddress($correo, 'COntraseña');     // Add a recipient
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Correo de contacto';
                $mail->Body    = 'Nombre: ' . $nombre . '<br/>Correo: ' . $correo . '<br/>' . $contraDash;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
              $mensaje ='Mensaje Enviado al correo, CORRECTAMENTE';
            } catch (Exception $e) {
                echo 'Error al enviar el mensaje: ', $correo->ErrorInfo;
            }
            $alumno =new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $alumno->edad = $edad;
            $alumno->sexo = $sexo;
            $alumno->direccion = $direccion;
            $alumno->ciudad = $ciudad;
            $alumno->telefono = $telefono;
            $alumno->cp = $cp;
            $alumno->correo = $correo;
            $alumno->foto = $foto;
            $alumno->contra = $contra;
          
            $this->view->alumno = $alumno;
            $this->view->mensaje="alumno actualizado correctamente";
        }else{
            //error al actualizar
            $this->view->mensaje="Error al actualizar alumno";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null){
        //mapeamos la matricula
        $matricula = $param[0];
        
        if ($this->model->delete($matricula)){
            //actualizar alumno exitoso
           $mensaje="Alumno eliminado correctamente";
           //$this->view->mensaje="alumno eliminado correctamente";
        }else{
            //error al actualizar
            $mensaje="NO se pudo elimina el Alumno correctamente";
            //$this->view->mensaje="Error al eliminar alumno";
        }
        //$this->render('consulta/detalle');
       // echo "se elimino " . $matricula;
       echo $mensaje;
    }

    /* $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index'); */ 

        function buscarAlumno(){
            if (isset($_POST['buscar'])) {
            $busqueda = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_SPECIAL_CHARS);
            $url = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_ENCODED);
                
            // $buscarD = $_POST ['$url'];
                $alumnos = $this->model->getBuscar($url);
                $this->view->alumnos = $alumnos;
                if ($this->model->getBuscar($url)){
                $this->view->mensaje="Alumno encontrado";
                //$this->view->render('consulta/buscador');
                }else{
                    $this->view->mensaje="Alumno NO encontrado";
                }
                    
            }    
                       
            $this->view->render('consulta/buscador'); 
    }
}
//$this->view->render('consulta/index');
            
            /*if ($this->model->getBuscar($buscarD)){
                    $mensaje="Alumno encontrado";
                
            }else{
                    $mensaje="no se encontro al alumno";
            }*/ 
?>