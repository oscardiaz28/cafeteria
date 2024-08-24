<?php
    $nombre = $_SESSION['nombre'] ?? '';
?>
<div class="h-screen overflow-hidden flex">

    <?php include_once __DIR__ . '/aside.php' ?>

    <main class="pb-6 flex-1 h-screen overflow-y-auto">

        <div class="flex items-center justify-between border shadow-md py-5 px-6 mb-8 bg-white">
            <h3 class="font-bold text-2xl">Bienvenido <?php echo $nombre ?></h3>
            <a href="/logout" class="hover:underline">Cerrar Sesión</a>
            <div class="block md:hidden cursor-pointer text-2xl font-bold" id="sidebar">
                <i class='bx bx-menu-alt-right'></i>
            </div>
        </div>
