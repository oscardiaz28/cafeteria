

<?php include_once __DIR__ . '/../template/header.php' ?>


<div>
    <form class="max-w-lg mx-auto" action="/admin/productos/crear" method="POST" enctype="multipart/form-data">

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Agregar Imagen</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="user_avatar_help" id="user_avatar" type="file" name="imagen" required>
        </div>
        
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="border w-full py-2 rounded-md outline-none px-4" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="descripcion">Descripción</label>
            <textarea required type="text" name="descripcion" id="descripcion" class="border w-full py-2 rounded-md outline-none px-4"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="precio">Precio</label>
            <input type="text" name="precio" id="precio" class="border w-full py-2 rounded-md outline-none px-4" required>
        </div>

        <input class="bg-[#1C2434] text-white py-2 px-4 rounded-md " type="submit" value="Registrar">

    </form>

</div>




<?php include_once __DIR__ . '/../template/footer.php' ?>