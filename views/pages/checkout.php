<?php

$auth = isAuth();

?>

<?php include_once __DIR__ . '/templates/header-nav.php' ?>




<div class="checkout_background">
    <section class="checkout container">

        <?php if ($auth) : ?>

            <?php
                $nombre = $_SESSION['nombre']. " " . $_SESSION['apellidos'];
                $email = $_SESSION['email'];
                $id = $_SESSION['id'];
            ?>

            <h2 class="section_title">Checkout</h2>

            <div class="checkout_row">
                <div class="checkout_col details">
                    <h3 class="title">Billing address</h3>
                    <div class="datos">
                        <div class="personal_data">
                            <p><?php echo $nombre ?></p>
                        </div>
                        <p class="email"><?php echo $email; ?></p>
                    </div>
                    <form action="">
                        <div class="form_row">
                            <label for="address">Direccion</label>
                            <input type="text" name="direccion" placeholder="1234 Main St">
                        </div>
                        <div class="form_row">
                            <label for="telefono">Telefono</label>
                            <input type="tel" name="telefono" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="checkout_col order">
                    <h3 class="title">Your Order</h3>

                    <?php ?>

                        <div class="order_products">

                            <div class="item">
                                <img src="images/menu-1.jpg.webp" alt="">
                                <div class="product_info">
                                    <p>Single Cup Brew</p>
                                </div>
                                <p class="quantity">1</p>
                                <p class="price">$150</p>
                            </div>
                            
                            <input type="hidden" id="id" value="<?php echo $id ?>">
                        </div>
                        <div class="pay_info">
                            <div class="row">
                                <span>Subtotal</span>
                                <p id="subtotal"></p>
                            </div>
                            <div class="row">
                                <span>Delivery</span>
                                <p id="delivery">$10</p>
                            </div>
                            <div class="row total">
                                <span>Total</span>
                                <p id="total">$2340</p>
                            </div>
                        </div>
                    <?php ?>
                </div>
            </div>
            <button type="button" class="checkout_btn">Realizar Pedido</button>

        <?php else: ?>

            <a href="/login">Inicia Sesión</a>

        <?php endif; ?>

    </section>
</div>

<?php include_once __DIR__ . '/templates/footer.php' ?>


<?php $script = 
    "<script src='js/app.js'></script><script src='js/checkout.js'></script>";
?>