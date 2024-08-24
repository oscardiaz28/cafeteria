let swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    speed: 500,
    effect: "fade",
    loop: true,
    autoplay: {
        delay: 10000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


(function () {

    function closeMenu() {
        const menu = document.querySelector('.nav_menu');
        menu.classList.remove('show')
    }

    function showMenu() {
        const menu = document.querySelector('.nav_menu');
        menu.classList.add('show')
    }

    function menuMobile() {
        const btnHamburger = document.querySelector('.nav_hamburger');
        btnHamburger.addEventListener('click', () => {
            showMenu();
        })

        const btnClose = document.querySelector('.nav_close');
        btnClose.addEventListener('click', () => {
            closeMenu();
        })
    }


    let alerts = document.querySelector('.alert-container');
    if (alerts) {
        setTimeout(() => {
            alerts.remove();
        }, 3000);
    }

    function closeCarrito() {
        const cart = document.querySelector('.cart');
        cart.classList.remove('hidden');
    }

    function showCarrito() {
        const cartIcon = document.querySelector('.cart_icon-link');
        cartIcon.addEventListener('click', deleteItem)

        cartIcon.style.cursor = 'pointer';
        cartIcon.addEventListener('click', (e) => {
            const cart = cartIcon.querySelector('.cart');
            if (e.target.classList.contains('cart_icon')) {
                cart.classList.toggle('hidden');
            }
        })
    }


    //--------------- CARRITO ----------------------

    const productos = document.querySelectorAll('.menu_item');
    const contenedorCarrito = document.querySelector('.cart .cart_products');
    const cartCounter = document.querySelector('#cart_count');
    let quantityInputs = '';

    let pedidos = {
        id: '',
        fecha: '',
        estado: '',
        productos: []
    }

    document.addEventListener('DOMContentLoaded', () => {
        pedidos = JSON.parse(localStorage.getItem('pedidos')) || {
            id: '',
            fecha: '',
            estado: '',
            productos: []
        };
        cartCount();
        carritoHTML();
    })  


    productos.forEach(producto => {
        producto.addEventListener('click', agregarProducto);
    })

    function agregarProducto(e) {
        let products = pedidos.productos;
        let exits = products.some( product => product.id == e.currentTarget.getAttribute('data-id'))
        if(exits){
            alert('Producto ya agregado al carrito!');
            return;
        }
        showToast('success', 'Producto agregado al carrito');
        leerDatosProducto(e.currentTarget);
    }


    function leerDatosProducto(producto) {
        let imagen = producto.querySelector('img');
        let urlIimagen = imagen.src;
        let image = urlIimagen.substring(urlIimagen.lastIndexOf('/') + 1);

        const objProducto = {
            id: producto.getAttribute('data-id'),
            imagen: image,
            descripcion: producto.querySelector('.menu_item-description').textContent,
            nombre: producto.querySelector('.menu_item-nombre-name').textContent.replace(/\n/g, ''),
            precio: producto.querySelector('.menu_item-nombre-price').textContent,
            cantidad: 1
        }

        pedidos.productos = [...pedidos.productos, objProducto];

        cartCounter.classList.remove('hidden');
        cartCount();
        carritoHTML();
    }

    function carritoHTML() {
        contenedorCarrito.innerHTML = '';        

        const { productos } = pedidos;

        if(productos.length > 0){

            document.querySelector('.cart_empty').classList.add('hidden');
            document.querySelector('#btnCheckout').classList.remove('hidden');

            productos.forEach(producto => {
                const {cantidad, descripcion, id, imagen, nombre, precio} = producto;
                const row = document.createElement('div');
                row.classList.add('cart_product');
                row.innerHTML = `
                <img src="images/menu/${imagen}" alt="">
                <div class="cart_product-details">
                    <p>${nombre}</p>
                    <div class="price_group">
                        <span class="cart_price">$${precio}</span>
                        <span>x</span>
                        <input type="number" value="${cantidad}" min="1">
                    </div>
                </div>
                <p class="cart_delete" data-id="${id}"><i class='bx bx-trash'></i></p>
                `;
                contenedorCarrito.appendChild(row);
            })
            quantityInputs = contenedorCarrito.querySelectorAll('input[type="number"]');

            quantityInputs.forEach( input => {
                input.addEventListener('click', quantityChanged);
            })

            cartCounter.classList.remove('hidden');
            cartCounter.style.display = 'flex';
        }
        
        localStorage.setItem('pedidos', JSON.stringify(pedidos));
        cartCount();
    }

    // Delete Items
    function deleteItem(e){
        if(e.target.classList.contains('bx-trash')){
            let id = e.target.parentElement.dataset.id;
            let obj = {...pedidos};
            let {productos} = obj;
            let filterProducts = productos.filter( product => product.id !== id );
            pedidos.productos = filterProducts;

            localStorage.setItem('pedidos', JSON.stringify(pedidos));
            carritoHTML();
            cartCount();
            
            const checkoutContainer = document.querySelector('.order_products') ?? null;

            if(checkoutContainer){
                checkoutHTML(pedidos);
                updateTotal();
            }else{
                console.log(' no existe');
            }
        }
            
    }
    

    function quantityChanged(event){
        let input = parseInt(event.target.value);

        let producto = event.target.parentElement.parentElement.parentElement;
        let productoId = producto.querySelector('.cart_delete').getAttribute('data-id');

        let obj = {...pedidos};
        let {productos} = obj;

        productos.forEach( producto => {
            if(productoId == producto.id){
                if(input < 1){
                    return;
                }
                producto.cantidad = input;
            }
        })

        localStorage.setItem('pedidos', JSON.stringify(obj));
        cartCount();

        const checkoutContainer = document.querySelector('.order_products') ?? null;

        if(checkoutContainer){
            checkoutHTML(pedidos);
            updateTotal();
        }else{
            console.log(' no existe');
        }
    }

    function checkoutHTML(pedidos){

        const productsContainer = document.querySelector('.order_products') ?? null;

        productsContainer.innerHTML = "";

        const {productos }= pedidos;

        if(productos.length == 0){

            productsContainer.parentElement.innerHTML = `
                <p style="text-align: center">No tienes productos agregados</p>
            `;
        }

        productos.forEach( producto => {
            const {cantidad, descripcion, imagen, nombre, precio} = producto;
            let totalProducto = cantidad * precio;
            const div = document.createElement('div');
            div.classList.add('item');
            div.innerHTML = `
                <img src="images/menu/${imagen}" alt="">
                <div class="product_info">
                    <p>${nombre}</p>
                </div>
                <p class="quantity">${cantidad}</p>
                <p class="price">$${totalProducto}</p>
            `;
            productsContainer.appendChild(div);
        })
    }

    function updateTotal(){
        const txtSubTotal = document.querySelector('#subtotal');
        const txtDelivery = document.querySelector('#delivery');
        const txtTotal = document.querySelector('#total');

        const {productos} = pedidos;
        let total = 0;
        let delivery = 10;
        productos.forEach( producto => {
            let {cantidad, precio} = producto;
            total += cantidad * precio;
        })
        txtSubTotal.textContent = 'S/ ' + total;
        txtDelivery.textContent = 'S/ ' + delivery;
        txtTotal.textContent = 'S/ ' + (total + delivery);
    }


    function cleanHTML(){
        while(contenedorCarrito.firstChild){
            contenedorCarrito.removeChild(contenedorCarrito.firstChild);
        }
    }
   
    function cartCount() {
        let total = 0;

        const {productos } = pedidos;
        productos.forEach( producto => {
            total += producto.cantidad;
        })

        cartCounter.textContent = total;

        if(cartCounter.textContent == 0){
            cartCounter.style.display = 'none';
        }
    }

    function showToast(tipo, mensaje){
        const notifications = document.querySelector('.notifications');

        const div = document.createElement('div');
        div.classList.add('toast');
        div.classList.add(tipo);
        div.innerHTML = `
            <div class="column">
            <i class="fa-solid fa-circle-check"></i>
            <span>Succes: ${mensaje}</span>
            </div>
            <i class="fa-solid fa-x"></i>
        `;

        notifications.insertBefore(div, notifications.firstChild);

        setTimeout(() => {
            notifications.removeChild(notifications.lastElementChild);
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', () => {
        menuMobile();
        showCarrito();
    })


})();
