
<nav class="nav <?php echo $index ?? '' ?>">
            <div class="container flex flex-center justify-between">
                <a href="/">
                    <h2 class="nav_logo">Café Central</h2>
                </a>

                <button href="" class="nav_hamburger">
                    <i class='bx bx-menu'></i>
                </button>

                <!-- NAV MOBILE -->
                <div class="nav_menu">
                    <span class="nav_close">
                        <i class='bx bx-x'></i>
                    </span>
                    <a href="/">Inicio</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/menu">Menú</a>
                    <a href="/contacto">Contact</a>
                    <a href="/checkout" class="cart_link">
                        <i class='bx bxs-cart-add cart_icon'></i>
                        <span class="cart_count">
                            <small>1</small>
                        </span>
                    </a>
                    <?php if($auth): ?>
                        <a href="/mispedidos" class="cart_link">Mis Pedidos</a>
                        <a href="/logout" class="cart_link">Cerrar Sesión</a>
                    
                    <?php else: ?>
                        <a href="/login" class="cart_link">Iniciar Sesión</a>
                        <a href="/signup" class="cart_link">Crear Cuenta</a>

                    <?php endif; ?>

                   
                </div>


                <!-- NAV DESKTOP -->

                <div class="nav_links flex flex-center">
                    <a href="/">Inicio</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/menu">Menú</a>
                    <a href="/contacto">Contacto</a>
                    <div href="#" class="cart_link cart_icon-link">
                        <i class='bx bxs-cart-add cart_icon'></i>
                        <span class="cart_count hidden" id="cart_count">
                            <small>1</small>
                        </span>

                        <div class="cart hidden">
                            <p class="cart_header" style="border-bottom: 1px solid #646464">Cart</p>
                            <div class="cart_container">

                                <div class="cart_products">
                                </div>

                                <a href="/checkout" class="hidden" id="btnCheckout">
                                    <div class="cart_checkout">Checkout</div>
                                </a>
                            </div>
                            <p class="cart_empty">Tu carrito esta vacío</p>
                        </div>
                    </div>

                    <?php if($auth): ?>
                        <a href="/mispedidos" class="cart_link">Mis Pedidos</a>
                        <a href="/logout" class="cart_link">Cerrar Sesión</a>
                    
                    <?php else: ?>
                        <a href="/login" class="cart_link">Iniciar Sesión</a>
                        <a href="/signup" class="cart_link">Crear Cuenta</a>

                    <?php endif; ?>

                </div>
            </div>
        </nav>