

 const botones = document.querySelectorAll(".bEliminar");
    botones.forEach(boton => {
        boton.addEventListener ("click", function(){
           // console.log("Josue_PruebaBotom");
           const matricula =this.dataset.matricula;
           //console.log(matricula);
           const confirm = window.confirm("¿Deseas eliminar al alumno " + matricula + " ?")

           if (confirm) {
               //solicitud AJAX
               httpReques("http://localhost/proyectosF/consulta/eliminarAlumno/" + matricula, function(){
               // httpReques("http://localhost/ProgramacionWeb/mvc/consulta/eliminarAlumno/" + matricula, function(){
                //devuelve el contenido de la solicitud    
                //console.log(this.responseText);
                document.querySelector("#respuesta").innerHTML = this.responseText;

                const tbody = document.querySelector("#tbody-alumnos");
                const fila =document.querySelector("#fila-" + matricula);
                tbody.removeChild(fila);
                });
           }

        });
    });

    function httpReques (url,collback) {
        const http = new XMLHttpRequest();
        http.open("GET", url);
        http.send();

        http.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                collback.apply(http);
            }
        }
    }
