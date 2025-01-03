<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        

    <style>
                    
        ul { list-style-type: none; }

        a {
        color: #b63b4d;
        text-decoration: none;
        }

        /** =======================
        * Contenedor Principal
        ===========================*/


        h1 {
        color: #FFF;
        font-size: 24px;
        font-weight: 400;
        text-align: center;
        margin-top: 80px;
        }

        h1 a {
        color: #c12c42;
        font-size: 16px;
        }

        .accordion {
        width: 100%;
        max-width: 360px;
        margin: 0px auto 20px;
        background: #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        }

        .accordion .link {
        cursor: pointer;
        display: block;
        padding: 15px 15px 15px 42px;
        color: #4D4D4D;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #CCC;
        position: relative;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
        }

        .accordion li:last-child .link { border-bottom: 0; }

        .accordion li i {
        position: absolute;
        top: 16px;
        left: 12px;
        font-size: 18px;
        color: #595959;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
        }

        .accordion li i.fa-chevron-down {
        right: 12px;
        left: auto;
        font-size: 16px;
        }

        .accordion li.open .link { 
            color: #fff;
            background-color: #6222CC;
        }

        .accordion li.open i { color: #fff; }

        .accordion li.open i.fa-chevron-down {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
        }

        /**
        * Submenu
        -----------------------------*/


        .submenu {
        display: none;
        background: #eee;
        font-size: 14px;
        }

        .submenu li { border-bottom: 1px solid #4b4a5e; }

        .submenu a {
        display: block;
        text-decoration: none;
        color: #000;
        padding: 12px;
        padding-left: 42px;
        -webkit-transition: all 0.25s ease;
        -o-transition: all 0.25s ease;
        transition: all 0.25s ease;
        }

        .submenu a .fa-file-alt{
            position: relative;
            right: 198px;
            color: #7b45d3c7;
        }
        .submenu a .fa-file-alt:hover {
            color: #6222CC;
            font-size: 20px;
        }
        
        .submenu a:hover {
        background: #7b45d3c7;
        color: #FFF;
        }

        .invitacion {
            background-image: url(../Assets/img/fono_invitacion.png);
            height: 653px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
        
        <input type="hidden" id="id_plan" value="<?= $_GET['plan']; ?>">

        <div class="px-5 m-2" style="text-align: right;">
            <button class="btn btn-dark" id="btn_compartir">Compartir &nbsp; <i class="fa fa-share"></i></button>
        </div>
        <!-- Service Start -->
        <div class="container-xxl">
            <div class="container px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>PLAN DE LECTURA<span></span></p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4 mt-3 text-center wow fadeInUp" data-wow-delay="0.1s">

                            <ul id="accordion" class="accordion" >
                            </ul>

                    </div>
                    <div class="col-md-5 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                        <h2 id="nombre_plan"></h2>
                        <h3><span id="cantidad_dias"></span> Dias</h3>
                        <div id="descripcion_plan"></div>
                    </div>
                    <div class="col-md-3 mt-3 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <img src="" alt="portada" id="imagen" class="img-fluid">
                        <h3 id="nombre_libro"></h3>
                        <h3 id="autor"></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->



<?php include('footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
$(document).ready(function(){   
        $.post('../Controlador/ver_plan.controlador.php', {id_plan: $('#id_plan').val()}, function (respuesta) {
            let res = JSON.parse(respuesta);
            
            $('#nombre_plan').html(res.nombre);
            $('#descripcion_plan').html(res.descripcion.replace(/\n/g, "<br>"));
            $('#cantidad_dias').html(res.cantidad_dias);
            $('#autor').html(res.autor);
            $('#nombre_libro').html(res.nom_libro);
            $('#imagen').attr('src','../Controlador/'+res.img_libro);

            if (res.items.length >0) {
                let items = '';
                res.items.forEach(item => {
                    
                    let sub_items = '';
                    item.sub_items.forEach(sub_item => {
                        sub_items += `<li><a href="#">${sub_item.sub_item} <span class="fa fa-file-alt"></span> </a></li>`;
                    });

                    items += `
                    <li>
                        <div class="link"><i class="fa fa-list-ul"></i>${item.item}<i class="fa fa-chevron-down"></i></div>
                        <ul class="submenu">
                            ${sub_items} 
                        </ul>
                    </li>
                    `;


                });
                
                $('#accordion').html(items);

                $(function() {
                    var Accordion = function(el, multiple) {
                        this.el = el || {};
                        this.multiple = multiple || false;

                        // Variables privadas
                        var links = this.el.find('.link');
                        // Evento
                        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
                    }

                    Accordion.prototype.dropdown = function(e) {
                        var $el = e.data.el;
                            $this = $(this),
                            $next = $this.next();

                        $next.slideToggle();
                        $this.parent().toggleClass('open');

                        if (!e.data.multiple) {
                            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
                        };
                    }	

                    var accordion = new Accordion($('#accordion'), false);
                });
            }
            

        });

        $(document).on('change', '#fecha_ini', function (e) {
            let fechaInicial = new Date($('#fecha_ini').val());
            let cant_dias = Number($('#cantidad_dias').html());
            fechaInicial.setDate(fechaInicial.getDate() + cant_dias);

            let anio = fechaInicial.getFullYear();
            let mes = (fechaInicial.getMonth() + 1).toString().padStart(2, '0');
            let dia = fechaInicial.getDate().toString().padStart(2, '0');
            let fechaFin = `${anio}-${mes}-${dia}`;

            $('#fecha_fin').val(fechaFin);
            $('#fecha_fin').attr('disabled', 'true');
        });

        
        $(document).on('click', '#btn_compartir', function (e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Ingresa los datos de a quien le vas a compartir',
                html: `
                    <label>Nombre: </label>
                    <input type="text" id="nombre" class="form-control" placeholder="Nombre">
                    <br>
                    <label>Codigo: </label>
                    <input type="text" id="codigo" class="form-control" placeholder="Codigo">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Fecha Inicio: </label>
                            <input type="date" id="fecha_ini" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Fecha Fin: </label>
                            <input type="date" id="fecha_fin" class="form-control">
                        </div>
                    </div>
                    <br>
                    <label>Cuantos premios quieres darle: </label>
                    <input type="number" id="cantidad" class="form-control" placeholder="Cantidad de bonos o regalos">
                    
                `,
                confirmButtonText: 'Continuar',
                focusConfirm: false,
                preConfirm: () => {
                    const nombre = document.getElementById('nombre').value;
                    const codigo = document.getElementById('codigo').value;
                    const cantidad = document.getElementById('cantidad').value;
                    const fecha_ini = document.getElementById('fecha_ini').value;
                    const fecha_fin = document.getElementById('fecha_fin').value;

                    if (!nombre || !codigo || !cantidad || !fecha_ini || !fecha_fin) {
                        Swal.showValidationMessage('Por favor, complete todos los campos');
                        return false;
                    }

                    return { nombre, codigo, cantidad, fecha_ini, fecha_fin };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const { nombre, codigo, cantidad, fecha_ini, fecha_fin } = result.value;

                    let inputs_premios = '';
                    for (let i = 1; i <= cantidad; i++) {
                        inputs_premios += `
                            <h3 class="text-center">Obsequio ${i}</h3>
                            <label>Nombre: </label>
                            <input type="text" id="nom_${i}" class="form-control" placeholder="Nombre">
                            <br>
                            <label>Imagen del Bono o Regalo: </label>
                            <input type="file" id="img_${i}" class="form-control" accept="image/*" placeholder="Imagen">
                            <br>
                            <label>Descripción: </label>
                            <textarea id="des_${i}" class="form-control" placeholder="Descripción"></textarea>
                            <hr>
                        `;
                    }

                    Swal.fire({
                        title: 'Premios - Bonos - Regalos',
                        html: inputs_premios,
                        confirmButtonText: 'Guardar',
                        focusConfirm: false,
                        preConfirm: () => {
                            let premios = [];
                            for (let i = 1; i <= cantidad; i++) {
                                let nom_premio = document.getElementById('nom_' + i).value;
                                let imagen_premio = document.getElementById('img_' + i).files[0];
                                let descripcion_premio = document.getElementById('des_' + i).value;
                                if (!nom_premio || !imagen_premio || !descripcion_premio) {
                                    Swal.showValidationMessage('Por favor, complete todos los campos');
                                    return false;
                                }
                                premios.push({
                                    nombre: nom_premio,
                                    imagen: imagen_premio,
                                    descripcion: descripcion_premio
                                });
                            }

                            return { nombre, codigo, fecha_ini, fecha_fin, premios };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const { nombre, codigo, fecha_ini, fecha_fin, premios } = result.value;

                            // Crear FormData
                            let formData = new FormData();
                            formData.append('nombre', nombre);
                            formData.append('codigo', codigo);
                            formData.append('id_plan', $('#id_plan').val());
                            formData.append('fecha_ini', fecha_ini);
                            formData.append('fecha_fin', fecha_fin);

                            // Agregar cada premio e imagen
                            premios.forEach((premio, index) => {
                                formData.append(`premios[${index}][nombre]`, premio.nombre);
                                formData.append(`premios[${index}][descripcion]`, premio.descripcion);
                                formData.append(`premios[${index}][imagen]`, premio.imagen); // Imagen se agrega como archivo
                            });

                            $.ajax({
                                url: '../Controlador/compartir_plan.controlador.php',
                                type: 'POST',
                                data: formData,
                                processData: false, // Para no procesar los datos (permite enviar archivos)
                                contentType: false, // No especificar tipo de contenido para enviar archivos
                                success: function (respuesta) {
                                    let datos = JSON.parse(respuesta);

                                    
                                    Swal.fire({
                                        allowOutsideClick: false, 
                                        confirmButtonText: 'Descargar',
                                        html: `
                                        <div class="invitacion text-center" id="invitacion">
                                            <br><br><br>
                                            <h2>Hola ${nombre}!!</h2>
                                            <br><br>
                                            <h5>Te han compartido un plan de lectura cuidadosamente diseñado para que disfrutes al máximo del libro ${$('#nombre_libro').html()} de ${$('#autor').html()} </h5>
                                            <div id="qrcode" style="width: 160px;" class="mx-auto"></div>
                                            <h6>Duración: ${$('#cantidad_dias').html()} dias</h6>
                                            <h5>${fecha_ini} - ${fecha_fin}</h5>
                                            
                                            <h4>Tu Codigo Es:</h4>
                                            <h2>${codigo}</h2>
                                        </div>
                                        `,
                                    }).then((r) => {
                                        // Obtener el contenedor del HTML de SweetAlert2
                                        const elemento = Swal.getHtmlContainer().querySelector('#invitacion');
                                        
                                        // Generar y descargar la imagen solo si se encuentra el elemento
                                        if (elemento) {
                                            html2canvas(elemento).then((canvas) => {
                                                const enlace = document.createElement('a');
                                                enlace.href = canvas.toDataURL('image/png');
                                                enlace.download = `Invitacion_${nombre}.png`;
                                                enlace.click();
                                            });
                                            
                                            // Mostrar una alerta de confirmación
                                            Swal.fire({
                                                toast: true,
                                                icon: datos['status'],
                                                title: datos['message'],
                                                position: 'bottom-right',
                                                showConfirmButton: false,
                                                timer: 1500,
                                                timerProgressBar: true,
                                            });
                                        }
                                    });


                                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                                        text: window.location.hostname+"/plan_lectura_compartido?codigo="+datos.data,
                                        width: 168,
                                        height: 168
                                    });
                                   
                                    
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error:', error);
                                }
                            });
                        }
                    });
                }
            });
        });

});
    



</script>
