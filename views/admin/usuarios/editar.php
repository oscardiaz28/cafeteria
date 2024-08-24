<?php include_once __DIR__ . '/../template/header.php' ?>


<div>
    <form class="max-w-lg mx-auto" method="POST" enctype="multipart/form-data">

        <div class="mb-4">
            <input type="hidden" value="<?php echo $usuario['id'] ?>" name="id">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Agregar Imagen</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="user_avatar_help" id="user_avatar" type="file" name="imagen">

            <?php if($usuario['imagen']): ?>
                <img class="w-[80px] object-cover rounded-full" src="/images/perfil/<?php echo $usuario['imagen'] ?>" alt="">
                <input type="hidden" name="imagen" value="<?php echo $usuario['imagen'] ?>">
            <?php endif; ?>
        </div>
        
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="border w-full py-2 rounded-md outline-none px-4" value="<?php echo $usuario['nombre'] ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="apellidos">Nombre</label>
            <input type="text" name="apellidos" id="apellidos" class="border w-full py-2 rounded-md outline-none px-4" value="<?php echo $usuario['apellidos'] ?>" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="email">Email</label>
            <input type="text" name="email" id="email" class="border w-full py-2 rounded-md outline-none px-4" value="<?php echo $usuario['email'] ?>" required>
        </div>


        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="estado">Rol</label>
            <select name="rol" id="rol" class="w-full py-2 rounded-md outline-none px-4 border">
                <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : '' ?> >Admin</option>
                <option value="user" <?php echo $usuario['rol'] == 'user' ? 'selected' : '' ?> >User</option>
            </select>
        </div>

        <input class="bg-[#1C2434] text-white py-2 px-4 rounded-md " type="submit" value="Actualizar">

    </form>

</div>


<?php include_once __DIR__ . '/../template/footer.php' ?>
