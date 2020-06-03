<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>
    

        <!---<li><a href="index.php?action=history">History of Bolivia</a></li>
          <li><a href="index.php?action=buscar">Buscar</a></li>
            --->
   


    <div id="">
        
    <h1 class="center">Seccion de consultas</h1>
    
        <form action="<?php echo constant('URL') . 'consulta/buscarAlumno';?> " method="POST">
            <!---<div id="respuesta" class="center"></div>
            <td> <input name="buscador" type="search" id="b" placeholder="Buscar aquí" autofocus >
            <td><button > Buscar</button></td>--->
            <!---<lavel form="buscar">Buscar</lavel><br>--->
            <td><input type="search" name="buscar" placeholder="Buscar aquí" required ></td>
            <td><input type="submit" value="buscar" ></td>
            
        </form>
       <!---
        <td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a></td>--->
                 <!---   <td><a href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula; ?>">Eliminar</a></td> --->
                 <!---<td><button class="bEliminar" data-matricula="<?php echo $alumno->matricula; ?>"> Eliminar</button></td> --->
        <table width="100%">    
            <thead> 
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>edad</th>
                    <th>Sexo</th>
                    <th>direccion</th>
                    <th>ciudad</th>
                    <th>telefono</th>
                    <th>cp</th>
                    <th>correo</th>
                    <th>foto</th>
                    <th>contraseña</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
                <?php 
                include_once 'models/alumno.php';
                foreach($this->alumnos as $row){
                    $alumno = new Alumno();
                    $alumno = $row;
                 ?>

                <tr id="fila-<?php echo $alumno->matricula; ?>">
                    <td><?php echo $alumno->matricula; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><?php echo $alumno->edad; ?></td>
                    <td><?php echo $alumno->sexo; ?></td>
                    <td><?php echo $alumno->direccion; ?></td>
                    <td><?php echo $alumno->ciudad; ?></td>
                    <td><?php echo $alumno->telefono; ?></td>
                    <td><?php echo $alumno->cp; ?></td>
                    <td><?php echo $alumno->correo; ?></td>
                    <td><img  src="<?php echo $alumno->foto; ?>"></td>                    
                    <!---<td><?php echo $alumno->foto; ?></td>--->
                    <td><?php echo $alumno->contra; ?></td>

                    <td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a></td>
                 <!---   <td><a href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula; ?>">Eliminar</a></td> --->
                   <td><button class="bEliminar" data-matricula="<?php echo $alumno->matricula; ?>"> Eliminar</button></td>
                </tr>
                
                <?php  } ?>
            </tbody>
        </table>  
    </div>

        <script src="<?php echo constant('URL');?>public/js/main.js"></script>

    <?php require 'views/footer.php'; ?>
</body>
</html>