<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sesiones</title>

    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
  <!---<form action="<?php echo constant('URL'); ?>consulta/inicio" method="POST">--->
 <form action="<?php echo constant('URL') . 'inicio/inicioLo';?> " method="POST">
       <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }else{
                
            }
       ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
      
        <!---<p><a type="button" href="<?php echo constant ('URL') ?> . 'inicio/inicioLo/'">Inicio</a></p>--->

      <!---  <p><a href="<?php echo constant ('URL') . 'inicio/inicioLo/' ?>"></a></p>--->
     <p class="center"><input type="submit" value="Iniciar Sesión"></p>
       <!---<td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a></td>--->
    </form>
</body>
</html> 