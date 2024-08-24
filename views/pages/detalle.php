<?php
$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;
$total = 0;

$estados = [
    'pendiente' => [
        'bg' => '#EBD081',
        'text' => '#8F7926'
    ],
    'enviado' => [
        'bg' => '#CAE5FC',
        'text' => '#3B5E8A'
    ],
    'cancelado' => [
        'bg' => '#F4C6CB',
        'text' => '#712F33'
    ],
    'entregado' => [
        'bg' => '#D5ECD8',
        'text' => '#3C6C49'
    ],
]

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>

<section class="detalle container">

    <a href="/mispedidos" class="back">< Regresar</a>

    <h3 class="title">Datos del Cliente:</h3>
    <p>Nombre: <span><?php echo $usuario['nombre'] ?> <?php echo $usuario['apellidos'] ?></span> </p>
    <p>Email: <span> <?php echo $usuario['email'] ?></span></p>

    <div class="separator"></div>

    <h3 class="title">Datos del Envio</h3>
    <p>Direccion: <span><?php echo $pedido['direccion'] ?></span></p>
    <p>Telefono: <span><?php echo $pedido['telefono'] ?></span></p>

    <?php $color = $estados[$pedido['estado']] ?>
    <p>Estado: <span class="state" style="background-color: <?php echo $color['bg'] ?>; color: <?php echo $color['text'] ?>"><?php echo $pedido['estado'] ?></span></p>


    <div class="separator"></div>

    <h3 class="title">Productos</h3>

    <div class="overflow">
    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos_productos as $pedido_producto) : ?>
                <?php 
                    $total += $pedido_producto['precio_producto'] * $pedido_producto['unidades'];    
                ?>
                <tr>
                    <td class="img">
                        <img src="/images/menu/<?php echo $pedido_producto['imagen_producto'] ?>" alt="">
                    </td>
                    <td><?php echo $pedido_producto['nombre_producto'] ?></td>
                    <td>S/ <?php echo $pedido_producto['precio_producto'] ?></td>
                    <td><?php echo $pedido_producto['unidades'] ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    </div>


    <div class="separator"></div>

    <div class="flex">
        <p>Subtotal: <span>S/ <?php echo $total ?></span></p>
        <p>Delivery: <span>S/ 10</span></p>
        <p class="total">Total: <span>S/ <?php echo $total + 10 ?></span></p>
    </div>
    



</section>

<?php include_once __DIR__ . '/templates/footer.php' ?>

<?php $script = 
    "
    <script src='/js/app.js'></script>
    "
    ;
?>
