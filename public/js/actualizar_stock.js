function update_producto(id){
    let cantidad = document.getElementById(`cantidad${id}`).value;
console.log(cantidad);


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

}