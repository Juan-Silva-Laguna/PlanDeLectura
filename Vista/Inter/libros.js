$(document).ready(function(){   
    
    traerDatos();

    $(document).on('click', '#btn_agregar', function (e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Ingresa los detalles del libro',
            html: `
                <label>Nombre: </label>
                <input type="text" id="nombre" class="form-control" placeholder="Nombre">
                <br>
                <label>Autor: </label>
                <input type="text" id="autor" class="form-control" placeholder="Autor">
                <br>
                <label>Portada: </label>
                <input type="file" id="imagen" class="form-control" accept="image/*" placeholder="Imagen">
                <br>
                <label>Descripción: </label>
                <textarea id="descripcion" class="form-control" placeholder="Descripción"></textarea>
            `,
            confirmButtonText: 'Guardar',
            focusConfirm: false,
            preConfirm: () => {
                const nombre = document.getElementById('nombre').value;
                const autor = document.getElementById('autor').value;
                const imagen = document.getElementById('imagen').files[0]; // Obtenemos el archivo
                const descripcion = document.getElementById('descripcion').value;
    
                if (!nombre || !autor || !imagen || !descripcion) {
                    Swal.showValidationMessage('Por favor, complete todos los campos');
                    return false;
                }
    
                return { nombre, autor, imagen, descripcion };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { nombre, autor, imagen, descripcion } = result.value;
                // Crear un FormData para enviar los datos
                let formData = new FormData();
                formData.append('nombre', nombre);
                formData.append('autor', autor);
                formData.append('operacion', 'Creo');
                formData.append('descripcion', encodeURIComponent(descripcion));//decifra con decodeURIComponent()
                formData.append('imagen', imagen); // Archivo de imagen

                $.ajax({
                    url: '../Controlador/libro.controlador.php',
                    type: 'POST',
                    data: formData,
                    processData: false, // Para no procesar los datos (permite enviar archivos)
                    contentType: false, // No especificar tipo de contenido para enviar archivos
                    success: function (respuesta) {
                        let datos = JSON.parse(respuesta);
                        traerDatos();
                        Swal.fire({
                            toast: true,
                            icon: datos['status'],
                            title: datos['message'],
                            position: 'bottom-right',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    });

    function traerDatos() {

        let operacion = 'Consultar';   
        $.post('../Controlador/libro.controlador.php', {operacion}, function (respuesta) {
            var lib = '';
            $.each(JSON.parse(respuesta), function(index, val) {
                lib += `
                    <div class="card" data-image="../Controlador/${val.imagen}">
                        <div class="content">
                            <h2 class="title">${val.nombre}</h2>
                            <p class="copy">${val.descripcion.substring(0, 70)}...</p>
                            <a href="./info_libro.php?libro=${val.id}" class="btn btn-warning">Ver</a>
                        </div>
                    </div>
                `;
            });
            
            $('#contenedor_libros').html(lib);
            //cargar las imagenes
            document.querySelectorAll('.card').forEach(card => {
                const imageUrl = card.getAttribute('data-image');
                card.style.setProperty('--image-url', `url(${imageUrl})`);
                card.style.backgroundImage = `url(${imageUrl})`;
            });
        })
        .fail(function(){
            Swal.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        });

    }
    
})