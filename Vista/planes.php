<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        
        
        

        <!-- Service Start -->
        <div class="container-xxl">
            <div class="container px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>PLANES<span></span></p>
                </div>
                <div class="row g-4 justify-content-center" id="planes">
                </div>
            </div>
        </div>
        <!-- Service End -->



<?php include('footer.php');?>
<script>

$.post('../Controlador/libro.controlador.php', {operacion: 'ConsultarPlanes'}, function (respuesta) {
            var lib = '';

            let data = JSON.parse(respuesta);

            if(data.planes.length > 0){
                let planes = '';
                $.each(data.planes, function(index, val) {
                    planes += `
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex flex-column text-center rounded">
                        <h5 class="mb-3">${val.nombre}</h5>
                        <h6>${val.cantidad_dias} Dias<br>${val.libro} de ${val.autor}</h6>
                        <p class="m-0">${val.descripcion.substring(0, 80)}...</p>
                        <a class="btn btn-square" href="./ver_plan_lectura.php?plan=${val.id}"><i class="fa fa-arrow-right"></i></a>
                    </div>
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
</script>