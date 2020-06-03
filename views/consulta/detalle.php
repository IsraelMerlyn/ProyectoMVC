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
        <h1 class="center">Detalle <?php echo $this->alumno->matricula; ?> </h1>
    <div class= "center"><?php echo $this->mensaje;?></div>
        <form action="<?php echo constant('URL'); ?>consulta/actualizarAlumno" method="POST">
            <p>
                <lavel form="matricula">Matricula</lavel><br>
                    <input type="text" name="matricula" disabled value="<?php echo $this->alumno->matricula; ?>" required>
            </p>
            <p>
                <lavel form="nombre">Nombre</lavel><br>
                    <input type="text" name="nombre" value="<?php echo $this->alumno->nombre; ?>" required>
            </p>
            <p>
                <lavel form="apellido">Apellido</lavel><br>
                    <input type="text" name="apellido" value="<?php echo $this->alumno->apellido; ?>" required>
            </p>
            <p>
                <lavel form="edad">edad</lavel><br>
                    <input type="text" name="edad" value="<?php echo $this->alumno->edad; ?>" required>
            </p>
            <p>
                <lavel form="sexo">sexo</lavel><br>
                    <input type="text" name="sexo" value="<?php echo $this->alumno->sexo; ?>" required>
            </p>
            <p>
                <lavel form="direccion">direccion</lavel><br>
                    <input type="text" name="direccion" value="<?php echo $this->alumno->direccion; ?>" required>
            </p>
            <p>
                <lavel form="ciudad">ciudad</lavel><br>
                    <input type="text" name="ciudad" value="<?php echo $this->alumno->ciudad; ?>" required>
            </p>
            <p>
                <lavel form="telefono">telefono</lavel><br>
                    <input type="text" name="telefono" value="<?php echo $this->alumno->telefono; ?>" required>
            </p>
            <p>
                <lavel form="cp">cp</lavel><br>
                    <input type="text" name="cp" value="<?php echo $this->alumno->cp; ?>" required>
            </p>
            <p>
                <lavel form="correo">correo</lavel><br>
                    <input type="text" name="correo" value="<?php echo $this->alumno->correo; ?>" required>
            </p>
            <p>
                <lavel form="foto">foto</lavel><br>
                <input type="text" name="foto" value="<?php echo $this->alumno->foto; ?>" required>
                    
            </p>
            
            <p>
                <lavel form="contra">contraseña</lavel><br>
                    <input type="text" name="contra" value="<?php echo $this->alumno->contra; ?>" required>
            </p>
            
           
            <p>
                <input type="submit" value="Actualizar nuevo alumno">
            </p>
        </form>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>