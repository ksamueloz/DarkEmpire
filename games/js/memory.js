let finalizacion = false;
let imagenInicial;
let tiempo = 0;
let tiempoLimite = 180;
let puntaje = 0;

$(document).ready(function () {
    var array = [1, 2, 3, 4];
    //Cuando la persona haga Click en el botón de Jugar
    $('#btngame').on('click', function () {
        $.comenzarJuego();
    });

    //Función para poder comenzar el juego.
    $.comenzarJuego = function () {
        $('#contador').find('p').html('Cargando el juego...');
        //Creación de la cuadricula.
        for(var contador = 0; contador < 4; contador++) {
            //Se desordena el Array de elementos.
            array = array.sort(function () {
                return Math.random() - 0.5
            });
            tiempo = 0;
            //Se agrega los items a la lista.
            for(var lista = 0; lista < array.length; lista ++) {
                $('#container ul').append('<li rel="'+array[lista]+'"></li>');
            }
        }
        $('#inicio').stop(true, true).fadeOut(1500, function (){
            finalizacion = false;
            $.temporizador();
        }); 
    }
    //Función para Finalizar el Juego.
    $.finalizarJuego = function () {
        $('#container ul').html('');
        finalizacion = true;
        //mostrar el estado final
		$('#dcontador').find('p').html('<strong>Puntos obtenidos: </strong>'+puntaje+
		' &bull; <strong>Tiempo empleado: </strong>'+tiempo+' segundos');
        //Se muestra la parte inicial.
        $('#inicio').stop(true, true).fadeIn(1500, function () {
            $('ul li').stop(true, true).css('opacity', 1).html('&nbsp;');
        });
    }
    //Función para el manejo del tiempo.
    $.temporizador = function () {
        if(!finalizacion) {
            if(tiempo >= tiempoLimite) {
                $.finalizarJuego();
            } else {
                //Se llama de vuelta a la función.
                setTimeout('$.temporizador()', 1000);
                $('#contador').find('p').html('<strong>Puntos obtenidos: </strong>'+ '' +
	            	' &bull; <strong>Tiempo empleado: </strong>'+tiempo+' segundos');
                tiempo++;
            }
        }
    };

    //Se verifica si hace Click en algú Item de la lista.
    $('ul li').live('click', function () {
        if (!finalizacion && $(this).css('opacity') != 0) {
            let imagenes = 'img/mosaicos/'+$(this).attr('rel')+'.png';
            if (imagenInicial == undefined) {
                imagenInicial = $(this);
                imagenInicial.stop(true, true).animate({opacity:.9}).css('background-image', 'url('+imagenes+')');
            } else {
                let imagenFinal = $(this);
                imagenFinal.stop(true, true).animate({opacity:.9}).css('background-image','url('+imagenes+')');

                //nos aseguramos que no se este clickeando sobre el mismo elemento
				if(imagenInicial.index()!=imagenFinal.index()){
					//el usuario encontro una pareja (los dos elementos coinciden)
					if(imagenInicial.attr('rel')==imagenFinal.attr('rel')){
						//aumentamos los puntos en 1
						puntaje++;
						//ocultamos la pareja para que no aparezca mas
						$(imagenInicial).stop(true,true).animate({opacity: 1}).delay(700).animate({opacity: 0});
						$(imagenFinal).stop(true,true).animate({opacity: 1}).delay(700).animate({opacity: 0});
						
						//finalizamos el juego porque ya encontro todas las parejas
						//if(iPuntosObtenidos==$('ul li').length/2) $.fntFinalizarJuego();
                        if(puntaje==$('ul li').length/2) $.finalizarJuego();
                    }else{
						//el usuario no encontro una pareja, no coinciden los elementos
						//borramos el contenido de los elementos seleccionados por el usuario
						$(imagenInicial).stop(true,true).animate({opacity: 1},1000,function(){$(this).css('background-image','none');});
						$(imagenFinal).stop(true,true).animate({opacity: 1},1000,function(){$(this).css('background-image','none');});
					}
				}else{
					//se esta clickeando sobre el mismo elemento, entonces le devolvemos su opacidad original
					$(this).stop(true,true).animate({opacity: 1},1000,function(){$(this).html('&nbsp;');});
				}
				//limpiamos la variable que contiene al primer elemento
				imagenInicial=undefined;
            }
        } else {
			//el juego finalizo o el elemento clickeado ya fue descubierto
		} 
    });
});