<?php 
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<section class="contacto">
            <div class="container">
                <h2 class="section_title">Contacto</h2>
                
                <div class="contacto_container">

                    <div class="contacto_information">
                        <h3>Información de Contacto</h3>

                        <div class="row">
                            <p>Dirección: </p>
                            <span>Calle Maria Izaga 1711</span>
                        </div>

                        <div class="row">
                            <p>Teléfono: </p>
                            <span class="main_color"> +51 953 042 194</span>
                        </div>

                        <div class="row">
                            <p>Correo: </p>
                            <span class="main_color">contacto@cafecentral.com</span>
                        </div>

                        <div class="row">
                            <p>Sitio Web: </p>
                            <span class="main_color">www.cafecentral.com</span>
                        </div>

                    </div>

                    <div class="contacto_formulario">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <input type="text" placeholder="Tu Nombre">
                                <input type="email" placeholder="Tu Correo">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Asunto">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
                            </div>
                            <input type="submit" value="Enviar Mensaje">
                        </form>
                    </div>
                </div>
            </div>
            
        </section>

<?php include_once __DIR__ . '/templates/footer.php' ?>


        <?php $script = "<script src='js/app.js'></script>"; ?>