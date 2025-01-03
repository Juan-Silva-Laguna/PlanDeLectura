<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        <input type="hidden" id="id_libro" value="<?= $_GET['libro']; ?>">
        <div class="container-xxl">
            <div class="container">
                <?php
                    if (isset($_SESSION['nombre'])) {
                ?>
                    <div class="px-5" style="text-align: right;">
                    <a href="./crear_plan.php?libro=<?= $_GET['libro']; ?>" class="btn btn-dark">CREAR PLAN +</a>
                </div>
                <?php
                    }
                ?>
                
                <div class="wow fadeInUp text-center" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span><span id="nombre"></span><span></span></p>
                </div>
                
                <div class="row">
                    <div class="col-md-3 mt-3 text-center">
                        <img src="" alt="portada" id="imagen" class="img-fluid">
                    </div>
                    <div class="col-md-5 mt-3">
                        <h3 id="autor"></h3>
                        <div id="descripcion"></div>
                    </div>
                    
                    <div class="col-md-4 mt-3 text-center">
                        <h2>PLANES DE LECTURA</h2>
                        <br>
                        <div id="planes">

                        </div>
                        
                    </div>
                </div>

            </div>
        </div>



<?php include('footer.php');?>
<script src="./Inter/info_libro.js"></script>
