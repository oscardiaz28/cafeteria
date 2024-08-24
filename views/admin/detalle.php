<?php
$total = 0;
$estados = [
    'pendiente' => '#FFD700',
    'enviado' => '#1E90FF',
    'cancelado' => '#DC143C',
    'entregado' => '#00FF00',
]
?>


<?php include_once __DIR__ . '/template/header.php' ?>

<div class="px-8">

    <a href="/admin/pedidos" class="text-blue-700 inline-block mb-3 hover:underline">
        < Regresar</a>

            <div class="mb-3 mt-4">
                <p class="font-bold text-md mb-2">Estado del Pedido:</p>

                <form action="" method="POST">
                    <input type="hidden" value="<?= $pedido['id'] ?>" name="pedido_id">
                    <select name="estado" id="" class="p-2 px-4 border rounded-md outline-none">
                        <option value="pendiente" <?= $pedido['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="enviado" <?= $pedido['estado'] == 'enviado' ? 'selected' : '' ?>>Enviado</option>
                        <option value="cancelado" <?= $pedido['estado'] == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                        <option value="entregado" <?= $pedido['estado'] == 'entregado' ? 'selected' : '' ?>>Entregado</option>
                    </select>
                    <input type="submit" class="block bg-[#1C2434] text-white py-2 px-4 rounded-md mt-3 text-sm cursor-pointer" value="Cambiar Estado">
                </form>
            </div>

            <div class="mt-8">
                <h3 class="font-bold text-md mb-2">Datos del Cliente:</h3>
                <p class="text-[#1C2434] font-bold">Nombre: <span class="font-normal"><?php echo $usuario['nombre'] ?> <?php echo $usuario['apellidos'] ?></span> </p>
                <p class="text-[#1C2434] font-bold">Email: <span class="font-normal"> <?php echo $usuario['email'] ?></span></p>
            </div>

            <div class="mt-8"> 
                <h3 class="font-bold text-md mb-2">Datos del Envio</h3>
                <p class="text-[#1C2434] font-bold">Direccion: <span class="font-normal"><?php echo $pedido['direccion'] ?></span></p>
                <p class="text-[#1C2434] font-bold">Telefono: <span class="font-normal"><?php echo $pedido['telefono'] ?></span></p>
                <?php $color = $estados[$pedido['estado']] ?>
            </div>


            <h3 class="mt-8 font-bold text-md mb-3">Productos</h3>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-1">
                <table class="w-full text-md text-left rtl:text-right">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Imagen</th>
                            <th scope="col" class="px-6 py-3">Nombre</th>
                            <th scope="col" class="px-6 py-3">Precio</th>
                            <th scope="col" class="px-6 py-3">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($pedidos_productos as $pedido_producto) : ?>
                            <?php
                            $total += $pedido_producto['precio_producto'] * $pedido_producto['unidades'];
                            ?>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <img class="w-[80px] object-cover rounded-full" src="/images/menu/<?php echo $pedido_producto['imagen_producto'] ?>" alt="">
                                </th>
                                <td class="px-6 py-4"><?php echo $pedido_producto['nombre_producto'] ?></td>
                                <td class="px-6 py-4">S/ <?php echo $pedido_producto['precio_producto'] ?></td>
                                <td class="px-6 py-4"><?php echo $pedido_producto['unidades'] ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="flex mb-10 justify-start items-end mt-4 flex-col gap-3">
                <p class="text-[#1C2434] font-bold">Subtotal: <span class="font-normal">S/ <?php echo $total ?></span></p>
                <p class="text-[#1C2434] font-bold">Delivery: <span class="font-normal">S/ 10</span></p>
                <p class="text-[#DC3545] font-bold">Total: <span class="font-normal text-black">S/ <?php echo $total + 10 ?></span></p>
            </div>
</div>


<?php include_once __DIR__ . '/template/footer.php' ?>