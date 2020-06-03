<?php
class NuevoModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert($datos){
        try{
            //$query = $this->db->connect()->prepare('INSERT INTO ALUMN (MATRICULA, NOMBRE, APELLIDO, EDAD, SEXO, DIRECCION, CIUDAD, TELEFONO, CP, CORREO, FOTO , CONTRA) VALUES(:matricula, :nombre, :apellido, :edad, :sexo, :direccion, :ciudad, :telefono, :cp, :correo, :foto, :contra)');
            //$query->execute(['matricula' => $datos['matricula'], 'nombre' =>$datos['nombre'], 'apellido' =>$datos['apellido'], 'edad' =>$datos['edad'],'sexo' =>$datos['sexo'],'direccion'=>$datos['direccion'], 'ciudad' =>$datos['ciudad'],'telefono' =>$datos['telefono'],'cp' =>$datos['cp'],'correo' =>$datos['correo'],'foto' =>$datos['foto'],'contra' =>$datos['contra']]);
        $query = $this->db->connect()->prepare('INSERT INTO ALUMN (MATRICULA, NOMBRE, APELLIDO, EDAD, SEXO, DIRECCION, CIUDAD, TELEFONO, CP, CORREO, FOTO, CONTRA) VALUES(:matricula, :nombre, :apellido, :edad, :sexo, :direccion, :ciudad, :telefono, :cp, :correo, :foto, :contra)');
        $query->execute(['matricula' => $datos['matricula'], 'nombre' =>$datos['nombre'], 'apellido' =>$datos['apellido'], 'edad' =>$datos['edad'],'sexo' =>$datos['sexo'],'direccion'=>$datos['direccion'], 'ciudad' =>$datos['ciudad'],'telefono' =>$datos['telefono'],'cp' =>$datos['cp'],'correo' =>$datos['correo'],'foto' =>$datos['foto'],'contra' =>$datos['contra']]);
            return true;    
         }catch(PDOException $e){
          /*  echo $e->getMessage();*/
            //echo "Ya esxiste esa matricula";
            return false;    
        } 
    }
}
?>