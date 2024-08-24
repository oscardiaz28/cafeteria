<?php
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<div class="notifications"></div>

<div class="menu_background">
    <section class="menu_page container">
        <h2 class="section_title" data-aos="fade-up" data-aos-once="true">Menu</h2>

        <div class="menu_row" data-aos="fade-up" data-aos-delay="500" data-aos-once="true">
            
            <div class="">
                <?php foreach ($productos as $key => $producto) : ?>
                    <div class="menu_item" data-id="<?php echo $producto['id'] ?>">
                        <div class="menu_image">
                            <img src="images/menu/<?php echo $producto['imagen'] ?>" alt="">
                        </div>
                        <div class="menu_item-info">
                            <div class="menu_item-nombre">
                                <p class="menu_item-nombre-name"><?php echo $producto['nombre'] ?></p>
                                <p class="menu_item-nombre-price"><?php echo $producto['precio'] ?></p>
                            </div>
                            <p class="menu_item-description"><?php echo $producto['descripcion'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


    </section>
</div>

<?php include_once __DIR__ . '/templates/footer.php' ?>


<?php $script = "<script src='js/app.js'></script>"; ?>