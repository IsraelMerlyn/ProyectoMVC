<?php

include_once 'models/alumno.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    
    public function get(){
        $items = [];
        try{

            $query = $this->db->connect()->query("SELECT * FROM alumn");

            while($row = $query->fetch()){
                $item = new Alumno();
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
                $item->edad = $row['edad'];
                $item->sexo = $row['sexo'];
                $item->direccion = $row['direccion'];
                $item->ciudad = $row['ciudad'];
                $item->telefono = $row['telefono'];
                $item->cp = $row['cp'];
                $item->correo = $row['correo'];
                $item->foto = $row['foto'];
                $item->contra = $row['contra'];
                
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];

        } 
    }
    /*
        $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query ="SELECT * FROM cursos WHERE lenguaje like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
        }
    */
    public function getBuscar($variable){    
/*
 $sentencia_select=$con->prepare('SELECT *FROM clientes ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
 */   
    $itemsa = [];
        //$query = $this->db->connect()->query("SELECT * FROM alumn WHERE nombre OR apellido LIKE '%$variable%'");
        $query = $this->db->connect()->query("SELECT matricula,nombre,apellido,telefono FROM alumn WHERE matricula LIKE '%$variable%' OR nombre LIKE '%$variable%' OR apellido LIKE '%$variable%' OR telefono LIKE '%$variable%'");
    try{     
        while($row = $query->fetch()){
            $ite = new Alumno();
           $ite->matricula = $row['matricula'];
            $ite->nombre = $row['nombre'];
            $ite->apellido = $row['apellido'];
            $ite->telefono = $row['telefono'];
            
            array_push($itemsa, $ite);
        }
        return $itemsa;
        
    }catch(PDOException $e){
        return [];
    }   
}

    public function getById($id){
        $item=new Alumno();
        $query = $this->db->connect()->prepare("SELECT * FROM alumn WHERE matricula = :matricula");
        try {
            $query->execute(['matricula' => $id]);
            while($row = $query->fetch()){
                $item->matricula = $row ['matricula'];
                $item->nombre = $row ['nombre'];
                $item->apellido = $row ['apellido'];
                $item->edad = $row['edad'];
                $item->sexo = $row['sexo'];
                $item->direccion = $row['direccion'];
                $item->ciudad = $row['ciudad'];
                $item->telefono = $row['telefono'];
                $item->cp = $row['cp'];
                $item->correo = $row['correo'];
                $item->foto = $row['foto'];
                $item->contra = $row['contra'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE alumn SET nombre = :nombre, apellido = :apellido, edad = :edad, sexo = :sexo, direccion = :direccion, ciudad = :ciudad, telefono = :telefono, cp =:cp, correo =:correo, foto =:foto, contra =:contra WHERE matricula = :matricula");
        try {
            $query->execute([
                'matricula' => $item ['matricula'],
                'nombre' => $item ['nombre'],
                'apellido' => $item ['apellido'],
                'edad' => $item ['edad'],
                'sexo' => $item ['sexo'],
                'direccion' => $item ['direccion'],
                'ciudad' => $item ['ciudad'],
                'telefono' => $item ['telefono'],
                'cp' => $item ['cp'],
                'correo' => $item ['correo'],
                'foto' => $item ['foto'],
                'contra' => $item ['contra']
            ]);
            return true;
        } catch (PDOException $e) {
            //throw $th;
            return false;
        }
    }
    public function validarCOntra(){
        
    }
    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM alumn WHERE matricula = :id");
        try {
            $query->execute([
                'id' =>$id,
                
            ]);
            return true;
        } catch (PDOException $e) {
            //throw $th;
            return false;
        }
    }
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

        public function getNombre(){
            return $this->nombre;
        }
}
?>