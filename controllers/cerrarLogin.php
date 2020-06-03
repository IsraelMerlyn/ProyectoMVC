<?php 

    include_once 'user_session.php';

    class CerrarLog extends Controller{

        function render(){
            
            $this->view->render('login/indexx');
        }
       

        function cerrarL(){
        $userSession = new UserSession();
        $userSession->closeSession();
        header ("Location $this->view->render('login/indexx')");
        //$this->view->render('index');      
    //header("location: ../login/indexx");
    
    //$this->view->render('login/CerrarSession');
    //header("Location: /login/indexx.php");
    //$this->view->render('login/indexx');
    //$this->view->render('main/index');
    //header("location: ../login/index.php");
 //   header("location: ../index.php");
       }
    }

?>