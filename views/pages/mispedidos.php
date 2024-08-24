<?php
$auth = isset($_SESSION) && !empty($_SESSION) ? true : false;

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

<section class="mispedidos container">

    <table class="table">
        <thead>
            <tr>
                <th>ID° del Pedido</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $pedido): ?>
                <tr>
                    <td class="link_detalle">
                        <a href="/mispedidos/detalle?id=<?php echo $pedido['id'] ?>"><?php echo $pedido['id'] ?></a>
                    </td>
                    <td>
                        <p><?php echo $pedido['direccion'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $pedido['telefono'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $pedido['fecha'] ?></p>
                    </td>
                    <td>
                        <?php $color = $estados[$pedido['estado']] ?>
                        <p class="state" style="background-color: <?php echo $color['bg'] ?>; color: <?php echo $color['text'] ?>"><?php echo $pedido['estado'] ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php include_once __DIR__ . '/templates/footer.php' ?> 

<?php $script = 
    "
    <script src='/js/app.js'></script>
    "
    ;
?>
