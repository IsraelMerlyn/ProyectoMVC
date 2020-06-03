<?php
    /*include_once 'include/user.php';
    include_once 'include/user_session.php';*/

class InicioSession extends Controller{

    function __construct(){
        parent::__construct();
          
        //echo "<p>Nuevo controlador Main</p>";
    }
    function render(){
        
        $this->view->render('login/indexx');
    }


    function iniciarLogin(){
        
   
    }
}
?>