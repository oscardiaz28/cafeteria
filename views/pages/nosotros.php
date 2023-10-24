<?php 
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<div class="nosotros_background">
            <section class="nosotros container">
                <h2 class="section_title">Nosotros</h2>
                <div class="nosotros_content">
                    <div class="nosotros_text">
                        <p class="nosotros_text-title">Café Central</p>
                        <p class="nosotros_paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel nihil laborum maxime dolores illo numquam officia rerum, cumque rem velit nulla deleniti labore ex! Molestias illum culpa magnam fugit alias?</p>
                        <p class="nosotros_paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel nihil laborum maxime dolores illo numquam officia rerum, cumque rem velit nulla deleniti labore ex! Molestias illum culpa magnam fugit alias?</p>
                    </div>
                    <img src="images/nosotros-image.webp" alt="" class="nosotros_image">
                </div>
            </section>
        </div>

<?php include_once __DIR__ . '/templates/footer.php' ?>

<?php $script = "<script src='js/app.js'></script>"; ?>