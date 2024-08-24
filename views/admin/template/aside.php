<?php
    function addClass($href){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
        return ($url == $href) ? 'bg-[#333A48]' : '';
    }
?>

<aside class="aside bg-[#1C2434] h-screen overflow-y-auto w-[300px] hidden md:block">
    <!-- Header -->
    <div class="p-5">
        <a href="/admin" class="text-white text-2xl font-bold flex gap-3">
            <span class="mt-[1px] inline-block bg-[#3C50E0] w-[35px] h-[35px] flex items-center justify-center rounded-md"><i class='bx bxs-dashboard'></i></span>
            <h3>Dashboard</h3>
        </a>
    </div>
    <!-- End Header -->

    <!-- Menu  -->
    <div class="mt-5 px-5 pb-5">
        <ul>
            <li class="<?php echo addClass('/admin') ?> text-lg flex items-center gap-3 transition duration-200 ease-in hover:bg-[#333A48] px-4 shadow-md rounded-md mb-2">
                <span class="text-[#DEE4EE]"><i class='bx bxs-dashboard'></i></span>
                <a href="/admin" class="text-[#DEE4EE] inline-block  w-full py-[12px] ">Dashboard</a>
            </li>
            <li class="<?php echo addClass('/admin/productos') ?> text-lg flex items-center gap-3 transition duration-200 ease-in hover:bg-[#333A48] px-4 shadow-md rounded-md mb-2">
                <span class="text-[#DEE4EE]"><i class='bx bx-sitemap'></i></span>
                <a href="/admin/productos" class="text-[#DEE4EE] inline-block  w-full py-[12px] ">Productos</a>
            </li>
            <li class="<?php echo addClass('/admin/usuarios') ?> text-lg flex items-center gap-3 transition duration-200 ease-in <?php echo addClass('/admin/usuarios') ?>  hover:bg-[#333A48] px-4 shadow-md rounded-md mb-2">
                <span class="text-[#DEE4EE]"><i class='bx bx-sitemap'></i></span>
                <a href="/admin/usuarios" class="text-[#DEE4EE] inline-block  w-full py-[12px] ">Usuarios</a>
            </li>
            <li class="<?php echo addClass('/admin/pedidos') ?> text-lg flex items-center gap-3 transition duration-200 ease-in hover:bg-[#333A48] px-4 shadow-md rounded-md mb-2">
                <span class="text-[#DEE4EE]"><i class='bx bx-sitemap'></i></span>
                <a href="/admin/pedidos" class="text-[#DEE4EE] inline-block  w-full py-[12px] ">Pedidos</a>
            </li>
            
        </ul>
    </div>

</aside>