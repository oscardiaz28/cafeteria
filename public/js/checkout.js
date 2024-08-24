
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

    const productos = JSON.stringify(pedidos.productos);

    btnSubmit.addEventListener('click', async () => {

        if(validarFormUsuario()){
            const formData = new FormData();
            formData.append('id_usuario', id);
            formData.append('fecha', formatFecha);
            formData.append('estado', "pendiente");
            formData.append('direccion', direccionUsuario.value);
            formData.append('telefono', telefonoUsuario.value);
            formData.append('productos', productos)

            //solicitud post
            const response = await fetch("http://localhost:4000/api/pedidos", {
                method : 'POST',
                body: formData
            })
            const data = await response.json();

            if(data.status == true){

                localStorage.removeItem('pedidos');
                let items = {
                    productos : []
                }

                telefonoUsuario.value = '';
                direccionUsuario.value = '';
                checkoutHTML(items);

                showModal();
            }
        }
    })

    function showModal(){
        Swal.fire({
            title: "Gracias por tu pedido",
            icon: "success",
            confirmButtonText: "OK",
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = 'http://localhost:4000/mispedidos';
            }
        });
    
        const swal = document.querySelector('.swal2-popup');
        swal.style.fontSize = "1.4rem";
    }
    
    function validarFormUsuario(){
        if(direccionUsuario.value == '' || telefonoUsuario.value == ''){
            showAlert('Completar ambos campos');
            return false;
        }
        return true;
    }
    
    function showAlert(message){

        const alert = document.querySelector('.alert');
        if(alert){
            return;
        }
        const form = direccionUsuario.parentElement.parentElement.parentElement;
        const p = document.createElement('P');
        p.classList.add('alert');
        p.style.width = "100%";
        p.style.backgroundColor = '#F8D7DA';
        p.style.padding = '1.2rem 1.5rem';
        p.style.borderRadius = '.5rem';
        p.style.color = "#c3091c";
        p.textContent = message;
        form.appendChild(p);
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


