<?php 
    include_once 'user_session.php';

class Cerrar extends Controller{

    function render(){
        
        $this->view->render('login/indexx');
    }

    function cerrarLo(){
    $userSession = new UserSession();
    $userSession->closeSession();

    //header("location: ../view/login/indexx.php");
    header("location: $this->views->render('header')");
    }   
}
?>
