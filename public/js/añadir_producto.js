//Contrasena de paypal ProyectoCodeifiers22
let cart = new Set();

function cargar_producto(id) {
  let cant = Number(document.getElementById(`cant_prod${id}`).value);
  //console.log("Cantidad",cant,"</br>", "id",id);
  const data = new FormData();
  data.set("id", id);
  data.set("cantidad", cant);

  fetch('../src/agregar_producto.php',
    {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error al registrar producto";
      }
    })
    .then(function (texto) {
      //console.log(texto);
      console.log(id);

      //Muestro notificacion de que producto fue agregado
      uno = document.getElementById(`producto_agregado`);
      MsgC = document.getElementById(`Agregado_texto`); //Mensaje de texto
       MsgC.innerHTML = `Artículo añadido correctamente a tu compra`;
      uno.style.display = "flex"; setTimeout(() => {
        uno.style.display = 'none';
      }, 2000);
      


      let cantidad_carrito = document.querySelector(`#cantidad_carrito`);
      if(cart.has(id)){
      }else{
        cantidad_carrito.innerHTML = Number(cantidad_carrito.innerHTML) +1
        
        cart.add(id);
      };
      
    
    })
    .catch(function (err) {
      console.log(err);
    });
}


function restar_producto(id) 
{
  const data = new FormData();
  data.set("id", id);

  fetch('../src/quitar_producto.php',
  {
    method: 'POST',
    body: data
  })
  .then(function (response) 
  {
    if (response.ok) {
      return response.text();
    } else {
      throw "error";
    }
  })
  .then(function (texto) 
  {
    let cant_counter =  document.querySelector(`#cart_cant_prod${id}`);

    (cant_counter.value > 1)? cant_counter.value-- : console.log("No puede restar a menos de un producto. elimine.");
    console.log("Producto reducido en un item correctamente.");
    load_cart();
  })
  .catch (function (err) 
  {
    console.log(err);
  });
}

function agregar_producto(id) {

  const data = new FormData();
  data.set("id", id);


  fetch('../src/sumar_producto.php',
    {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error";
      }
    })
    .then(function (texto) {
      console.log(texto);
      let cant_counter = document.querySelector(`#cart_cant_prod${id}`);
      cant_counter.value = Number(cant_counter.value) + 1 ;
      //console.log("Agrego actualizo");
      load_cart();
    })
    .catch(function (err) {
      console.log(err);
    });
  }

function eliminar(id){
  const data = new FormData();
  data.set("id", id);


  fetch('../src/eliminar_producto.php',
    {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error en eliminar producto";
      }
    })
    .then(function (texto) {
      //console.log(texto);
      let cantidad_carrito = document.querySelector(`#cantidad_carrito`);
      cantidad_carrito.innerHTML = Number(cantidad_carrito.innerHTML) -1;  
       load_cart();
       location.reload();
     
      //console.log("Agrego actualizo");

    })
    .catch(function (err) {
      console.log(err);
    });

}

function session(){
        //Muestro notificacion de que producto fue agregado
        uno = document.getElementById(`producto_agregado`);
        MsgC = document.getElementById(`Agregado_texto`); //Mensaje de texto
        icono = document.getElementById(`icono_check`);
        icono.style.display ="none";
        uno.style.display = "flex"; setTimeout(() => {
          uno.style.display = 'none';
        }, 4000);

let tipo_usuario = document.getElementById("tipo_user");
console.log(tipo_usuario.value);

  if(tipo_usuario.value == 1 || tipo_usuario.value == 2){
    MsgC.innerHTML = `
    <i class="fa-solid fa-triangle-exclamation"></i> 
  Ingresa con una cuenta cliente para realizar la compra!
    `;


  } else if(tipo_usuario.value == ""){
    MsgC.innerHTML = `
    <i class="fa-solid fa-triangle-exclamation"></i> 
    Para realizar una compra debe de estar registrado
    `;
  }       
}
