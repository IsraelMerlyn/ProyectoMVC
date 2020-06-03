<?php 
include_once 'include/user.php';
include_once 'include/user_session.php';

    class Inicio extends Controller{

        function render(){            
            $this->view->render('login/indexx');            
        }
    function inicioLo(){

        $userSession = new UserSession();
        $user = new User();        
        if(isset($_SESSION['user'])){
            //echo "Hay sesión";
            $user->setUser($userSession->getCurrentUser());
           // include_once 'views/home.php';
           $this->view->render('login/home');            
        }else if(isset($_POST['username']) && isset($_POST['password'])){
            //echo "Validación de login";
            $userForm = $_POST['username'];
            $passForm = $_POST['password'];
            //validamos el dato en la base de datos y devolvemos true o false dependiendo la sentancia.
            if ($user->userExists($userForm, $passForm)) {
                //echo "Usuario Validado";
                $userSession->setCurrentUser($userForm);
                $user->setUser($userForm);
               // include_once 'views/home.php';
               $this->view->render('login/home');
    
            }else{
                $errorLogin = "nombre de usuario y/o password incorrecto";
             //   include_once 'views/login.php';
             $this->view->render('login/indexx');
            }
        }else{
            //echo "Login";
            //include_once 'views/login.php';
            $this->view->render('login/indexx');
         }
    }
    
    function cerrarSession(){
     //  $userSession = new UserSession();
       // $userSession->closeSession();
        $this->view->render('login/indexx');
    }

    }
  ?>