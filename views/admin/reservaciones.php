<?php include_once __DIR__ . '/template/header.php' ?>

<?php if($state == 2): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Reservación actualizada Correctamente</p>
<?php endif; ?>

<?php if($state == 3): ?>
    <p class="bg-[#D4EDDA] text-[#155724] mx-8 py-3 mb-5 px-4 rounded-md">Reservación eliminada Correctamente</p>
<?php endif; ?>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
    <table class="w-full text-md text-left rtl:text-right ">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3"> 
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellidos
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3">
                    Mensaje
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
            <?php foreach($reservaciones as $reservacion): ?>
                <tr class="bg-white border-b ">
                    <td class="px-6 py-4">
                        <?php echo $reservacion['nombre'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $reservacion['apellidos'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $reservacion['fecha'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $reservacion['hora'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $reservacion['telefono'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $reservacion['mensaje'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <span class="<?php echo $reservacion['estado'] == 0 ? "bg-[#0499BB]" : "bg-[#16A144]" ?> text-white inline-block py-2 px-3 rounded-md"><?php echo $reservacion['estado'] == 0 ? 'Pendiente' : 'Confirmado' ?></span>
                    </td>
                    <td class="px-6 py-4 text-left">
                        <div class=" flex gap-3 items-center">
                            <a href="/admin/reservaciones/editar?id=<?php echo $reservacion['id'] ?>" class="font-medium text-blue-600 hover:underline">Actualizar</a>
                            <a href="/admin/reservaciones/eliminar?id=<?php echo $reservacion['id'] ?>" class="font-medium text-red-600 hover:underline">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include_once __DIR__ . '/template/footer.php' ?>