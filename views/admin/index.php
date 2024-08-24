<?php include_once __DIR__ . '/template/header.php' ?>

<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 px-5">
        <div class="shadow-lg border rounded-md px-5 py-5 w-full bg-white">
            <span class="inline-block text-3xl flex items-center justify-center text-[#2f855a] w-[50px] h-[50px] rounded-full bg-[#EFF2F7]"><i class='bx bx-money'></i></span>
            <div class="flex flex-col mt-5">
                <p class="font-bold text-[32px]">S/ <?php echo $total ?></p>
                <p class="text-[#a0a0a0] text-[17px]">Ingresos Totales</p>
            </div>
        </div>
        <div class="shadow-lg border rounded-md px-5 py-5 w-full bg-white">
            <span class="inline-block text-3xl flex items-center justify-center text-[#2f855a] w-[50px] h-[50px] rounded-full bg-[#EFF2F7]"><i class='bx bxs-coffee-alt'></i></span>
            <div class="flex flex-col mt-5">
                <p class="font-bold text-[32px]"><?php echo $totalProductos ?></p>
                <p class="text-[#a0a0a0] text-[17px]">Total Productos</p>
            </div>
        </div>
        <div class="shadow-lg border rounded-md px-5 py-5 w-full bg-white">
            <span class="inline-block text-3xl flex items-center justify-center text-[#2f855a] w-[50px] h-[50px] rounded-full bg-[#EFF2F7]"><i class='bx bx-group'></i></span>
            <div class="flex flex-col mt-5">
                <p class="font-bold text-[32px]"><?php echo $usuarios ?></p>
                <p class="text-[#a0a0a0] text-[17px]">Usuarios</p>
            </div>
        </div>
        <div class="shadow-lg border rounded-md px-5 py-5 w-full bg-white">
            <span class="inline-block text-3xl flex items-center justify-center text-[#2f855a] w-[50px] h-[50px] rounded-full bg-[#EFF2F7]"><i class='bx bxs-cart-add'></i></span>
            <div class="flex flex-col mt-5">
                <p class="font-bold text-[32px]"><?php echo $pedidos ?></p>
                <p class="text-[#a0a0a0] text-[17px]">Pedidos de Hoy</p>
            </div>
        </div>
    </div>
</div>

<div class="px-8 my-14 grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white w-full px-8 py-8 shadow-md rounded-lg">
        <h3 class="font-bold text-2xl text-gray-700 mb-6">Producto mas comprados</h3>
        <div class="max-w-[350px] mx-auto min-w-[250px] sm:w-[300px] md:w-[350px]">
            <canvas id="bestProducts" class="w-full h-full"></canvas>
        </div>
    </div>
    <!-- <div class="bg-white w-full px-8 py-8 shadow-md rounded-lg">
        <h3 class="font-bold text-2xl text-gray-700">Ventas por Dia</h3>
        <div class="max-w-[400px] mx-auto">
            <canvas id="daySolds" class="w-full h-full"></canvas>
        </div>
    </div> -->
</div>

<?php include_once __DIR__ . '/template/footer.php' ?>

<?php
$script = '
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="/js/chart.js"></script>
    ';

?>