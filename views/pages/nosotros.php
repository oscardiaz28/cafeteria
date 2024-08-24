<?php 
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<div class="nosotros_background">
            <section class="nosotros container" >
                <h2 class="section_title" data-aos="fade-up" data-aos-once="true">Nosotros</h2>
                <div class="nosotros_content" data-aos="fade-up" data-aos-delay="500">
                    <div class="nosotros_text" >
                        <p class="nosotros_text-title">Café Central</p>
                        <h4 style="font-weight: bold; font-size: 2.5rem; margin-bottom: 1rem">Misión</h4>
                        <p class="nosotros_paragraph">Nos esforzamos por proporcionar momentos agradables y memorables a nuestros clientes, sirviendo café de alta calidad y ofreciendo un servicio amigable.</p>
                        <h4 style="font-weight: bold; font-size: 2.5rem; margin-bottom: 1rem">Visión</h4>
                        <p class="nosotros_paragraph">Convertirnos en la cafetería favorita de la comunidad, destacando por nuestro buen café, atención amigable y un ambiente acogedor.</p>
                    </div>
                    <img src="images/nosotros-image.webp" alt="" class="nosotros_image">
                </div>
            </section>
        </div>

<?php include_once __DIR__ . '/templates/footer.php' ?>

<?php $script = "<script src='js/app.js'></script>"; ?>