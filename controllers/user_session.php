<?php
  
    class UserSession {
        //constructor de la clase

        public function _construct(){
            //iniciando session
            session_start();
        }
        
        /*function render(){
            //$this->view->render('main/index');
           $this->view->render('login/index');
           
          }*/
        //metodo que nos ayudara a pedir un usuario a traves del parametro
        public function setCurrentUser($user){
            //guardamos valores a la session actual

            $_SESSION['user'] = $user;        
        }

        public function getCurrentUser(){
            return $_SESSION['user'];
        }

        public function closeSession(){
            //borra los valores de la sessiones
            session_unset();
            //destruye las sessiones
            session_destroy();
            
        }
    }
 
?>