<?php include_once __DIR__ . '/../template/header.php' ?>

<?php if($state == 2): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Usuario Actualizado Correctamente</p>
<?php endif; ?>

<?php if($state == 3): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Usuario Eliminado Correctamente</p>
<?php endif; ?>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
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
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <img class="w-[50px] rounded-full" src="/images/perfil/<?php echo $usuario['imagen'] ?>" alt="">
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $usuario['nombre'] . ' ' . $usuario['apellidos'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $usuario['email'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $usuario['rol'] ?>
                    </td>
                    <td class="px-6 py-4 text-left">
                        <div class=" flex gap-3 items-center">
                            <a href="/admin/usuarios/editar?id=<?php echo $usuario['id'] ?>" class="font-medium text-blue-600 hover:underline">Editar</a>
                            <a href="/admin/usuarios/eliminar?id=<?php echo $usuario['id'] ?>" class="font-medium text-red-600 hover:underline">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

            
        </tbody>
    </table>
</div>


<?php include_once __DIR__ . '/../template/footer.php' ?>
