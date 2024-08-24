<?php include_once __DIR__ . '/../template/header.php' ?>

<?php if($state == 1): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Producto Registrado Correctamente</p>
<?php endif; ?>

<?php if($state == 2): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Producto Actualizado Correctamente</p>
<?php endif; ?>

<?php if($state == 3): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Producto Eliminado Correctamente</p>
<?php endif; ?>


<div class="px-8 mb-8 flex w-full justify-end items-center">
    <a href="/admin/productos/crear" class="bg-[#1C2434] text-white py-2 px-4 rounded-md ">Agregar producto</a>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8 mb-8">
    <table class="w-full text-md text-left rtl:text-right ">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3"> 
                    Imagen
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
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
            <?php foreach($productos as $producto): ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <img class="w-[80px] object-cover rounded-full" src="/images/menu/<?php echo $producto['imagen'] ?>" alt="">
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $producto['nombre'] ?>
                    </td>
                    <td class="px-6 py-4 max-w-[400px] min-w-[300px]">
                        <?php echo $producto['descripcion'] ?>
                    </td>
                    <td class="px-6 py-4">
                        S/ <?php echo $producto['precio'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php  
                            echo $producto['estado'] == 0 ? 'Descontinuado' : 'Activo';
                        ?>
                    </td>

                    <td class="px-6 py-4 text-left">
                        <div class=" flex gap-3 items-center">
                            <a href="/admin/productos/editar?id=<?php echo $producto['id']?>" class="font-medium text-blue-600 hover:underline">Editar</a>
                            <a href="/admin/productos/eliminar?id=<?php echo $producto['id']?>" class="font-medium text-red-600 hover:underline">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php include_once __DIR__ . '/../template/footer.php' ?>