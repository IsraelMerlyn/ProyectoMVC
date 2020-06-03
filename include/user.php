<?php
    include_once 'db.php';
    
    class User extends DB{
        private $nombre;
        private $username;

        public function userExists($user,$pass){
            $md5pass = md5($pass);
            $query = $this->connect()->prepare('SELECT * FROM usuario WHERE username = :user AND password = :pass');
            $query->execute(['user' => $user, 'pass' => $md5pass]);

            if ($query->rowCount()) {
                return true;
            }else{
                return false;
            }
        }
        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM usuario WHERE username = :user');
            $query->execute(['user' => $user]);

            foreach($query as $currentUse){
                $this->nombre = $currentUse['nombre'];
                $this->username = $currentUse['username'];
               
            }
        }

       /* public function getNombre(){
            return $this->nombre;
        }*/
    }

?>