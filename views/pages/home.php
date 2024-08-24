<?php 
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

?>

<?php include_once __DIR__ . '/templates/header-content.php' ?>

<section class="info container">
            <div class="info_item">
                <span><i class='bx bxs-phone'></i></span>
                <div class="info_text">
                    <p class="info_text-white">953 042 194</p>
                    <p class="info_text-gray">Numero de atención al cliente, disponibilidad de 8:00am - 6:00pm.</p>
                </div>
            </div>

            <div class="info_item">
                <span><i class='bx bxs-map-pin'></i></span>
                <div class="info_text">
                    <p class="info_text-white">Calle Maria Izaga 1711</p>
                    <p class="info_text-gray">Centro de Chiclayo, a dos cuadras de la Plaza Central.</p>
                </div>
            </div>

            <div class="info_item">
                <span><i class='bx bxs-time'></i></span>
                <div class="info_text">
                    <p class="info_text-white">Abierto de Lunes a Viernes</p>
                    <p class="info_text-gray">8:00am - 6:00pm</p>
                </div>
            </div>
        </section>


        <section class="features">
            <div class="container" data-aos="fade-up">
                <div class="feature_item " >
                    <div class="feature_icon">
                        <img src="images/order-food.png" alt="">
                    </div>
                    <h4 class="feature_title">Facil de Ordenar</h4>
                    <p class="feature_text">Te proporcionamos una interfaz interactiva para que la elección de tu
                        pedido, sea fácil de usar y rapida. A través de solo un par de clicks.
                    </p>
                </div>

                <div class="feature_item" >
                    <div class="feature_icon">
                        <img src="images/fast-delivery.png" alt="">
                    </div>
                    <h4 class="feature_title">Entrega Inmediata</h4>
                    <p class="feature_text">Disfruta de nuestra selección de cafes sin salir de tu hogar. LLevamos la
                        calidad de nuestros productos de forma rápida y eficiente.
                    </p>
                </div>

                <div class="feature_item">
                    <div class="feature_icon">
                        <img src="images/coffee-beans.png" alt="">
                    </div>
                    <h4 class="feature_title">Cafe de Alta Calidad</h4>
                    <p class="feature_text">Ofrecemos una selección de granos de café cuidadosamente seleccionados y
                        preparados con precisión para brindarte una experiencia única en cada taza."
                    </p>
                </div>
            </div>
        </section>

        <section class="menu">
            <div class="container" id="menuIndexContainer">
                <div class="menu_left" data-aos="fade-right">
                    <div class="menu_title">
                        <p>Descubre</p>
                        <h3>nuestro menu</h3>
                    </div>
                    <p>Brindamos una agradable experiencia de cafe, através de nuestra gran selección de productos,
                        elaboradas cuidadosamente para lograr una variedad de emociones a nuestros cliente.
                    </p>
                    <a href="/menu" class="menu_btn">Ver menú completo</a>
                </div>
                <div class="menu_right" data-aos="fade-left">
                    <img src="images/menu-1.jpg.webp" alt="">
                    <img src="images/menu-2.jpg.webp" alt="">
                    <img src="images/menu-3.jpg.webp" alt="">
                    <img src="images/menu-4.jpg.webp" alt="">
                </div>
            </div>

        </section>


        <section class="contact" data-aos="fade-up">
            <div class="contact_map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31696.156813234928!2d-79.8631277089416!3d-6.767463799999988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904ceed764238eff%3A0x88c1ea190cce20a8!2sCoffee%20Art!5e0!3m2!1ses-419!2spe!4v1694010324780!5m2!1ses-419!2spe"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact_form" >
                <h3>Reserva una mesa</h3>
                <form action="" method="POST" id="reservation" class="">
                    <div class="form_row">
                        <div class="form_group">
                            <input type="text" placeholder="Nombre" name="nombre" required>
                            <span class="invalid">El campo nombre es obligatorio</span>
                        </div>
                        <div class="form_group">
                            <input type="text" placeholder="Apellido" name="apellido" required>
                            <span class="invalid">El campo apellido es obligatorio</span>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form_group">
                            <input type="date" placeholder="Date" name="fecha" required>
                            <span class="invalid">El campo fecha es obligatorio</span>
                        </div>
                        <div class="form_group">
                            <input type="time" placeholder="Time" name="hora" required>
                            <span class="invalid">El campo hora es obligatorio</span>
                        </div>
                        <div class="form_group">
                            <input type="tel" placeholder="Teléfono" name="telefono" required>
                            <span class="invalid">El campo telefono es obligatorio</span>
                        </div>
                    </div>
                    <div class="form_row form_row-textarea">
                        <div class="form_group">
                            <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Mensaje" required></textarea>
                            <span class="invalid">El campo mensaje es obligatorio</span>
                        </div>
                        <div class="form_group">
                            <input type="submit" value="Reservar">
                        </div>
                    </div>
                </form>
            </div>
        </section>

<?php include_once __DIR__ . '/templates/footer.php' ?>

<?php $script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='js/app.js'></script>
    <script src='js/reservation.js'></script>
    "; ?>

