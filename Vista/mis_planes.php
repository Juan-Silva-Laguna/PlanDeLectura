<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        <style>

.progress-new {
  width: 100%;
  background-color: #e0e0e0;
  border-radius: 5px;
}

.progress-new-bar {
  width: 0;
  height: 20px;
  background-color: #9572cf;
  border-radius: 5px;
  text-align: center;
  color: white;
  transition: width 0.4s ease;
}

        </style>
        
        

        <!-- Service Start -->
        <div class="container-xxl">
            <div class="container px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>MIS PLANES<span></span></p>
                </div>
                <div class="row g-4 justify-content-center" id="planes">
                </div>
            </div>
        </div>
        <!-- Service End -->



<?php include('footer.php');?>
<script>

$.post('../Controlador/libro.controlador.php', {operacion: 'ConsultarPlanesUsuario'}, function (respuesta) {
            var lib = '';

            let data = JSON.parse(respuesta);

            if(data.planes.length > 0){
                let planes = '';
                $.each(data.planes, function(index, val) {
                    let top = val.puntos;
                    let progress = val.puntos_aprobados+val.puntos_reprobados;
                    let porcentaje = (progress/top)*100;
                    planes += `
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex flex-column text-center rounded">
                        <h5 class="mb-3">${val.nombre}</h5>
                        <h6>${val.cantidad_dias} Dias<br>${val.libro} de ${val.autor}</h6>
                        <div class="progress-new">
                            <div class="progress-new-bar" role="progressbar" style="width: ${porcentaje}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">${porcentaje}%</div>
                        </div>

                        <a class="btn btn-square" href="./plan_lectura_compartido.php?codigo=${val.id_plan_user}"><i class="fa fa-arrow-right"></i></a>
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