/*Funcion para buscador de productos en PANEL ADMIN */
window.addEventListener('load', (event) => 
{
    let input = document.getElementById("search_personas"); //Input que trae la informacion que quiero traer

    input.addEventListener("keypress", function(event) { //Cuando preciona el input se activa...
    if (event.key === "Enter") { //Al darle ENTER llamara la funcion
        event.preventDefault();
        fetch_serch(input.value);
    }
    });
});

function fetch_serch(busqueda_text) //Funcion de buscador
{
    const data = new FormData(); //Guardo los datos
    data.set("busqueda_persona", busqueda_text);
    fetch('../src/buscar.php',  //Se dirige a esta ubicacion a buscar la informacion
    {
        method: 'POST',
        body: data
    })
    .then(function(response) {if(response.ok) {return response.text()} else {throw "Error"}}) //Me devuelve si esta todo bien, si no me da error
    .then(function(texto) 
    {
        //recibo por fetch el resultado de la busqueda
        document.querySelector("#cuerpo_tabla_persona").innerHTML = ""; //Limpio la tabla
        document.querySelector("#cuerpo_tabla_persona").innerHTML = texto; //Lleno la tabla con los datos
    })
    .catch(function(err) {console.log(err)});
}/*Aqui termina la funcion de buscador PANEL ADMIN */