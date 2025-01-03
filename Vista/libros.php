<?php include('header.php'); ?>

            <div class="container-xxl bg-primary hero-header">
 
            </div>
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap');
            :root {
                --d: 700ms;
                --e: cubic-bezier(0.19, 1, 0.22, 1);
                --font-sans: 'Rubik', sans-serif;
                --font-serif: 'Cardo', serif;
            }
            * {
                box-sizing: border-box;
            }
            html, body {
                height: 100%;
            }
            body {
                display: grid;
                place-items: center;
            }
            .page-content {
                display: grid;
                grid-gap: 1rem;
                padding: 1rem;
                max-width: 1024px;
                margin: 0 auto;
                font-family: var(--font-sans);
            }
            @media (min-width: 600px) {
                .page-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            @media (min-width: 800px) {
                .page-content {
                    grid-template-columns: repeat(4, 1fr);
                }
            }
            .card {
                position: relative;
                display: flex;
                align-items: flex-end;
                overflow: hidden;
                padding: 1rem;
                width: 100%;
                text-align: center;
                color: whitesmoke;
                background-color: whitesmoke;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1);
            }
            @media (min-width: 600px) {
                .card {
                    height: 350px;
                }
            }
            .card:before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 110%;
                background-size: cover;
                background-position: center;
                transition: transform calc(var(--d) * 1.5) var(--e);
                pointer-events: none;
            }
            .card:after {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 200%;
                pointer-events: none;
                background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.320) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.540) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.790) 100%);
                transform: translateY(-50%);
                transition: transform calc(var(--d) * 2) var(--e);
            }
            
            .content {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                padding: 1rem;
                transition: transform var(--d) var(--e);
                z-index: 1;
            }
            .content > * + * {
                margin-top: 1rem;
            }
            .title {
                font-size: 1.3rem;
                font-weight: bold;
                line-height: 1.2;
            }
            .copy {
                font-family: var(--font-serif);
                font-size: 1.125rem;
                font-style: italic;
                line-height: 1.35;
            }
            
            @media (hover: hover) and (min-width: 600px) {
                .card:after {
                    transform: translateY(0);
                }
                .content {
                    transform: translateY(calc(100% - 4.5rem));
                }
                .content > *:not(.title) {
                    opacity: 0;
                    transform: translateY(1rem);
                    transition: transform var(--d) var(--e), opacity var(--d) var(--e);
                }
                .card:hover, .card:focus-within {
                    align-items: center;
                }
                .card:hover:before, .card:focus-within:before {
                    transform: translateY(-4%);
                }
                .card:hover:after, .card:focus-within:after {
                    transform: translateY(-50%);
                }
                .card:hover .content, .card:focus-within .content {
                    transform: translateY(0);
                }
                .card:hover .content > *:not(.title), .card:focus-within .content > *:not(.title) {
                    opacity: 1;
                    transform: translateY(0);
                    transition-delay: calc(var(--d) / 8);
                }
                .card:focus-within:before, .card:focus-within:after, .card:focus-within .content, .card:focus-within .content > *:not(.title) {
                    transition-duration: 0s;
                }
            }
            
        </style>
        <div class="container-xxl">
            <div class="container">
                <?php
                    if (isset($_SESSION['nombre'])) {
                ?>
                    <div class="px-5" style="text-align: right;">
                        <button class="btn btn-dark" id="btn_agregar">AGREGAR +</button>
                    </div>
                <?php
                    }
                ?>
                
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>LIBROS<span></span></p>
                </div>
                
                <main class="page-content" id="contenedor_libros">
                    
                </main>

            </div>
        </div>



<?php include('footer.php');?>
<script src="./Inter/libros.js"></script>