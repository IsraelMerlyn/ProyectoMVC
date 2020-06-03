<?php 
//include_once 'models/user.php';
include_once 'include/user.php';
include_once 'include/user_session.php';
class Login extends Controller{

    function __construct(){
        /*$userSession = new UserSession();
        $user = new User();*/
        parent::__construct();

        $this->view->mensaje ="";
}
/*function render(){
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    } */
        function render(){
            $alumnos = $this->model->get();
            $this->view->alumnos = $alumnos;
         $this->view->render('login/indexx');
       //$this->view->render('indexLog');
        }
    /*$userSession = new UserSession();
    $user = new User();
 */


function inicio(){
    
    //$userSession = new UserSession();
    $user = new User();
    $user;
    if(isset($_SESSION['user'])){
        //echo "Hay sesión";
        $user->setUser($userSession->getCurrentUser());
    //include_once 'views/home.php';
      // include_once 'views/main/index.php';
      $this->view->render('main/indexx');
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        //echo "Validación de login";
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        //validamos el dato en la base de datos y devolvemos true o false dependiendo la sentancia.
        if ($user->userExists($userForm, $passForm)) {
            //echo "Usuario Validado";
            $this->$userSession->setCurrentUser($userForm);
            $this->$user->setUser($userForm);
           // require_once 'libs/view.php';
          //  include_once 'views/home.php';
           // require_once 'libs/app.php';
            //include_once 'views/main/index.php';
            //require_once 'libs/view.php';
           //$archivoController = 'controllers/main.php';
            //$app = new App();
            $this->view->render('main/indexx');
        }

        }else{
            $errorLogin = "nombre de usuario y/o password incorrecto";
            //include_once 'views/login.php';
           $this->view->render('indexLog');
        }
    }/*else{
        $this->view->render('main/index');
        //echo "Login";
      // include_once 'views/login.php';
       
    //$app = new App();
    }*/
    function cerrar(){
        
    $userSession = new UserSession();
    $userSession->closeSession();

    $this->view->render('login/index');
    }
        }

    function ingresoDatosController(){

            if (isset($_POST["username"])) {
        
   
           $datosController = array("usuario" => $_POST["username"],
                                    "password" => $_POST["passwordingreso"]);
   
           $repuesta = Crud::ingresoDatosModel($datosController, "pruebatabla");
   
           if ($repuesta["usuario"] == $_POST["username"] and $repuesta["password"] == $_POST["passwordingreso"] ) {
              
              //INICIAR SESIONES
              session_start();
             $_SESSION["validar"]=true;
            
             $this->view->render('main/index');
             //header("location:index.php?views=usuarios");
              }else
             //header("location:index.php?views=error");
             $this->view->render('login/index');
    }
              
       }
     
    


  ?>