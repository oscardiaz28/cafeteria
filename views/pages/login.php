<?php 
session_start();

$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

if( $auth && !isset($_SESSION['admin']) ){
    header('Location: /');
}else if( $auth && isset($_SESSION['admin']) ) {
    header('Location: /admin');
}


?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<?php include_once __DIR__ . '/templates/alertas.php'; ?>

<section class="login container">
            <h2 class="section_title">Iniciar Sesión</h2>

            <form action="/login" class="form" method="POST">
                <div class="form_row">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="example@google.com">
                </div>
                <div class="form_row">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                </div>
                <input type="submit" value="Ingresar">
            </form>

        </section>

<?php include_once __DIR__ . '/templates/footer.php' ?>


        <?php $script = "<script src='js/app.js'></script>"; ?>