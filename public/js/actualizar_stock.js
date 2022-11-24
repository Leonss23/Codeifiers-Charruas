function update_producto(id){
    let cantidad = document.getElementById(`cantidad_update${id}`).value;
console.log(cantidad);
if(cantidad){

  const data = new FormData();
  data.set("id", id);
  data.set("cantidad", cantidad);


  fetch('../src/update_producto_async.php',
    {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error en actualizar stock";
      }
    })
    .then(function (texto) {
      //console.log(texto);
      location.reload();
      //console.log("Agrego actualizo");



    })
    .catch(function (err) {
      console.log(err);
    });
}else{

        //Muestro notificacion de que producto fue agregado
        uno = document.getElementById(`mensaje`);
        MsgC = document.getElementById(`Agregado_texto`); //Mensaje de texto
         MsgC.innerHTML = `
         <i class="fa-solid fa-triangle-exclamation"></i>
         Para añadir stock tiene que darle a editar`;
        uno.style.display = "flex"; setTimeout(() => {
          uno.style.display = 'none';
        }, 2000);

}


}

function habilitar_update(id){
  let cantidad = document.getElementById(`cantidad${id}`).value;
  //console.log(cantidad);
  
  document.getElementById(`cantidad_update${id}`).type= "number";
}