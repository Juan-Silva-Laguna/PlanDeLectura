<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        <style>
            .cbh-phone {
    display: block;
    position: fixed;
    right: -55.5px;
    bottom: 180px;
    visibility: hidden;
    background-color: transparent;
    width: 200px;
    height: 60px;
    cursor: pointer;
    z-index: 999;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    -webkit-transition: visibility .5s;
    -moz-transition: visibility .5s;
    -o-transition: visibility .5s;
    transition: visibility .5s
}
.cbh-phone.cbh-show {
    visibility: visible
}
@-webkit-keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}
@keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        -ms-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none
    }
}
@-webkit-keyframes fadeInRightBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}
@-webkit-keyframes fadeOutRight {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
}
@keyframes fadeOutRight {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        -ms-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
}
.fadeOutRight {
    -webkit-animation-name: fadeOutRight;
    animation-name: fadeOutRight
}
.cbh-phone.cbh-static1 {
    opacity: .6
}
.cbh-phone.cbh-hover1 {
    opacity: 1
}
.cbh-ph-circle {
    width: 120px;
    height: 120px;
    top: 40px;
    left: 40px;
    position: absolute;
    background-color: transparent;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid rgba(30, 30, 30, .4);
    opacity: .1;
    -webkit-animation: cbh-circle-anim 1.2s infinite ease-in-out;
    -moz-animation: cbh-circle-anim 1.2s infinite ease-in-out;
    -ms-animation: cbh-circle-anim 1.2s infinite ease-in-out;
    -o-animation: cbh-circle-anim 1.2s infinite ease-in-out;
    animation: cbh-circle-anim 1.2s infinite ease-in-out;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s
}
.cbh-phone.cbh-active .cbh-ph-circle1 {
    -webkit-animation: cbh-circle-anim 1.1s infinite ease-in-out !important;
    -moz-animation: cbh-circle-anim 1.1s infinite ease-in-out !important;
    -ms-animation: cbh-circle-anim 1.1s infinite ease-in-out !important;
    -o-animation: cbh-circle-anim 1.1s infinite ease-in-out !important;
    animation: cbh-circle-anim 1.1s infinite ease-in-out !important
}
.cbh-phone.cbh-static .cbh-ph-circle {
    -webkit-animation: cbh-circle-anim 2.2s infinite ease-in-out !important;
    -moz-animation: cbh-circle-anim 2.2s infinite ease-in-out !important;
    -ms-animation: cbh-circle-anim 2.2s infinite ease-in-out !important;
    -o-animation: cbh-circle-anim 2.2s infinite ease-in-out !important;
    animation: cbh-circle-anim 2.2s infinite ease-in-out !important
}
.cbh-phone.cbh-hover .cbh-ph-circle {
    border-color: rgba(0, 175, 242, 1);
    opacity: .5
}
.cbh-phone.cbh-green.cbh-hover .cbh-ph-circle {
    border-color: rgba(117, 235, 80, 1);
    opacity: .5
}
.cbh-phone.cbh-green .cbh-ph-circle {
    border-color: rgba(0, 175, 242, 1);
    opacity: .5
}
.cbh-phone.cbh-gray.cbh-hover .cbh-ph-circle {
    border-color: rgba(204, 204, 204, 1);
    opacity: .5
}
.cbh-phone.cbh-gray .cbh-ph-circle {
    border-color: rgba(117, 235, 80, 1);
    opacity: .5
}
.cbh-ph-circle-fill {
    width: 84px;
    height: 84px;
    top: 58px;
    left: 58px;
    position: absolute;
    background-color: #000;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid transparent;
    opacity: .1;
    -webkit-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out;
    -moz-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out;
    -ms-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out;
    -o-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out;
    animation: cbh-circle-fill-anim 2.3s infinite ease-in-out;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s
}
.cbh-phone.cbh-active .cbh-ph-circle-fill {
    -webkit-animation: cbh-circle-fill-anim 1.7s infinite ease-in-out !important;
    -moz-animation: cbh-circle-fill-anim 1.7s infinite ease-in-out !important;
    -ms-animation: cbh-circle-fill-anim 1.7s infinite ease-in-out !important;
    -o-animation: cbh-circle-fill-anim 1.7s infinite ease-in-out !important;
    animation: cbh-circle-fill-anim 1.7s infinite ease-in-out !important
}
.cbh-phone.cbh-static .cbh-ph-circle-fill {
    -webkit-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out !important;
    -moz-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out !important;
    -ms-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out !important;
    -o-animation: cbh-circle-fill-anim 2.3s infinite ease-in-out !important;
    animation: cbh-circle-fill-anim 2.3s infinite ease-in-out !important;
    opacity: 0 !important
}
.cbh-phone.cbh-hover .cbh-ph-circle-fill {
    background-color: rgba(0, 175, 242, .5);
    opacity: .75 !important
}
.cbh-phone.cbh-green.cbh-hover .cbh-ph-circle-fill {
    background-color: rgba(117, 235, 80, .5);
    opacity: .75 !important
}
.cbh-phone.cbh-green .cbh-ph-circle-fill {
    background-color: rgba(0, 175, 242, .5);
    opacity: .75 !important
}
.cbh-phone.cbh-gray.cbh-hover .cbh-ph-circle-fill {
    background-color: rgba(204, 204, 204, .5);
    opacity: .75 !important
}
.cbh-phone.cbh-gray .cbh-ph-circle-fill {
    background-color: rgba(117, 235, 80, .5);
    opacity: 1 !important
}
.cbh-ph-img-circle1 {
    width: 60px;
    height: 60px;
    top: 70px;
    left: 70px;
    position: absolute;
    background-size: 50px 50px;
    background-color: rgba(30, 30, 30, .1);
    background-position: 40% 50%;
    background-repeat: no-repeat;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    border: 2px solid transparent;
    opacity: 1;
    -webkit-animation: cbh-circle-img-anim 1s infinite ease-in-out;
    -moz-animation: cbh-circle-img-anim 1s infinite ease-in-out;
    -ms-animation: cbh-circle-img-anim 1s infinite ease-in-out;
    -o-animation: cbh-circle-img-anim 1s infinite ease-in-out;
    animation: cbh-circle-img-anim 1s infinite ease-in-out
}
.cbh-phone.cbh-active .cbh-ph-img-circle1 {
    -webkit-animation: cbh-circle-img-anim 1s infinite ease-in-out !important;
    -moz-animation: cbh-circle-img-anim 1s infinite ease-in-out !important;
    -ms-animation: cbh-circle-img-anim 1s infinite ease-in-out !important;
    -o-animation: cbh-circle-img-anim 1s infinite ease-in-out !important;
    animation: cbh-circle-img-anim 1s infinite ease-in-out !important
}
.cbh-phone.cbh-static .cbh-ph-img-circle1 {
    -webkit-animation: cbh-circle-img-anim 0s infinite ease-in-out !important;
    -moz-animation: cbh-circle-img-anim 0s infinite ease-in-out !important;
    -ms-animation: cbh-circle-img-anim 0s infinite ease-in-out !important;
    -o-animation: cbh-circle-img-anim 0s infinite ease-in-out !important;
    animation: cbh-circle-img-anim 0s infinite ease-in-out !important
}
.cbh-phone.cbh-hover .cbh-ph-img-circle1 {
    background-color: rgba(0, 175, 242, 1)
}
.cbh-phone.cbh-green.cbh-hover .cbh-ph-img-circle1:hover {
    background-color: rgba(117, 235, 80, 1)
}
.cbh-phone.cbh-green .cbh-ph-img-circle1 {
    background-color: rgba(0, 175, 242, 1)
}
.cbh-phone.cbh-green .cbh-ph-img-circle1 {
    background-color: rgba(0, 175, 242, 1)
}
.cbh-phone.cbh-gray.cbh-hover .cbh-ph-img-circle1 {
    background-color: rgba(204, 204, 204, 1)
}
.cbh-phone.cbh-gray .cbh-ph-img-circle1 {
    background-color: rgba(117, 235, 80, 1)
}
@-moz-keyframes cbh-circle-anim {
    0% {
        -moz-transform: rotate(0deg) scale(0.5) skew(1deg);
        opacity: .1;
        -moz-opacity: .1;
        -webkit-opacity: .1;
        -o-opacity: .1
    }
    30% {
        -moz-transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5;
        -moz-opacity: .5;
        -webkit-opacity: .5;
        -o-opacity: .5
    }
    100% {
        -moz-transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .6;
        -moz-opacity: .6;
        -webkit-opacity: .6;
        -o-opacity: .1
    }
}
@-webkit-keyframes cbh-circle-anim {
    0% {
        -webkit-transform: rotate(0deg) scale(0.5) skew(1deg);
        -webkit-opacity: .1
    }
    30% {
        -webkit-transform: rotate(0deg) scale(.7) skew(1deg);
        -webkit-opacity: .5
    }
    100% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg);
        -webkit-opacity: .1
    }
}
@-o-keyframes cbh-circle-anim {
    0% {
        -o-transform: rotate(0deg) kscale(0.5) skew(1deg);
        -o-opacity: .1
    }
    30% {
        -o-transform: rotate(0deg) scale(.7) skew(1deg);
        -o-opacity: .5
    }
    100% {
        -o-transform: rotate(0deg) scale(1) skew(1deg);
        -o-opacity: .1
    }
}
@keyframes cbh-circle-anim {
    0% {
        transform: rotate(0deg) scale(0.5) skew(1deg);
        opacity: .1
    }
    30% {
        transform: rotate(0deg) scale(.7) skew(1deg);
        opacity: .5
    }
    100% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .1
    }
}
@-moz-keyframes cbh-circle-fill-anim {
    0% {
        -moz-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
    50% {
        -moz-transform: rotate(0deg) -moz-scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        -moz-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
}
@-webkit-keyframes cbh-circle-fill-anim {
    0% {
        -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
    50% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        -webkit-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
}
@-o-keyframes cbh-circle-fill-anim {
    0% {
        -o-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
    50% {
        -o-transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        -o-transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
}
@keyframes cbh-circle-fill-anim {
    0% {
        transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
    50% {
        transform: rotate(0deg) scale(1) skew(1deg);
        opacity: .2
    }
    100% {
        transform: rotate(0deg) scale(0.7) skew(1deg);
        opacity: .2
    }
}
@keyframes cbh-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        transform: rotate(25deg) scale(1) skew(1deg)
    }
    100%,
    50% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
}
@-moz-keyframes cbh-circle-img-anim {
    0% {
        transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -moz-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -moz-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -moz-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -moz-transform: rotate(25deg) scale(1) skew(1deg)
    }
    100%,
    50% {
        -moz-transform: rotate(0deg) scale(1) skew(1deg)
    }
}
@-webkit-keyframes cbh-circle-img-anim {
    0% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -webkit-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -webkit-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -webkit-transform: rotate(25deg) scale(1) skew(1deg)
    }
    100%,
    50% {
        -webkit-transform: rotate(0deg) scale(1) skew(1deg)
    }
}
@-o-keyframes cbh-circle-img-anim {
    0% {
        -o-transform: rotate(0deg) scale(1) skew(1deg)
    }
    10% {
        -o-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    20% {
        -o-transform: rotate(25deg) scale(1) skew(1deg)
    }
    30% {
        -o-transform: rotate(-25deg) scale(1) skew(1deg)
    }
    40% {
        -o-transform: rotate(25deg) scale(1) skew(1deg)
    }
    100%,
    50% {
        -o-transform: rotate(0deg) scale(1) skew(1deg)
    }
}
.cbh-ph-img-circle1 {}
.cbh-phone.cbh-green .cbh-ph-circle {
    border-color: rgb(0, 242, 164)
}
.cbh-phone.cbh-green .cbh-ph-circle-fill {
    background-color: rgb(0, 242, 164);
}
.cbh-phone.cbh-green .cbh-ph-img-circle1 {
    background-color:  rgb(98 34 204 / 72%);
}
.kmacb__manager-border {
    position: absolute;
    width: 75px;
    height: 75px;
    top: 50%;
    left: 50%;
    margin-top: -39.5px;
    margin-left: -39.5px;
    border-radius: 100%;
    border: 2px solid #ffe787;
    -webkit-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -moz-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -ms-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -o-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    opacity: .8;
    transform-origin: center;
}
.kmacb__manager-fill {
    background: #52aff7 center bottom no-repeat;
    position: absolute;
    width: 75px;
    height: 75px;
    top: 50%;
    left: 50%;
    margin-top: -37.5px;
    margin-left: -37.5px;
    border-radius: 100%;
    opacity: .5;
    -webkit-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -moz-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -ms-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -o-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    transform-origin: center;
}
.kmacb__manager-circle {
    background: #52aff7;
    position: absolute;
    width: 120px;
    height: 120px;
    top: 50%;
    left: 50%;
    margin-top: -60px;
    margin-left: -60px;
    border-radius: 100%;
}
        </style>
<div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="">
        <a id="WhatsApp-button" href="./premios.php"  class="phoneJs" title="WhatsApp 360imagem">
            <div class="cbh-ph-circle"></div>
            <div class="cbh-ph-circle-fill"></div>
            <div class="cbh-ph-img-circle1" ><i style="color: #fff; margin-top: 12px; margin-left: 12px; font-size: 29px;" class="fa fa-trophy"></i></div>
        </a>
    </div>
        <div class="container-xxl">
            <div class="container px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>PLAN DE LECTURA<span></span></p>
                </div>
                <br>
                <div class="row g-4">
                    <div class="col-md-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                        <h2 id="nombre_plan"></h2>
                        <h3><span id="cantidad_dias"></span> Dias</h3>
                        <div id="descripcion_plan"></div>
                    </div>
                    <div class="col-md-2 mt-3 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <img src="" alt="portada" id="imagen" class="img-fluid">
                        <h5 id="nombre_libro"></h5>
                        <h5 id="autor"></h5>
                    </div>
                </div>
            </div>
        </div>
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
        <link rel="stylesheet" href="../Assets/css/share.css">

        <input type="hidden" id="id_plan_user" value="<?= $_GET['codigo']; ?>">

        <div id="items"></div>

<?php include('footer.php');?>
  <script src="../Assets/js/share.js"></script>
<script>
$(document).ready(function() {
    consultar();

    <?php
    if (!isset($_SESSION['nombre'])) {
?>
            Swal.fire({
                title: 'Ingrese el código',
                input: 'password',
                inputPlaceholder: 'Ingrese el código aquí',
                showCancelButton: false,
                confirmButtonText: 'Ingresar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: true,
                backdrop: true, // Hace que el alert cubra toda la pantalla con un fondo oscuro
                preConfirm: (codigo) => {
                    if (!codigo) {
                    Swal.showValidationMessage('Debe ingresar un código');
                    }
                    return codigo;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const datos = {
                        clave: result.value,
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
                            timer: 1000,
                            timerProgressBar: true,
                        }).then(v =>{
                            location.reload();
                        });
                    })
                }
            });
            <?php
    }
?>

    // Captura el evento click en los botones .enviar_respuesta, incluso si se generan dinámicamente
    $(document).on('click', '.enviar_respuesta', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        const seleccionada = $('input[name="opcion-'+id+'"]:checked').val();

        // Muestra o procesa el valor seleccionado
        if (seleccionada) {
            const respuesta = $(this).data('respuesta');
            let aprobo = 0;
            if (seleccionada == respuesta) {
                aprobo = 1;
            }

            
            $.post('../Controlador/agregar_puntaje.controlador.php', {id, aprobo, seleccionada}, function (respuesta) {
                
                    let datos = JSON.parse(respuesta);
    
                    Swal.fire({
                        toast: true,
                        icon: datos['status'],
                        title: datos['message'],
                        position: 'bottom-right',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    }).then(v =>{
                        location.reload();
                    });
            })
        } else {
            alert();
            Swal.fire({
                toast: true,
                icon: 'error',
                title: "Por favor selecciona una opción.",
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
        }
        
    });

    $(document).on('click', '.enviar_respuesta_item', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        
        let respuestas = {};
        let respuestas_corr = {};

        // Seleccionar el contenedor específico y obtener los elementos
        $('#accordion-'+id).find('input[type="radio"]:checked').each(function() {
            // Asignar el valor del radio button seleccionado usando su atributo 'name' como clave
            respuestas[$(this).attr('name')] = $(this).val();
        });

        // Obtener el valor del input hidden en el contenedor
        $('#accordion-'+id).find('input[type="hidden"]').each(function() {
            respuestas_corr[$(this).attr('id')] = $(this).val();
        });

        if (Object.keys(respuestas).length != Object.keys(respuestas_corr).length) {
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Seleccione todas las respuestas',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            return;
        }

        let can_aprobados = 0;
        Object.entries(respuestas_corr).forEach(([clave, valor]) => {
            let id  = clave.match(/\d+$/)[0];
            let aprobo = respuestas['opcion_item_'+id] == valor?1:0;
            let seleccionada = respuestas['opcion_item_'+id];
            
            $.post('../Controlador/agregar_puntaje.controlador.php', {id, aprobo, seleccionada}, function (respuesta) {
                
                let datos = JSON.parse(respuesta);
                if (datos['status']=="success") {
                    can_aprobados++;
                }
                
            })
        });

        Swal.fire({
            toast: true,
            icon: Object.keys(respuestas_corr).length==can_aprobados?"success":"warning",
            title: Object.keys(respuestas_corr).length==can_aprobados?"Excelente":"Buen trabajo",
            position: 'bottom-right',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });

        console.log();
        console.log(respuestas_corr);
        
    });
});


    function consultar() {
        $.post('../Controlador/ver_plan_compartido.controlador.php', {id_plan_user: $('#id_plan_user').val()}, function (respuesta) {
            let res = JSON.parse(respuesta);
            
            $('#nombre_plan').html(res.nombre);
            $('#descripcion_plan').html(res.descripcion);
            $('#cantidad_dias').html(res.cantidad_dias);
            $('#autor').html(res.autor);
            $('#nombre_libro').html(res.nom_libro);
            $('#imagen').attr('src','../Controlador/'+res.img_libro);
            const fechaActual = new Date();
            let cont_dia = 0;
            if (res.items.length >0) {
                let items = '';
                res.items.forEach(item => {
                    

                    let sub_items = '';
                    item.sub_items.forEach((sub_item, key) => {
                        cont_dia++;
                        let dia = new Date(sub_item.fecha+ "T00:00:00");

                        fechaActual.setHours(0, 0, 0, 0);
                        dia.setHours(0, 0, 0, 0);

                        let estado = "";
                        let env = "";
                        if (dia>fechaActual) {
                            estado = "bloqueo"
                        }else if (dia<fechaActual && sub_item.aprobo == null) {
                            estado = "warning"
                        }else if (dia<=fechaActual && sub_item.aprobo == 1) {
                            estado = "success"
                        }else if (dia<=fechaActual && sub_item.aprobo == 0) {
                            estado = "error"
                        }else if (dia.getTime() === fechaActual.getTime()) {
                            estado = "desbloqueo"
                            env = `
                            <div class="text-center">
                                <button class="btn btn-primary mx-auto enviar_respuesta" id="${sub_item.id_puntaje}" style="background-color: #6222cc; color: #fff; font-family: Arial;" data-respuesta="${sub_item.respuesta_correcta}">Enviar</button>
                            </div>
                            `;
                        }

                        
                        let opcionesFormato = {
                            weekday: "long",   // Día de la semana completo (lunes, martes, etc.)
                            day: "numeric",    // Día del mes (1, 2, 3, etc.)
                            month: "long",     // Mes en formato largo (enero, febrero, etc.)
                            year: "2-digit"    // Año con dos dígitos (24 en lugar de 2024)
                        };

                        let fechaFormateada = new Intl.DateTimeFormat("es-ES", opcionesFormato).format(dia);

                        
                        let res3 = '';

                        if (sub_item.respuesta3!='') {
                            res3 = `
                            <div class="flex">
                                <input type="radio" ${sub_item.respuesta==sub_item.respuesta3?'checked':''} name="opcion-${sub_item.id_puntaje}" value="${sub_item.respuesta3}"> &nbsp;&nbsp;
                                <p>${sub_item.respuesta3} </p>
                            </div>
                            `;
                        }
                        let res4 = '';

                        if (sub_item.respuesta4!='') {
                            res4 = `
                            <div class="flex">
                                <input type="radio" ${sub_item.respuesta==sub_item.respuesta4?'checked':''} name="opcion-${sub_item.id_puntaje}" value="${sub_item.respuesta4}"> &nbsp;&nbsp;
                                <p>${sub_item.respuesta4} </p>
                            </div>
                            `;
                        }
                        sub_items += `
                        <div id="${sub_item.fecha}" class="cd-timeline__block">
                            <div class="mt-4 cd-timeline__img cd-timeline__img--${estado}">
                                <img src="../Assets/img/${estado}.png" alt="Picture">
                            </div> 
                            <div class="cd-timeline__content text-component" ${estado=='desbloqueo'?'style="background-color: #ded5ec;"':''}>
                            <h2>Dia ${cont_dia}</h2>
                            <p class="color-contrast-medium">${sub_item.sub_item} </p>
                            <div class="justify-between items-center">
                                <span class="cd-timeline__date">${fechaFormateada} </span>
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" ${estado=='bloqueo'?'disabled':''} type="button" data-bs-toggle="collapse" data-bs-target="#evaluar-${sub_item.fecha}" aria-expanded="false" aria-controls="evaluar-${sub_item.fecha}">
                                            <i class="fa fa-file-alt"></i> &nbsp;&nbsp;  Evaluar &nbsp;
                                        </button>
                                        </h2>
                                        <div id="evaluar-${sub_item.fecha}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <strong>${sub_item.pregunta}</strong> 
                                            <br><br>
                                            <div class="flex">
                                                <input type="radio" ${sub_item.respuesta==sub_item.respuesta1?'checked':''} name="opcion-${sub_item.id_puntaje}" value="${sub_item.respuesta1}"> &nbsp;&nbsp;
                                                <p>${sub_item.respuesta1} </p>
                                            </div>
                                            <div class="flex">
                                                <input type="radio" ${sub_item.respuesta==sub_item.respuesta2?'checked':''} name="opcion-${sub_item.id_puntaje}" value="${sub_item.respuesta2}"> &nbsp;&nbsp;
                                                <p>${sub_item.respuesta2} </p>
                                            </div>
                                            ${res3}
                                            ${res4}
                                            ${env}
                                            ${estado=='error' || estado == 'warning' ? '<div class="text-center mt-2 fw-bold">'+sub_item.respuesta_correcta+'</div>':''}
                                        </div>
                                        </div>
                                </div>
                            </div>
                            </div> <!-- cd-timeline__content -->
                        </div>
                        `;
                    });
                    let evalucion_final = '';
                    item.evaluacion_item.forEach(evaluacion => {
                        
                        let res3 = '';
                        if (evaluacion.respuesta3!='') {
                            res3 = `
                            <div class="flex">
                                <input type="radio" ${evaluacion.respuesta==evaluacion.respuesta3?'checked':''} name="opcion_item_${evaluacion.id}" value="${evaluacion.respuesta3}"> &nbsp;&nbsp;
                                <p>${evaluacion.respuesta3} </p>
                            </div>
                            `;
                        }
                        let res4 = '';

                        if (evaluacion.respuesta4!='') {
                            res4 = `
                            <div class="flex">
                                <input type="radio" ${evaluacion.respuesta==evaluacion.respuesta4?'checked':''} name="opcion_item_${evaluacion.id}" value="${evaluacion.respuesta4}"> &nbsp;&nbsp;
                                <p>${evaluacion.respuesta4} </p>
                            </div>
                            `;
                        }

                        evalucion_final += `
                        
                                            <strong>${evaluacion.pregunta}</strong> 
                                            <br><br>
                                            <div class="flex">
                                                <input type="radio" ${evaluacion.respuesta==evaluacion.respuesta1?'checked':''} name="opcion_item_${evaluacion.id}" value="${evaluacion.respuesta1}"> &nbsp;&nbsp;
                                                <p>${evaluacion.respuesta1} </p>
                                            </div>
                                            <div class="flex">
                                                <input type="radio" ${evaluacion.respuesta==evaluacion.respuesta2?'checked':''} name="opcion_item_${evaluacion.id}" value="${evaluacion.respuesta2}"> &nbsp;&nbsp;
                                                <p>${evaluacion.respuesta2} </p>
                                            </div>
                                            ${res3}
                                            ${res4}
                                            <input type="hidden" value="${evaluacion.respuesta_correcta}" id="respuesta_correcta_${evaluacion.id}"> 
                                             ${evaluacion.aprobo == 0 ? '<div class="text-center mt-2 fw-bold">La respuesta era: '+evaluacion.respuesta_correcta+'</div>':''}
                                             ${evaluacion.aprobo == 1 ? '<div class="text-center mt-2 fw-bold">Aprobo</div>':''}

                                             <hr>
                                            
                        `;
                    });

                    items += `
                    <section class="cd-timeline js-cd-timeline">
                        <h1 class="text-center my-2">${item.item}</h1>   
                        <div class="container max-width-lg cd-timeline__container">
                            ${sub_items}

                        <div class="cd-timeline__block">
                            <div class="cd-timeline__img cd-timeline__img--bloqueo">
                                <icon class="fa fa-file-alt text-light"></icon>
                            </div> 
                            <div class="cd-timeline__content text-component" >
                            <h2>Repasemos </h2>
                            <div class="justify-between items-center">
                                <span class="cd-timeline__date"> </span>
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#evaluar-item-${item.id}" aria-expanded="false" aria-controls="evaluar-item-${item.id}">
                                            <i class="fa fa-file-alt"></i> &nbsp;&nbsp;  Evaluar &nbsp;
                                        </button>
                                        </h2>
                                        <div id="evaluar-item-${item.id}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body" id="accordion-envia-${item.id}">
                                            ${evalucion_final}
                                            <div class="text-center" ${item.evaluacion_item[0].aprobo != null ? 'style="display:none"':''}>
                                                <button class="btn btn-primary mx-auto enviar_respuesta_item" id="envia-${item.id}" style="background-color: #6222cc; color: #fff; font-family: Arial;" >Enviar</button>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                            </div> <!-- cd-timeline__content -->
                        </div>
                        </div>
                    </section>
                    `;


                });
                
                $('#items').html(items);

                const año = fechaActual.getFullYear();
                const mes = String(fechaActual.getMonth() + 1).padStart(2, '0'); // Los meses empiezan en 0
                const dia = String(fechaActual.getDate()).padStart(2, '0');
                const fechaFormateada = `${año}-${mes}-${dia}`;
                
                // window.location.hash = fechaFormateada;

                document.getElementById(fechaFormateada).scrollIntoView({ behavior: "smooth" });

            }
            

        });
    }
</script>