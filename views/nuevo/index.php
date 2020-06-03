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

    <div id="main">
        <h1 class="center">Seccion de nuevo</h1>


    <div class= "center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL'); ?>nuevo/registrarAlumno  " method="POST" enctype="multipart/form-data">
            <p>
                <lavel form="matricula">Matricula</lavel><br>
                    <input type="text" name="matricula" id="" placeholder="17620045 " required pattern="[0-9]+">
            </p>
            <p>
                <lavel form="nombre">Nombre</lavel><br>
                    <input type="text" name="nombre" id="" placeholder="Ingrese su nombre" required maxlength="20" pattern="[A-Z a-z]{3,20}">
            </p>
            <p>
                <lavel form="apellido">Apellido</lavel><br>
                    <input type="text" name="apellido" id="" placeholder="Ingrese su apellido" maxlength="20" pattern="[A-Za-z]{3,20}" required>
            </p>
            <p>
                <lavel form="edad">edad</lavel><br>
                    <input type="number" name="edad" id="" required min="8" max="70">
            </p><br>
            <p>
                <lavel form="sexo">sexo</lavel><br>
               <!---     <input type="text" name="sexo" id="" required>--->
                <td>
                   <input type="radio" name="sexo" value="Femenino" required="required" /> Femenino
                   <input type="radio" name="sexo" value="Masculino" required="required" /> Masculino
                </td>
            </p><br>
            <p>
                <lavel form="direccion">direccion</lavel><br>
                    <input type="text" name="direccion" id="" placeholder="Ingrese su direccion"  required>
            </p>
            <p>
                <lavel form="ciudad">ciudad</lavel><br>
                    <input type="text" name="ciudad" id="" requiered maxlength="25" pattern="[A-Z a-z]{5,25}" placeholder="Ingrese su ciudad" required>
            </p>
            <p>
                <lavel form="telefono">telefono</lavel><br>
                    <input type="text" name="telefono" id="" placeholder="9514940433" pattern="[0-9]{10}" required  >
            </p>
            <p>
                <lavel form="cp">cp</lavel><br>
                    <input type="text" name="cp" id="" required maxlength="5" placeholder="69800" pattern="[0-9]{5}" required>
            </p>
            <p>
                <lavel form="correo">correo</lavel><br>
                    <input type="email" name="correo" id="" placeholder="example@gmail.com" pattern="/([\w\-]+\@[\w\-]+\.[\w\-]+)/" required>
            </p>
            <p>
                <lavel form="contra">contraseña</lavel><br>
                <input type="password" name="contra" id="" maxlenght="8"  required >
            </p><br>
            <p>
                <lavel>Foto</lavel>
                <input type="hidden" name="foto" >
                <input type="file" name="foto" >                                                                  
            </p><br>
           <!--- </form>--->
            <p>
                <input type="submit"  id="enviar" value="Registar nuevo alumno" >
            </p>
           
        </form>
    </div>
   

    <?php require 'views/footer.php'; ?>
</body>
</html>