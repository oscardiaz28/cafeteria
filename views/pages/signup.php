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

            <h2 class="section_title">Crea tu Cuenta</h2>

            <form action="/signup" class="form" method="POST">
                <div class="form_row">
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" placeholder="ejm. Juan">
                </div>
                
                <div class="form_row">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" placeholder="ejm. Perez">
                </div>
                <div class="form_row">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="example@google.com">
                </div>
                <div class="form_row">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                </div>
                <input type="submit" value="Registrarse">
            </form>

        </section>

<?php include_once __DIR__ . '/templates/footer.php' ?>
    
<?php $script = "<script src='js/app.js'></script>"; ?>
