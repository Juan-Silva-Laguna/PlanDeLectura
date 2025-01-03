$(document).ready(function(){   
    
    traerDatos();

    function traerDatos() {
        $.post('../Controlador/libro.controlador.php', {operacion: 'ConsultarLibro', id: $('#id_libro').val()}, function (respuesta) {
            var lib = '';

            let data = JSON.parse(respuesta);

            $('#nombre').html(data.libro.nombre);
            $('#descripcion').html(data.libro.descripcion.replace(/\n/g, '<br>'));
            $('#autor').html(data.libro.autor);
            $('#imagen').attr('src','../Controlador/'+data.libro.imagen);
            
           
            if(data.planes.length > 0){
                let planes = '';
                $.each(data.planes, function(index, val) {
                    planes += `
                    <div class="service-item d-flex flex-column text-center rounded">
                        <h5 class="mb-3">${val.nombre}</h5>
                        <h6>${val.cantidad_dias} Dias</h6>
                        <p class="m-0">${val.descripcion.substring(0, 80)}...</p>
                        <a class="btn btn-square" href="./ver_plan_lectura.php?plan=${val.id}"><i class="fa fa-arrow-right"></i></a>
                    </div>
                    `;
                });
                $('#planes').html(planes);
            }
            
        })
        .fail(function(){
            Swal.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        });

    }
    
})