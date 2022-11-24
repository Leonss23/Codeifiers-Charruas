/*Funcion de ver o ocultar password en formulario*/
function mostrar() {
    var ojito = document.getElementById("ojo");
    ojito.addEventListener("click", function () {

        var pass = document.getElementById("password1");
        if (pass.type == "password") {

            pass.type = "text";
            pjito.removeChild("ojo");
            ojito.classList.add('hidden');


        } else {

            pass.type = "password";
            document.getElementById("ojo2").classList.add('shown');


        }
    });

}
/* Funcion que trae contendedor del menu de portrait*/
let panel_menu = document.querySelector(".portrait_menu"); //Container del menu para mobile/portrait
let menu_bar = document.querySelector("#menu_despl"); //Icono de menu_bar

function animation_bar() {
    panel_menu.classList.toggle("toggled"); //Se activa la clase toggled
}

/*AL hacer click en el menu */
menu_bar.addEventListener("click", animation_bar);


/*Panel Admin*/
let container_new_user = document.querySelector("#new-user");

function show_container_new_user(){
    container_new_user.classList.add("toggled");
      
}
function hidden_container_new_user(){
    container_new_user.classList.remove("toggled");
      
}


//Boton de subir arriba

buttonUp = document.getElementById("container_arrow_up");

function scrollUp(){

    var currentScroll = document.documentElement.scrollTop;
    
    window.scrollTo (0, currentScroll / currentScroll );
    //console.log( currentScroll - (currentScroll / currentScroll));
}


window.onscroll = function(){

    var scroll = document.documentElement.scrollTop;

    if (window.scrollY >= 200){
        buttonUp.style.display="flex";
        buttonUp.style.transform = "scale(1)";
        //console.log(scroll);
    } else
    if(window.scrollY < 600){
        buttonUp.style.transform = "scale(0)";
    }

}

buttonUp.addEventListener("click", scrollUp);

