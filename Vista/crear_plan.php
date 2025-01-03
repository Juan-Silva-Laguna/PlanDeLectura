<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DaMiMoBa</title>
     <!-- Customized Bootstrap Stylesheet -->
     <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShDZRDaBrWSmQSRGTN-ly8CUEwYlvpsYrmJQ&s" rel="icon">

<!-- Template Stylesheet -->
<link href="../Assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.css">
  <style>
    .dias, .temas_cont{
        border: 1px solid purple;
        border-radius: 3px;
        margin: 10px;
        background-color: #fff;
    }

    .btn-dark{
        background-color: #936bdd;
        border-color: #a6a3cb;
    }
    .tem{
        min-height: 200px;
    }

    .card{
        width: 180px;
        border: 1px solid purple;
    }

    .temas_cont .card{
        width: 100%;
    }

    .card .btn{
        width: 40px;
    }

    hr{
        border: 2px solid purple;
    }

    body{
        background-color: #F6F4F9;
    }

    .form-control{
        border: 1px solid purple;
    }
  </style>
</head>
<body>

<div class="container mt-5">
    <input type="hidden" id="id_libro" value="<?= $_GET['libro']; ?>">
    <button onclick="window.history.back()" class="btn btn-dark">Cancelar</button>
    <h2 class="text-center">- Crear Plan de Lectura -</h2>
    <div class="row">
        <div class="col-6">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="col-6">
            <label for="cantidad">Cantidad de Dias:</label>
            <input type="number" class="form-control" id="cantidad">
        </div>
        <div class="col-12">
            <label for="cantidad">Descripción:</label>
            <textarea class="form-control" id="descripcion"></textarea>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-12 text-center dias">
        <h3>Dias:</h3>
        <div class="row" id="dias">
            
        </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-11">
        <label for="cantidad">Agregar Tema:</label>
        <input type="text" class="form-control" id="tema">
    </div>
    <div class="col-md-1 mt-4">
        <a href="" class="btn btn-dark" id="agregar_tema">Agregar</a>
    </div>
  </div>
</div>

<div class="container my-3">
  <div class="row" id="temas">
    
  </div>
</div>

<div class="container mb-4">
    <button class="btn btn-dark w-100" disabled id="generar">
        CREAR PLAN DE LECTURA
    </button>
</div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js"></script>
<script>
$(document).ready(function() {
    
    let arreglo = [];
    let drake = dragula(arreglo);  // Inicializamos dragula con un array vacío

    let arregloPreguntasRespuesta = [];
    let arregloPreguntasRespuestaTema = [];

    // Función para inicializar Dragula con un nuevo contenedor sin destruir la instancia anterior
    function agregarAlDragula(element) {
        arreglo.push(element);
        drake.containers.push(element);
    }

    $(document).on('click', '#generar', function (e) {
        e.preventDefault();        
        if($('#nombre').val() == '' || $('#cantidad').val() == '' || $('#descripcion').val() == ''){
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Los 3 primeros campos son obligatorios',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
            return;
        }
        if($('#dias').children().length>0){
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Arrasta cada dia a los temas',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
            return;
        }

        if($('.agregar_evalucion').length > 0){
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Debes agregar evaluacion a cada dia',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
            return;
        }

        if($('.agregar_evalucion_tema').length > 0){
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Debes agregar evaluacion por cada tema',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
            return;
        }

        let arrF = [];
        let arrSub = [];
        for (let i = 1; i <= $('#temas').children().length; i++) {
            
            $('#tema_'+i).children().each(function() {
                let evaluacion = arregloPreguntasRespuesta.find(objeto => objeto.id === $(this).attr('id'));
                let sub_item = $('#'+$(this).attr('id')).children('.card').children('input').val(); // Obtener el valor del input

                arrSub.push({
                    sub_item: sub_item,
                    evaluacion: evaluacion
                })
            });
            arrF.push({
                item: $('#tema_'+i).prev('h3').text(),
                sub_items: arrSub,
                evaluacion: arregloPreguntasRespuestaTema.find(item => item.id === "eval_tema_"+i)?.evalucion
            })
            arrSub = [];
        }
        
        let data ={
            id_libro: $('#id_libro').val(),
            nombre_plan: $('#nombre').val(),
            descripcion_plan: $('#descripcion').val(),
            cantidad_dias: $('#cantidad').val(),
            items: arrF
        }
        
        console.log(data);

        $.post('../Controlador/crear_plan.controlador.php', data, function (respuesta) {
            let res = JSON.parse(respuesta);
            Swal.fire({
                toast: true,
                icon: res.status,
                title: res.message,
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1900,
                timerProgressBar: true,
            }).then(x=>{
                if (res.status=='success') {
                    location.href = './ver_plan_lectura.php?plan='+res.data
                }
            });

            
        });
        
    });

    $(document).on('click', '.agregar_evalucion_tema', function (e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Ingresa la cantidad de preguntas que va a realizar en este tema',
            html: `
                <label>Cantidad de Preguntas: </label>
                <input type="number" id="cantidad_preguntas" class="form-control" placeholder="Cantidad de Preguntas">
            `,
            confirmButtonText: 'Continuar',
            focusConfirm: false,
            preConfirm: () => {
                if (!$('#cantidad_preguntas').val()) {
                    Swal.showValidationMessage('Ingrese cantidad');
                    return false;
                }
                return $('#cantidad_preguntas').val();
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const cantidad = result.value;
                let elemento = $(this)[0].parentElement.parentElement.parentElement;
                let ide = $(elemento).attr('id');
               let preg_res = '';
                for (let i = 1; i <= cantidad; i++) {
                    preg_res += `
                        <b>Pregunta ${i}: </b>
                        <input type="text" id="pregunta_${i}" class="form-control" placeholder="Pregunta">
                        <br>
                        <label>Respuesta: </label>
                        <div class="input-group mb-3">
                            <input type="text" id="respuesta_${i}_1" class="form-control" placeholder="Respuesta">
                            <input type="radio" name="respuesta_${i}" value="respuesta_${i}_1" class="form-check-input" placeholder="Respuesta">
                        </div>
                        <label>Respuesta: </label>
                        <div class="input-group mb-3">
                            <input type="text" id="respuesta_${i}_2" class="form-control" placeholder="Respuesta">
                            <input type="radio" name="respuesta_${i}" value="respuesta_${i}_2" class="form-check-input" placeholder="Respuesta">
                        </div>
                        <label>Respuesta: </label>
                        <div class="input-group mb-3">
                            <input type="text" id="respuesta_${i}_3" class="form-control" placeholder="Respuesta">
                            <input type="radio" name="respuesta_${i}" value="respuesta_${i}_3" class="form-check-input" placeholder="Respuesta">
                        </div>
                        <label>Respuesta: </label>
                        <div class="input-group mb-3">
                            <input type="text" id="respuesta_${i}_4" class="form-control" placeholder="Respuesta">
                            <input type="radio" name="respuesta_${i}" value="respuesta_${i}_4" class="form-check-input" placeholder="Respuesta">
                        </div>
                        <hr><hr>
                    `;
                }

                    Swal.fire({
                        title: 'Ingresa preguntas y respuestas y checkea la correcta',
                        html: preg_res,
                        confirmButtonText: 'Guardar',
                        focusConfirm: false,
                        preConfirm: () => {
                            let arrEva = [];
                            for (let i = 1; i <= cantidad; i++) {
                                let pregunta = $('#pregunta_'+i).val();
                                let respuesta_1 = $('#respuesta_'+i+'_1').val();
                                let respuesta_2 = $('#respuesta_'+i+'_2').val();
                                let respuesta_3 = $('#respuesta_'+i+'_3').val();
                                let respuesta_4 = $('#respuesta_'+i+'_4').val();
                                let respuesta = $('input[name="respuesta_'+i+'"]:checked').val();
                                let respuesta_correcta = $('#'+respuesta).val();
                                if (!pregunta || !respuesta_1 || !respuesta_2 ) {
                                    Swal.showValidationMessage('Almenos deben existir 1 pregunta y 2 respuestas');
                                    return false;
                                }
                                if (!respuesta_correcta) {
                                    Swal.showValidationMessage('Debes seleccionar la respuesta correcta');
                                    return false;
                                }
                                arrEva.push({
                                    pregunta: pregunta,
                                    respuesta1: respuesta_1,
                                    respuesta2: respuesta_2,
                                    respuesta3: respuesta_3,
                                    respuesta4: respuesta_4,
                                    respuesta_correcta: respuesta_correcta
                                });
                            }
                            
                            return {arrEva};
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const {arrEva}= result.value;
                            
                            let elemento = $(this)[0].parentElement.parentElement.parentElement;
                            let ide = $(elemento).attr('id');

                            arregloPreguntasRespuestaTema.push({
                                id: ide,
                                evalucion: arrEva
                            });

                            $(this).parent().html(`<img width="50" class="check_img" src="../Assets/img/check.webp" alt="">`);
                            imagenCheck();
                        }
                    });
                    
            }
        });
       
    });

    function imagenCheck() {
       
        $('.check_img').attr('src', '../Assets/img/check.webp');

        setTimeout(() => {
            $('.check_img').attr('src', '../Assets/img/check_fija.png');
        }, 500); // Ajusta el tiempo si es necesario
    }

    $(document).on('click', '.agregar_evalucion', function (e) {
        e.preventDefault();
        

        Swal.fire({
            title: 'Ingresa preguntas y respuestas y checkea la correcta',
            html: `
                <b>Pregunta: </b>
                <input type="text" id="pregunta" class="form-control" placeholder="Pregunta">
                <br>
                <label>Respuesta: </label>
                <div class="input-group mb-3">
                    <input type="text" id="respuesta_1" class="form-control" placeholder="Respuesta">
                    <input type="radio" name="respuesta" value="respuesta_1" class="form-check-input" placeholder="Respuesta">
                </div>
                <label>Respuesta: </label>
                <div class="input-group mb-3">
                    <input type="text" id="respuesta_2" class="form-control" placeholder="Respuesta">
                    <input type="radio" name="respuesta" value="respuesta_2" class="form-check-input" placeholder="Respuesta">
                </div>
                <label>Respuesta: </label>
                <div class="input-group mb-3">
                    <input type="text" id="respuesta_3" class="form-control" placeholder="Respuesta">
                    <input type="radio" name="respuesta" value="respuesta_3" class="form-check-input" placeholder="Respuesta">
                </div>
                <label>Respuesta: </label>
                <div class="input-group mb-3">
                    <input type="text" id="respuesta_4" class="form-control" placeholder="Respuesta">
                    <input type="radio" name="respuesta" value="respuesta_4" class="form-check-input" placeholder="Respuesta">
                </div>
            `,
            confirmButtonText: 'Guardar',
            focusConfirm: false,
            preConfirm: () => {
                const pregunta = $('#pregunta').val();
                const respuesta_1 = $('#respuesta_1').val();
                const respuesta_2 = $('#respuesta_2').val();
                const respuesta_3 = $('#respuesta_3').val();
                const respuesta_4 = $('#respuesta_4').val();
                const respuesta = $('input[name="respuesta"]:checked').val();
                const respuesta_correcta = $('#'+respuesta).val();
                if (!pregunta || !respuesta_1 || !respuesta_2 ) {
                    Swal.showValidationMessage('Almenos deben existir 1 pregunta y 2 respuestas');
                    return false;
                }
                if (!respuesta_correcta) {
                    Swal.showValidationMessage('Debes seleccionar la respuesta correcta');
                    return false;
                }
                return { pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4, respuesta_correcta };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { pregunta, respuesta_1, respuesta_2, respuesta_3, respuesta_4, respuesta_correcta } = result.value;
                let elemento = $(this)[0].parentElement.parentElement.parentElement;
                let ide = $(elemento).attr('id');
               
                arregloPreguntasRespuesta.push({
                    id: ide,
                    pregunta: pregunta,
                    respuesta1: respuesta_1,
                    respuesta2: respuesta_2,
                    respuesta3: respuesta_3,
                    respuesta4: respuesta_4,
                    respuesta_correcta: respuesta_correcta
                });
                
                $(this).parent().html(`<img width="50" class="check_img" src="../Assets/img/check.webp" alt="">`);
                imagenCheck();
            }
        });
        
       
    });

    $(document).on('click', '#agregar_tema', function (e) {
        e.preventDefault();
        let tema = $('#tema').val();
        if (tema == '') {
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'No escribiste ningun tema',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });
            return;
        }
        
        let i = Number($('.temas_cont').length) + 1;  // Obtenemos la cantidad de temas

        // Creamos el nuevo tema y lo añadimos al contenedor sin sobrescribir los anteriores
        let nuevoTema = `
            <div class="col-sm-6 col-md-3">
                <div class="temas_cont text-center p-2">
                    <h3>${tema}:</h3>
                    <div id="tema_${i}" class="tem"></div>
                    <div class="col" id="eval_tema_${i}">
                        <div class="card px-5 py-2">
                            <h4>Evaluacion</h4>
                            <div><a href="" class="btn btn-dark rounded-pill mx-auto mt-1 agregar_evalucion_tema" id="btn_eva_tema_${i}">+</a></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#temas').append(nuevoTema);  // Añadir el nuevo tema sin borrar los anteriores

        // Añadimos el nuevo contenedor al arreglo de Dragula
        agregarAlDragula($('#tema_' + i)[0]);
        
        $('#tema').val('');  // Limpiar el input del tema
        $('#generar').prop('disabled', false);

        if ( $('#cantidad').val()!='') {
            $('#cantidad').attr('disabled', true);
        }
    });

    $(document).on('change', '#cantidad', function (e) {
        let cant = $('#cantidad').val();
        let dias = '';
        for (let i = 1; i <= cant; i++) {
            dias += `
            <div class="col" id="dia_${i}">
                <div class="card px-2 py-2 my-2">
                    <input type="text" class="form-control w-100" id="sub_item_${i}" value="Dia ${i}">
                    <div><a href="" class="btn btn-dark rounded-pill mx-auto mt-1 agregar_evalucion" id="btn_dia_${i}">+</a></div>
                </div>
            </div>
            `;
        }

        $('#dias').html(dias);

        // Añadimos los nuevos días al arreglo de Dragula sin destruir la instancia anterior
        agregarAlDragula($('#dias')[0]);
    });

    // AUTOSCROLL en dispositivos móviles y escritorio
    let scrollSpeed = 150;
    let scrollZone = 100;  // Área en píxeles cerca del borde donde se activará el scroll

    // Función que realiza el scroll automático
    function autoScroll(e) {
        let y = e.touches ? e.touches[0].clientY : e.clientY; // Usar touch o mouse dependiendo del dispositivo
        let windowHeight = window.innerHeight;

        if (y < scrollZone) {
            // Arrastrando cerca del borde superior
            window.scrollBy(0, -scrollSpeed);
        } else if (y > windowHeight - scrollZone) {
            // Arrastrando cerca del borde inferior
            window.scrollBy(0, scrollSpeed);
        }
    }

    drake.on('drag', function(el, source) {
        // Usar eventos touchmove para dispositivos móviles
        document.addEventListener('touchmove', autoScroll);
        document.addEventListener('mousemove', autoScroll); // Para dispositivos de escritorio
    });

    drake.on('dragend', function(el) {
        // Quitar los eventos cuando termine el arrastre
        document.removeEventListener('touchmove', autoScroll);
        document.removeEventListener('mousemove', autoScroll);
    });

});


</script>

</body>
</html>
