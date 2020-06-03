<?php

    class cerrarS extends Controller{
        //userSession = new UserSession();
        //$userSession->closeSession();
        function __construct(){
            parent::__construct();
            $this->view->alumnos = [];  
            //echo "<p>Nuevo controlador Main</p>";
        }
        function render(){
            
            $this->view->render('login/index');
        }
        function cerrarSe(){

        $userSession = new UserSession();
        $userSession->closeSession();
        //$this->view->render('main/index');
        }
    
    

    }
    
    ?>
