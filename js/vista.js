let juego = document.getElementById("e-juego"); //..::Si presiona en iniciar el juego::..
let t = document.getElementById("msm-2"); //t: ..::Texto, leerá el contenido del Mensaje 2: msm-2::..
let r = document.getElementById("container"); //..::Lee el contenido del contenedor principal:inicial::..
let ini = 10, min = 1, max = 1000;
let enigma = Math.ceil(Math.random() * 1000); //..::Genero un número Enigma::..
function init() {
    juego.onclick = function (e) { //..::Mientras presione el botón, entonces...Evalua las condiciones::..
        if (numero.value >= min && numero.value <= max && ini >=0 && ini <= 10 ) {
            if (numero.value < enigma) {
            ini = ini-1;
            t.innerHTML ='<p>' + nombre.value + " tu número: " + numero.value + " es menor al enigma, " + "tienes "+ ini + ' <i class="far fa-heart" aria-hidden="true">' + '</i>' +" intentos" + t.innerHTML + '</p>';
            mostrarMensaje();
        }else if (numero.value > enigma) {
            ini = ini-1;
            t.innerHTML = '<p>'+ nombre.value + " tu número: " + numero.value + " es mayor al enigma, " + "tienes "+ ini + ' <i class="far fa-heart" aria-hidden="true">' + '</i>'+ " intentos" + t.innerHTML + '</p>';
            mostrarMensaje();
        } else if (numero.value == enigma) {
            t.innerHTML ='<p>'+ nombre.value + " tu número: " + numero.value + " es idéntico al enigma, " + "lo lograste con  "+ ini + ' <i class="far fa-heart" aria-hidden="true">' + '</i>' + " intentos de sobra" + t.innerHTML + '</p>';
            mostrarMensaje();
            setTimeout('ganar()', 4000);
            setTimeout('borrar()', 1000); //..::Borro el contenido del número::..
        }
        if (ini == 0) {
            ini = 10;
            t.innerHTML ='<p>'+ nombre.value + " has perdido, inténtalo de nuevo" + t.innerHTML +'</p>';
            mostrarMensaje();
            setTimeout('borrar()', 1000); //..::Borro el contenido::..
            setTimeout('borrarTexto()', 3000); //..::Borro el texto que estaba visualmente::..
            enigma = Math.ceil(Math.random() * 1000); //..::Genero de nuevo un número Enigma al Azar::..
            ini = 10;
        }
      } else {
        t.innerHTML ='<p>'+ "Escribe un número entre 1-1000" + t.innerHTML +'</p>';
        mostrarMensaje();
      }
    }
}
window.addEventListener("KeyDown", function() { init(); }); //..::Evento agregado:.::.:Presionar tecla Enter::..
function mostrarMensaje() { //..::Estilos es común::..
    t.style.fontFamily ="sans-serif";
    t.style.fontSize = "19px";
    t.style.color="white";
}
function borrar() { 
document.getElementById("e-juego").innerHTML = "¡Volver a jugar!";
numero.value = ""; //..::Deja el valor a decisión de la persona::..
}
function borrarTexto(){
    t.innerHTML = '';
}
function ganar(){ //..::Si la persona ganó se muestra este Mensaje::..
t.innerHTML = '<p>' + "Felicidades " + nombre. value + ", ganaste con el número " + enigma + " eres digno de recibir este premio " +'<i class="fas fa-trophy" aria-hidden="true">' + '</i>' + '</p>';
enigma = Math.ceil(Math.random() * 1000); //..::Genero de nuevo un número Enigma al Azar::..
ini = 10; //..::Devuelvo las vidas para nueva partida::..
mostrarMensaje();
t.style.textAlign="center";
}