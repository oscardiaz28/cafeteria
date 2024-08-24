
<?php include_once __DIR__ . '/template/header.php' ?>

<?php if($state == 2): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Pedido Actualizado Correctamente</p>
<?php endif; ?>

<?php if($state == 3): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Pedido Eliminado Correctamente</p>
<?php endif; ?>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
    <table class="w-full text-md text-left rtl:text-right ">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3"> 
                    ID° del Pedido
                </th>
                <th scope="col" class="px-6 py-3">
                    Cliente
                </th>
                <th scope="col" class="px-6 py-3">
                    Dirección
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $pedido): ?>

                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <?php echo $pedido['pedidoId'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $pedido['nombreUsuario'] . " " . $pedido['apellidoUsuario'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $pedido['direccion'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $pedido['telefono'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $pedido['fecha'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $pedido['estado'] ?>
                    </td>
                    <td class="px-6 py-4 text-left">
                        <div class=" flex gap-3 items-center">
                            <a href="/admin/pedidos/detalle?id=<?php echo $pedido['pedidoId'] ?>&userId=<?php echo $pedido['userId'] ?>" class="font-medium text-blue-600 hover:underline">Detalle</a>
                            <a href="/admin/pedidos/eliminar?id=<?php echo $pedido['pedidoId'] ?>" class="font-medium text-red-600 hover:underline">Eliminar</a>
                        </div>
                    </td>
                </tr>
            
            <?php endforeach; ?>
            
            
        </tbody>
    </table>
</div>


<?php include_once __DIR__ . '/template/footer.php' ?>