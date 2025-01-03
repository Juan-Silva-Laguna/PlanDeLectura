<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        <style>
  .modal-premios {
	 width: 80vw;
	 /* height: 90vh; */
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 user-select: none;
}


 .modal-premios .scratcher {
	 display: grid;
	 justify-content: center;
	 align-items: center;
}
 .modal-premios .scratcher canvas {
	 width: 80vw;
	 height: 80vh;
	 background: transparent;
	 cursor: url("../Assets/img/borrador.png") 32 32, crosshair;
	 z-index: 1;
}

 .modal-premios .scratcher .hidden {
	 width: 80vw;
	 height: 80vh;
	 overflow: hidden;
	 /* display: none; */
	 grid-gap: 5vw;
	 grid-template: repeat(3, 1fr) / repeat(3, 1fr);
	 z-index: -1;
	 margin-top: -80vh;
}
          
           
.olas {
  position:relative;
  width: 100%;
  height:4vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:40px;
  max-height:150px;
}

.content {
  position:relative;
  height:20vh;
  text-align:center;
  background-color: white;
}

/* Animation */

.efecto > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.efecto > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.efecto > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.efecto > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.efecto > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .olas {
    height:40px;
    min-height:40px;
  }
  .content {
    height:30vh;
  }
  h1 {
    font-size:24px;
  }
}
            .contiene{
                background-image: url(../Assets/img/premio.png);
                height: 200px;
                width: 200px;
                background-size: cover;          /* Ajusta la imagen al tamaño del contenedor */
                background-position: center;     /* Centra la imagen */
                background-repeat: no-repeat; 
                position:relative;
                border-radius: 50%;
                border: #a4559b solid;
            }    
            

            .porcentaje_new{
              position: absolute;
              bottom: 0px;
              width: 200px;
              height: 200px; 
              background-color: #fff; 
              border-bottom-left-radius: 100px;
              border-bottom-right-radius: 100px;
            }

            /* Estilos del botón */
.boton-premios {
  animation: levitar 2s ease-in-out infinite;
}

/* Animación de flotación */
@keyframes levitar {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-8px);
  }
}
.swal-fullscreen {
  width: 100vw !important;
  height: 97vh !important;
  top: 0 !important;
  left: 0 !important;
  border-radius: 0 !important;
}


        </style>
        <div class="container-xxl">
            <div class="container" id="planes">
                
            </div>
        </div>



<?php include('footer.php');?>
<script>

  function calcularPorcentaje(cant_premios, puntos, puntos_a) {
    let puntosPorPremio = puntos / cant_premios;
    let porcentajePorPremio = Array(cant_premios).fill(0);

    // Distribuir las puntos pintadas en cada canasta
    let puntosRestantes = puntos_a;
    for (let i = 0; i < cant_premios; i++) {
        if (puntosRestantes >= puntosPorPremio) {
            porcentajePorPremio[i] = 100; // Si tiene el total de puntos, está al 100%
            puntosRestantes -= puntosPorPremio;
        } else {
            porcentajePorPremio[i] = (puntosRestantes / puntosPorPremio) * 100;
            puntosRestantes = 0; // Ya no quedan puntos por distribuir
        }
    }

    // Mostrar el porcentaje de puntos pintadas en cada canasta
    return porcentajePorPremio;
    // porcentajePorPremio.forEach((porcentaje, index) => {
    //     console.log(`Canasta ${index + 1}: ${porcentaje.toFixed(2)}% de puntos pintadas`);
    // });
  }

  $(document).ready(function(){  
    
    // 
    $(document).on('click', '.boton-premios', function(e) {
        e.preventDefault();
        const imagen = $(this).attr('data-imagen');
        const nombre = $(this).attr('data-nombre');
        const descripcion = $(this).attr('data-descripcion');

        console.log(imagen, nombre, descripcion);

        Swal.fire({
          html: `
          
          <h6>Raspa y obten el premio</h6>
          <div class="modal-premios">
              <div class="scratcher">
              <canvas width="700"></canvas>
              <div class="hidden p-5">
                <h3>${nombre}</h3>
                <img width="700" class="img-fluid" src="../Controlador/${imagen}">
                <br> <br>
                
              </div>
            </div>
          </div>
          <p>${descripcion}</p>
          <a href="../Controlador/${imagen}" download="premio.jpg" class="btn btn-primary" style="z-index: 9; width: 40px; position: absolute; top: 7%; right: 4%;"><i class="fas fa-download"></i></a>
          `,
          showConfirmButton: true,
          showConfirmButton: false,
          backdrop: true,
          allowOutsideClick: false,
          customClass: {
            popup: 'swal-fullscreen'
          }
        });
        const cvs = document.querySelector("canvas"),
              ctx=cvs.getContext("2d"),
              brushRadius=(cvs.width+cvs.height)*.03,
              img = new Image();
              img.crossOrigin = "anonymous"; 
              img.src = "../Assets/img/fondo_tapado.svg";
              img.onload = () => {
                ctx.drawImage(img, 0, 0, cvs.width, cvs.height);
              };



        function resize(){
          if(window.innerWidth<480){
            cvs.style.width="calc(100vw - 1rem)";
          }else{
            cvs.style.width="90vw";
          }
        }

        function detectLeftButton(e){
          if("buttons" in e){return e.buttons===1;}
          else if('which' in e){return e.which===1;}
          else{return e.button===1;}
        }

        function getBrushPos(brushX,brushY){
          const brush=cvs.getBoundingClientRect();
          return{
            x:Math.floor((brushX-brush.left)/(brush.right-brush.left)*cvs.width),
            y:Math.floor((brushY-brush.top)/(brush.bottom-brush.top)*cvs.height)
          };
        }

        function getFilledInPixels(e){
          if(!e||e<1){e=1;}

          let pixels=ctx.getImageData(0,0,cvs.width,cvs.height),
              pdata=pixels.data,
              l=pdata.length,
              total=(l/e),
              count=0;

          for(let i=count=0;i<l;i+=e){
            if(parseInt(pdata[i])===0){
              count++;
            }
          }

          return Math.floor((count/total)*100);
        }

        function handlePercentage(filledInPixels){
          filledInPixels=filledInPixels||0;
          console.log(Math.floor(filledInPixels));
          
          if(filledInPixels>65){
            cvs.style.visibility="hidden";
          }
        }

        const brush=new Image();
        brush.src="https://svgshare.com/i/CBF.svg";

        function drawDot(mouseX,mouseY){
          console.log(Math.floor((Math.random()+1)*45));
          ctx.drawImage(brush,mouseX-brushRadius/2,mouseY-brushRadius/2,brushRadius,brushRadius);
          ctx.beginPath();
          ctx.globalCompositeOperation="destination-out";
          ctx.fill();
          ctx.closePath();
          handlePercentage(getFilledInPixels(5));
        }

        window.addEventListener("load",()=>{
          document.querySelector(".hidden").style.display="grid";
          resize();
        });

        window.addEventListener("resize",resize);

        cvs.addEventListener("mousemove",(e)=>{
          const brushPos=getBrushPos(e.clientX,e.clientY);
          const leftBut=detectLeftButton(e);
          if(leftBut==1){
            drawDot(brushPos.x,brushPos.y);
          }
        },false);

        cvs.addEventListener("touchmove",(e)=>{
            e.preventDefault();
            const touch=e.targetTouches[0];
            if(touch){
              const brushPos=getBrushPos(touch.pageX,touch.pageY);
              drawDot(brushPos.x,brushPos.y);
            }
        },false);


    });
    
        $.post('../Controlador/premios.controlador.php', {id_plan: $('#id_plan').val()}, function (respuesta) {
            let planes = JSON.parse(respuesta);
            let componente = '';

            planes.forEach(plan => {
              //dar oportunidad de equivocarse con 5 respuestas
              let puntas_a = plan.puntos_reprobados>=5 ? plan.puntos_aprobados+5:plan.puntos_aprobados;
              
              let porcPrem = calcularPorcentaje(plan.premios.length, plan.puntos, puntas_a);
              

              let premios = '';
              plan.premios.forEach((premio, i) => {
                
                let ver_premio = '';
                if (porcPrem[i]>=100) {
                  ver_premio = `<div style="position: absolute; top: 140px; left: 45px; z-index: 0;">
                          <button class="btn btn-dark boton-premios" data-imagen="${premio.imagen}" data-nombre="${premio.nombre}" data-descripcion="${premio.descripcion}">Ver Premio</button>
                        </div>`;
                }
                

                let mov = 200 * (1-(porcPrem[i]/100));
                premios += `
                <div class="col-sm-6 col-md-3 mt-5">
                    <div class="contiene mx-auto">
                        <div style="position: absolute; top: 85px; left: 85px; z-index: 9;">
                          <b style="color: black;">${porcPrem[i].toFixed(0)}%</b>
                        </div>
                        ${ver_premio}
                        <div ${porcPrem[i]>=100?'style="display: none;"':''} style="position: absolute; bottom: ${mov}px;" id="cargando">
                          <svg class="olas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                              <defs>
                                  <path id="vector-olas" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                              </defs>
                              <g class="efecto">
                                  <use xlink:href="#vector-olas" x="48" y="0" fill="rgba(255,255,255,0.7"></use>
                                  <use xlink:href="#vector-olas" x="48" y="3" fill="rgba(255,255,255,0.5)"></use>
                                  <use xlink:href="#vector-olas" x="48" y="5" fill="rgba(255,255,255,0.3)"></use>
                                  <use xlink:href="#vector-olas" x="48" y="7" fill="#fff"></use>
                              </g>
                          </svg>
                        </div>
                        <div ${porcPrem[i]>=100?'style="display: none;"':''}  class="porcentaje_new" id="bloque" style="height: ${mov}px;"></div>
                    </div>
                  </div>
                `;
              });

              componente += `
              <div class="wow fadeInUp text-center" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>PREMIOS ${plan.nombre.toUpperCase()}<span></span></p>
                </div>
                <div class="row justify-content-center">
                  ${premios}
                </div>
              `;


              
            });
            $('#planes').html(componente);
        });

      });

</script>
