$(document).ready(function(){   

//para selecionar activo la pagina donde esta
const urlActual = window.location.href;
const nombreArchivo = urlActual.substring(urlActual.lastIndexOf('/') + 1);

if(nombreArchivo=="libros.php" || nombreArchivo=="planes.php" 
    || nombreArchivo=="index.php" || nombreArchivo=="premios.php" || nombreArchivo=="mis_planes.php"){
    document.getElementById(nombreArchivo).classList.add('active');
}else if (nombreArchivo.includes('ver_plan_lectura.php')){
    document.getElementById('planes.php').classList.add('active');
}
else if (nombreArchivo.includes('plan_lectura_compartido.php')){
    document.getElementById('mis_planes.php').classList.add('active');
}
    $(document).on('click', '#btn_validar', function (e) {
        e.preventDefault();
        const datos = {
            clave: $('#codigo_clave').val(),
            operacion: 'Validar', 
        };
        $.post('../Controlador/usuario.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);

            Swal.fire({
                toast: true,
                icon: datos['status'],
                title: datos['message'],
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            }).then(v =>{
                if(datos['status'] == "success"){
                    location.reload();
                }
            });
        })
      });

      $(document).on('click', '#btn_salir', function (e) {
        e.preventDefault();
        const datos = {
            operacion: 'Salir', 
        };
        $.post('../Controlador/usuario.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);

            Swal.fire({
                toast: true,
                icon: datos['status'],
                title: datos['message'],
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            }).then(v =>{
                if(datos['status'] == "success"){
                    location.reload();
                }else{
                    location.href= "index.php";
                }
            });

        })
      });
      

});