
let id = document.querySelector('#id') ?? null ;

if( id != null ){

    id = document.querySelector('#id').value;

    let pedidos = JSON.parse(localStorage.getItem('pedidos'));
    const btnSubmit = document.querySelector('.checkout_btn');
    const productsContainer = document.querySelector('.order_products');
    const txtSubTotal = document.querySelector('#subtotal');
    const txtDelivery = document.querySelector('#delivery');
    const txtTotal = document.querySelector('#total');
    const direccionUsuario = document.querySelector('input[name="direccion"]');
    const telefonoUsuario = document.querySelector('input[name="telefono"]');
    
    const fechaActual = new Date();
    const año = fechaActual.getFullYear();
    const mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0');
    const dia = fechaActual.getDate().toString().padStart(2, '0');
    const formatFecha = año+"-"+mes+"-"+dia;

    pedidos.id = id;
    pedidos.estado = "en proceso";


    btnSubmit.addEventListener('click', () => {

        if(validarFormUsuario()){
            pedidos.direccion = direccionUsuario.value;
            pedidos.telefono = telefonoUsuario.value;
            pedidos.fecha = formatFecha

            console.log(pedidos);
        }
    })
    
    function validarFormUsuario(){
        if(direccionUsuario.value == '' || telefonoUsuario.value == ''){
            console.log('Completar ambos campos');
            return false;
        }
        return true;
    }
    

    checkoutHTML(pedidos);
    updateTotal();

    function checkoutHTML(pedidos){

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


}


