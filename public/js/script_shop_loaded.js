
/*Cargo los productos*/
function load_shop()
{
    const market = document.querySelector("#content_oferta");
    const marketCatalogo = document.querySelector("#content_catalogo");

    //Cargo los productos en index.php -> Ofertas
    fetch('../src/load_market.php')
    .then(function(response) 
    {
        if(response.ok) 
        {
            return response.text();
        } else 
        {
            throw "Error market index";
        }
    })
        .then(function(load_market) 
        {
            //console.log(respuesta_archivo_load_market);
            market.innerHTML = " ";
            market.innerHTML = load_market;
        })
    .catch(function(err) 
    {
        console.log(err);
    });

        //Cargo los productos en  el catalogo.php
        fetch('../src/load_market_catalogo.php')
        .then(function(response) 
        {
            if(response.ok) 
            {
                return response.text();
            } else 
            {
                throw "Error";
            }
        })
            .then(function(respuesta_archivo_load_market) 
            {
                marketCatalogo.innerHTML = " ";
                marketCatalogo.innerHTML = respuesta_archivo_load_market;
            })
        .catch(function(err) 
        {
            console.log(err);
        });

}

/*Cargo los productos en el index -> Destacados */
function load_shop_destacados()
{
    const market = document.querySelector("#destacados_market");

    //Cargo los productos en index.php
    fetch('../src/load_market.php')
    .then(function(response) 
    {
        if(response.ok) 
        {
            return response.text();
        } else 
        {
            throw "Error";
        }
    })
    .then(function(respuesta_archivo_load_market) 
    {
        market.innerHTML = " ";
        market.innerHTML = respuesta_archivo_load_market;
    })
    .catch(function(err) 
    {
        console.log(err);
    });
}

/* Cargar productos al carrito */
function load_cart()
{
   
    let content = document.querySelector("#container_carrito");

    //Cargo los productos en index.php
    fetch('../src/consulta_carrito.php')
    .then(function(response) 
    {
        if(response.ok) 
        {
            return response.text();
        } else 
        {
            throw "Error en recibir carrito";
        }
    })
    .then(function(respuesta_archivo_load_cart) 
    {

        content.innerHTML = " ";
        content.innerHTML += respuesta_archivo_load_cart;
        //console.log(id);
    })
    .catch(function(err) 
    {
        //console.log(err);
    });
}

document.addEventListener("DOMContentLoaded", function(event) {
   load_shop();
    load_shop_destacados();
    load_cart();
    
});

