
/*
	Creado por, Luis Puello && Samuel Oz

	© Santa Martha - Colombia

	Universidad del Magdalena
*/

var contador = 0; /* variable que cuenta los movimientos */
var ficha = null; /* variable que guarda el id de la ficha o los img en este caso */
var origen = null; /* varible que guarda el div de origen o sea de donde se movio la ficha */
var destino = null; /* Variable que toma el id del div a mover*/
var posicion = null; /* variable que guarda la posicion del div a mover pero de forma de objeto */
var div = document.getElementById('historial'); /* variable que contiene los movimientos hechos */

var tablero = [];

var letras = ('a,b,c,d,e,f,g,h').split(',')


for(let a = 0 ; a < 8 ; a++)
{
    tablero.push([]);
    for(let b = 1 ; b <= 8 ; b++)
    {
        tablero[a].push(document.getElementById(letras[a]+b));
    }
}

/* Vector que contiene identifica las celdas vacias o llenas */
/* Los unos representan una ficha negra */
/* Los ceros indican que la posicion esta vacia */
/* Los dos representan una ficha blanca */
var celdas = [[1,1,1,1,1,1,1,1],
			 [1,1,1,1,1,1,1,1],
			 [0,0,0,0,0,0,0,0],
			 [0,0,0,0,0,0,0,0],
			 [0,0,0,0,0,0,0,0],
			 [0,0,0,0,0,0,0,0],
			 [2,2,2,2,2,2,2,2],
			 [2,2,2,2,2,2,2,2]];


/* Detenemos una acción por omisión, utilizada comunmente sobre etiquetas */
function activarSoltar(evento)
{
	/*Esto me ayuda a bloquear todos los eventos
	y así asignar solo los eventos que yo quiera que se escuche*/
	evento.preventDefault();
}

/* Contenedor de datos que estan siendo manipulados durante la operación de agarrar */
function agarrar(evento)
{
	/*Con esto activo el evento seleccionar imagen, por lo tanto este es un evento que ya se puede escuchar*/
	/* SetData es como para agarrar*/
	/* ParentElement me  ayuda a traer el id del contenedor padre, en este caso los div 
		para poder obtener la posicion anterior*/
	
	origen = evento.target.parentElement.attributes.id.value;
	evento.dataTransfer.setData("text", evento.target.id);
	ficha = evento.target.id;
	let pos = buscar_pos(origen);
	if(pos)
	{ /**......:::::::::Si no se ha movido del cento de la Existencia Misma, avanzará dos pasos o uno, de lo contrario solo avanará uno a la vez:::::::.............**/
	    if(ficha == "peonnegro1" && origen == "b1" || ficha == "peonnegro2" && origen == "b2" || ficha == "peonnegro3" && origen == "b3" ||
			   ficha == "peonnegro4" && origen == "b4" || ficha == "peonnegro5" && origen == "b5" || ficha == "peonnegro6" && origen == "b6" ||
			   ficha == "peonnegro7" && origen == "b7" || ficha == "peonnegro8" && origen == "b8"){
				for(let i=1; i<=2; i++){
					if (ExistePos(pos.y+i, pos.x)){
						if(celdas[pos.y+i][pos.x] == 1 || celdas[pos.y+i][pos.x] == 2){
							claseb(pos.y+i, pos.x);
	       					claseb(pos.y+i, pos.x);
						} else  clase(pos.y+i, pos.x);
	       						clase(pos.y+i, pos.x);
					}
				}
			} else 
			if(ficha == "peonnegro1" && origen !== "b1" || ficha == "peonnegro2" && origen != "b2" || ficha == "peonnegro3" && origen != "b3" ||
					ficha == "peonnegro4" && origen != "b4" || ficha == "peonnegro5" && origen != "b5" || ficha == "peonnegro6" && origen != "b6" ||
					ficha == "peonnegro7" && origen != "b7" || ficha == "peonnegro8" && origen != "b8")
			{
				if (ExistePos(pos.y+1, pos.x)){
		 	   		if(celdas[pos.y+1][pos.x] == 1 || celdas[pos.y+1][pos.x] == 2){
		 	   			claseb(pos.y+1, pos.x);
		 	   		} else clase(pos.y+1, pos.x);
				}
			}
			if(ficha == "peonblanco1" && origen == "g1" || ficha == "peonblanco2" && origen == "g2" || ficha == "peonblanco3" && origen == "g3" ||
				ficha == "peonblanco4" && origen == "g4" || ficha == "peonblanco5" && origen == "g5" || ficha == "peonblanco6" && origen == "g6" ||
				ficha == "peonblanco7" && origen == "g7" || ficha == "peonblanco8" && origen == "g8"){
				for(let i=1; i<=2; i++){
					if (ExistePos(pos.y-i, pos.x)){
						if(celdas[pos.y-i][pos.x] == 1 || celdas[pos.y-i][pos.x] == 2){
							claseb(pos.y-i, pos.x);
	       					claseb(pos.y-i, pos.x);
						} else  clase(pos.y-i, pos.x);
	       						clase(pos.y-i, pos.x);
					}
				}		
		 } else if(ficha == "peonblanco1" && origen !== "g1" || ficha == "peonblanco2" && origen != "g2" || ficha == "peonblanco3" && origen != "g3" ||
					ficha == "peonblanco4" && origen != "g4" || ficha == "peonblanco5" && origen != "g5" || ficha == "peonblanco6" && origen != "g6" ||
					ficha == "peonblanco7" && origen != "g7" || ficha == "peonblanco8" && origen != "g8")
		 {
		 	   if (ExistePos(pos.y-1, pos.x)){
		 	   		if(celdas[pos.y-1][pos.x] == 1 || celdas[pos.y-1][pos.x] == 2){
		 	   			claseb(pos.y-1, pos.x);
		 	   		} else clase(pos.y-1, pos.x);
				}
		 }
		 /**....................::::::::::::::::::::::Finaliza El Lienzo De Los Peones Blancos y Negros:::::::::::::::::::::::::........................**/
        if(ficha === "reynegro" || ficha === "reyblanco")
        {
        	for (var x = 1; x < 2; x++) {
				for (var y = 1; y < 2; y++){
					if (ExistePos(pos.y-y, pos.x)){
						if(celdas[pos.y-y][pos.x]==1 || celdas[pos.y-y][pos.x]==2){claseb(pos.y-y, pos.x);}
						else clase(pos.y-y, pos.x);
					}
					if (ExistePos(pos.y+y, pos.x)){
						if(celdas[pos.y+y][pos.x]==1 || celdas[pos.y+y][pos.x]==2){claseb(pos.y+y, pos.x);}
						else clase(pos.y+y, pos.x);
					}
					if (ExistePos(pos.y+y, pos.x+x)){
						if(celdas[pos.y+y][pos.x+x]==1 || celdas[pos.y+y][pos.x+x]==2){claseb(pos.y+y, pos.x+x);}
						else clase(pos.y+y, pos.x+x);
					}
					if (ExistePos(pos.y+y, pos.x-x)){
						if(celdas[pos.y+y][pos.x-x]==1 || celdas[pos.y+y][pos.x-x]==2){claseb(pos.y+y, pos.x-x);}
						else clase(pos.y+y, pos.x-x);
					}
					if (ExistePos(pos.y-y, pos.x-x)){
						if(celdas[pos.y-y][pos.x-x]==1 || celdas[pos.y-y][pos.x-x]==2){claseb(pos.y-y, pos.x-x);}
						else clase(pos.y-y, pos.x-x);
					}
					if (ExistePos(pos.y-y, pos.x+x)){
						if(celdas[pos.y-y][pos.x+x]==1 || celdas[pos.y-y][pos.x+x]==2){claseb(pos.y-y, pos.x+x);}
						else clase(pos.y-y, pos.x+x);
					}
					if (ExistePos(pos.y, pos.x+x)){
						if(celdas[pos.y][pos.x+x]==1 || celdas[pos.y][pos.x+x]==2){claseb(pos.y, pos.x+x);}
						else clase(pos.y, pos.x+x);
					}
					if (ExistePos(pos.y, pos.x-x)){
						if(celdas[pos.y][pos.x-x]==1 || celdas[pos.y][pos.x-x]==2){claseb(pos.y, pos.x-x);}
						else clase(pos.y, pos.x-x);
					}
				}
			}
        }
        if(ficha === "alfilnegro1" || ficha === "alfilnegro2" || ficha === "alfilblanco1" || ficha === "alfilblanco2" ||
           ficha === "reinanegra" || ficha === "reinablanca")
        {
			if (ExistePos(pos.y+1, pos.x+1)) {
				if(celdas[pos.y+1][pos.x+1]==1 || celdas[pos.y+1][pos.x+1]==2){claseb(pos.y+1, pos.x+1);}
    			else clase(pos.y+1, pos.x+1);
			}
			if (ExistePos(pos.y+1, pos.x-1)) {
				if(celdas[pos.y+1][pos.x-1]==1 || celdas[pos.y+1][pos.x-1]==2){claseb(pos.y+1, pos.x-1);}
    			else clase(pos.y+1, pos.x-1);
			}
			if (ExistePos(pos.y-1, pos.x+1)) {
				if(celdas[pos.y-1][pos.x+1]==1 || celdas[pos.y-1][pos.x+1]==2){claseb(pos.y-1, pos.x+1);}
    			else clase(pos.y-1, pos.x+1);
			}
			if (ExistePos(pos.y-1, pos.x-1)) {
				if(celdas[pos.y-1][pos.x-1]==1 || celdas[pos.y-1][pos.x-1]==2){claseb(pos.y-1, pos.x-1);}
    			else clase(pos.y-1, pos.x-1);
			}
			if (ExistePos(pos.y+2, pos.x+2)) {
				if(celdas[pos.y+2][pos.x+2]==1 || celdas[pos.y+2][pos.x+2]==2){claseb(pos.y+2, pos.x+2);}
    			else clase(pos.y+2, pos.x+2);
			}
			if (ExistePos(pos.y+2, pos.x-2)) {
				if(celdas[pos.y+2][pos.x-2]==1 || celdas[pos.y+2][pos.x-2]==2){claseb(pos.y+2, pos.x-2);}
    			else clase(pos.y+2, pos.x-2);
			}
			if (ExistePos(pos.y-2, pos.x+2)) {
				if(celdas[pos.y-2][pos.x+2]==1 || celdas[pos.y-2][pos.x+2]==2){claseb(pos.y-2, pos.x+2);}
    			else clase(pos.y-2, pos.x+2);
			}
			if (ExistePos(pos.y-2, pos.x-2)) {
				if(celdas[pos.y-2][pos.x-2]==1 || celdas[pos.y-2][pos.x-2]==2){claseb(pos.y-2, pos.x-2);}
    			else clase(pos.y-2, pos.x-2);
			}
			if (ExistePos(pos.y+3, pos.x+3)) {
				if(celdas[pos.y+3][pos.x+3]==1 || celdas[pos.y+3][pos.x+3]==2){claseb(pos.y+3, pos.x+3);}
    			else clase(pos.y+3, pos.x+3);
			}
			if (ExistePos(pos.y+3, pos.x-3)) {
				if(celdas[pos.y+3][pos.x-3]==1 || celdas[pos.y+3][pos.x-3]==2){claseb(pos.y+3, pos.x-3);}
    			else clase(pos.y+3, pos.x-3);
			}
			if (ExistePos(pos.y-3, pos.x+3)) {
				if(celdas[pos.y-3][pos.x+3]==1 || celdas[pos.y-3][pos.x+3]==2){claseb(pos.y-3, pos.x+3);}
    			else clase(pos.y-3, pos.x+3);
			}
			if (ExistePos(pos.y-3, pos.x-3)) {
				if(celdas[pos.y-3][pos.x-3]==1 || celdas[pos.y-3][pos.x-3]==2){claseb(pos.y-3, pos.x-3);}
    			else clase(pos.y-3, pos.x-3);
			}
			if (ExistePos(pos.y+4, pos.x+4)) {
				if(celdas[pos.y+4][pos.x+4]==1 || celdas[pos.y+4][pos.x+4]==2){claseb(pos.y+4, pos.x+4);}
    			else clase(pos.y+4, pos.x+4);
			}
			if (ExistePos(pos.y+4, pos.x-4)) {
				if(celdas[pos.y+4][pos.x-4]==1 || celdas[pos.y+4][pos.x-4]==2){claseb(pos.y+4, pos.x-4);}
    			else clase(pos.y+4, pos.x-4);
			}
			if (ExistePos(pos.y-4, pos.x+4)) {
				if(celdas[pos.y-4][pos.x+4]==1 || celdas[pos.y-4][pos.x+4]==2){claseb(pos.y-4, pos.x+4);}
    			else clase(pos.y-4, pos.x+4);
			}
			if (ExistePos(pos.y-4, pos.x-4)) {
				if(celdas[pos.y-4][pos.x-4]==1 || celdas[pos.y-4][pos.x-4]==2){claseb(pos.y-4, pos.x-4);}
    			else clase(pos.y-4, pos.x-4);
			}
			if (ExistePos(pos.y+5, pos.x+5)) {
				if(celdas[pos.y+5][pos.x+5]==1 || celdas[pos.y+5][pos.x+5]==2){claseb(pos.y+5, pos.x+5);}
    			else clase(pos.y+5, pos.x+5);
			}
			if (ExistePos(pos.y+5, pos.x-5)) {
				if(celdas[pos.y+5][pos.x-5]==1 || celdas[pos.y+5][pos.x-5]==2){claseb(pos.y+5, pos.x-5);}
    			else clase(pos.y+5, pos.x-5);
			}
        	if (ExistePos(pos.y-5, pos.x+5)) {
				if(celdas[pos.y-5][pos.x+5]==1 || celdas[pos.y-5][pos.x+5]==2){claseb(pos.y-5, pos.x+5);}
    			else clase(pos.y-5, pos.x+5);
			}
			if (ExistePos(pos.y-5, pos.x-5)) {
				if(celdas[pos.y-5][pos.x-5]==1 || celdas[pos.y-5][pos.x-5]==2){claseb(pos.y-5, pos.x-5);}
    			else clase(pos.y-5, pos.x-5);
			}
			if (ExistePos(pos.y+6, pos.x+6)) {
				if(celdas[pos.y+6][pos.x+6]==1 || celdas[pos.y+6][pos.x+6]==2){claseb(pos.y+6, pos.x+6);}
    			else clase(pos.y+6, pos.x+6);
			}
			if (ExistePos(pos.y+6, pos.x-6)) {
				if(celdas[pos.y+6][pos.x-6]==1 || celdas[pos.y+6][pos.x-6]==2){claseb(pos.y+6, pos.x-6);}
    			else clase(pos.y+6, pos.x-6);
			}
			if (ExistePos(pos.y-6, pos.x+6)) {
				if(celdas[pos.y-6][pos.x+6]==1 || celdas[pos.y-6][pos.x+6]==2){claseb(pos.y-6, pos.x+6);}
    			else clase(pos.y-6, pos.x+6);
			}
			if (ExistePos(pos.y-6, pos.x-6)) {
				if(celdas[pos.y-6][pos.x-6]==1 || celdas[pos.y-6][pos.x-6]==2){claseb(pos.y-6, pos.x-6);}
    			else clase(pos.y-6, pos.x-6);
			}
			if (ExistePos(pos.y+7, pos.x+7)) {
				if(celdas[pos.y+7][pos.x+7]==1 || celdas[pos.y+7][pos.x+7]==2){claseb(pos.y+7, pos.x+7);}
    			else clase(pos.y+7, pos.x+7);
			}
			if (ExistePos(pos.y+7, pos.x-7)) {
				if(celdas[pos.y+7][pos.x-7]==1 || celdas[pos.y+7][pos.x-7]==2){claseb(pos.y+7, pos.x-7);}
    			else clase(pos.y+7, pos.x-7);
			}
			if (ExistePos(pos.y-7, pos.x+7)) {
				if(celdas[pos.y-7][pos.x+7]==1 || celdas[pos.y-7][pos.x+7]==2){claseb(pos.y-7, pos.x+7);}
    			else clase(pos.y-7, pos.x+7);
			}
			if (ExistePos(pos.y-7, pos.x-7)) {
				if(celdas[pos.y-7][pos.x-7]==1 || celdas[pos.y-7][pos.x-7]==2){claseb(pos.y-7, pos.x-7);}
    			else clase(pos.y-7, pos.x-7);
			}
        }
        if(ficha == "caballonegro1" || ficha == "caballonegro2" || ficha == "caballoblanco1" || ficha == "caballoblanco2"){
        	
			if (ExistePos(pos.y+1, pos.x+2)) {
    			if(celdas[pos.y+1][pos.x+2]==1 || celdas[pos.y+1][pos.x+2]==2){claseb(pos.y+1, pos.x+2);}
    			else clase(pos.y+1, pos.x+2);
    		} 
    		if (ExistePos(pos.y+1, pos.x-2)) {
    			if(celdas[pos.y+1][pos.x-2]==1 || celdas[pos.y+1][pos.x-2]==2){claseb(pos.y+1, pos.x-2);}
    			else clase(pos.y+1, pos.x-2);
    		} 
    		if (ExistePos(pos.y-1, pos.x+2)) {
    			if(celdas[pos.y-1][pos.x+2]==1 || celdas[pos.y-1][pos.x+2]==2){claseb(pos.y-1, pos.x+2);}
    			else clase(pos.y-1, pos.x+2);
    		} 
    		if (ExistePos(pos.y-1, pos.x-2)) {
    			if(celdas[pos.y-1][pos.x-2]==1 || celdas[pos.y-1][pos.x-2]==2){claseb(pos.y-1, pos.x-2);}
    			else clase(pos.y-1, pos.x-2);
    		} 
    		if (ExistePos(pos.y+2, pos.x-1)) {
    			if(celdas[pos.y+2][pos.x-1]==1 || celdas[pos.y+2][pos.x-1]==2){claseb(pos.y+2, pos.x-1);}
    			else clase(pos.y+2, pos.x-1);
    		} 
    		if (ExistePos(pos.y+2, pos.x+1)) {
    			if(celdas[pos.y+2][pos.x+1]==1 || celdas[pos.y+2][pos.x+1]==2){claseb(pos.y+2, pos.x+1);}
    			else clase(pos.y+2, pos.x+1);
    		}
    		if (ExistePos(pos.y-2, pos.x-1)) {
    			if(celdas[pos.y-2][pos.x-1]==1 || celdas[pos.y-2][pos.x-1]==2){claseb(pos.y-2, pos.x-1);}
    			else clase(pos.y-2, pos.x-1);
    		} 
    		if (ExistePos(pos.y-2, pos.x+1)) {
    			if(celdas[pos.y-2][pos.x+1]==1 || celdas[pos.y-2][pos.x+1]==2){claseb(pos.y-2, pos.x+1);}
    			else clase(pos.y-2, pos.x+1);
    		}
        }
        if(ficha === "torrenegra1" || ficha === "torrenegra2" || ficha === "torreblanca1" || ficha === "torreblanca2" || 
           ficha === "reinanegra" || ficha === "reinablanca")
        {
        	for (var x = 1; x <= celdas.length; x++) {
				for (var y = 1; y <= celdas.length; y++){
					/*...:::Para los ejes Y:::*/
					if (ExistePos(pos.y+y, pos.x)) {
	        			if(celdas[pos.y+y][pos.x]==1 || celdas[pos.y+y][pos.x]==2)claseb(pos.y+y, pos.x);
	        		}
	        		if ((pos.y+y>=0 && pos.y+y<8) ){
	        			if(celdas[pos.y+y][pos.x]==0)clase(pos.y+y, pos.x);
	        		}
	        		if (ExistePos(pos.y-y, pos.x)) {
	        			if(celdas[pos.y-y][pos.x]==1 || celdas[pos.y-y][pos.x]==2)claseb(pos.y-y, pos.x);
	        		}
	        		if ((pos.y-y>=0 && pos.y-y<8) ){
	        			if(celdas[pos.y-y][pos.x]==0)clase(pos.y-y, pos.x);
	        		}
	        		/*...:::Para los Ejes X:::...*/
	        		if (ExistePos(pos.y, pos.x+x)) {
	        			if(celdas[pos.y][pos.x+x]==1 || celdas[pos.y][pos.x+x]==2)claseb(pos.y, pos.x+x);
	        		}
	        		if ((pos.x+x>=0 && pos.x+x<8) ){
	        			if(celdas[pos.y][pos.x+x]==0)clase(pos.y, pos.x+x);
	        		}
	        		if (ExistePos(pos.y, pos.x-x)) {
	        			if(celdas[pos.y][pos.x-x]==1 || celdas[pos.y][pos.x-x]==2)claseb(pos.y, pos.x-x);
	        		}
	        		if ((pos.x-x>=0 && pos.x-x<8) ){
	        			if(celdas[pos.y][pos.x-x]==0)clase(pos.y, pos.x-x);
	        		}
	        	}
	        }
        }
    }
}

function clase(posy, posx, clase='pasos') /*Verificará si es posible pintar con Azúl*/
{
	if((posx < 8 && posy < 8 ) && (posy >=0 && posx >= 0))
	{
		tablero[posy][posx].classList.add(clase);
	}
}
function claseb(posy, posx, clase='pasosEnFalso') /*Verificará si es posible pintar con Rojo*/
{
	if((posx < 8 && posy < 8 ) && (posy >=0 && posx >= 0))
	{
		tablero[posy][posx].classList.add(clase);
	}
}
function buscar_pos(origen) //Buscará el Origen del elemento seleccionado.
{
    if(origen)
    {
        let y = letras.indexOf(origen[0]);
        let x = Number(origen[1]) -1 ;
        return { x, y }
    }

    return undefined;
}

/* Contenedor de datos que estan siendo manipulados durante la operación de soltar */
function soltar(evento)
{
	/*Aca bloqueo el evento agarra para que despues se active el evento soltar */
	/*SetData es como para soltar*/
	for(let y = 0 ; y < 8 ; y++)
	{
	    for(let x = 0 ; x < 8 ; x++)
	    {
	        tablero[x][y].classList.remove('pasos');
	        tablero[x][y].classList.remove('pasosEnFalso');
	    }
	}

	evento.preventDefault();
	var data = evento.dataTransfer.getData("text");
	destino = evento.target.id;
	validar(data,evento);
}
/*En mostrarMensaje(data, evento); 
Coloco la imagen arrastrada en el nuevo Div y le añado el registo de movimientos al Historial*/
function mostrarMensaje(data, evento){ 
	evento.target.appendChild(document.getElementById(data));
	contador = contador +1;
	//div.innerHTML += 'Cantidad de Movimientos = '+contador+' | Origen '+origen+ ' | Destino = '+destino+'<br>';
}

function reiniciar(){
	for (var x = 0; x < tablero.length; x++) {
		for (var y = 0; y < tablero.length; y++){
			if(tablero[x][y].attributes.id.value==origen){
				if(celdas[x][y]==1 || celdas[x][y]==2){
					celdas[x][y]=0;
				}
			} 
		}
	}
}
function ExistePos(x,y)
{
	return y>= 0 && y<8 && x>=0 && x <8; /*...::Retornará un Booleano::...*/
}
/*...::Verá la posición en X,Y y dejará pintar la imagen donde se suelte::...*/
function establecerPosWhite(x, y, destino, data = '', evento = '')
{
	if (ExistePos(x,y))
	{
		if(tablero[x][y].attributes.id.value == destino)
		{
			celdas[x][y] = 2; /*...:::Otorga el valor de 2 a la ficha Blanca:::...*/
			mostrarMensaje(data, evento);
		}
	}
	
}
/*...:::Situará la posición de las fichas Negras, otorgandoles el valor de 1:::...*/
function establecerPosBlack(x, y, destino, data = '', evento = '')
{
	if (ExistePos(x,y))
	{
		if(tablero[x][y].attributes.id.value == destino)
		{
			celdas[x][y] = 1;
			mostrarMensaje(data, evento);
		}
	}
	
}

function validar(data, evento){
	/* Esto me ayuda a validar si hay una ficha o no donde se va a mover la ficha */
	
	for (var x = 0; x < tablero.length; x++) {
		for (var y = 0; y < tablero.length; y++){
			if(tablero[x][y].attributes.id.value == origen){
				/*------------------------------------------- Validacion para los peones negros-------------------------- */
				if(ficha == "peonnegro1" && origen == "b1" || ficha == "peonnegro2" && origen == "b2" || 
					ficha == "peonnegro3" && origen == "b3" || ficha == "peonnegro4" && origen == "b4" || 
					ficha == "peonnegro5" && origen == "b5" || ficha == "peonnegro6" && origen == "b6" ||
					ficha == "peonnegro7" && origen == "b7" || ficha == "peonnegro8" && origen == "b8"){
					for(let i = 1 ; i < 3 ; i++){
						establecerPosBlack(x+i,y, destino, data, evento);
					}	
				} else if(ficha == "peonnegro1" && origen !== "b1" || ficha == "peonnegro2" && origen != "b2" || 
						ficha == "peonnegro3" && origen != "b3" || ficha == "peonnegro4" && origen != "b4" || 
						ficha == "peonnegro5" && origen != "b5" || ficha == "peonnegro6" && origen != "b6" ||
						ficha == "peonnegro7" && origen != "b7" || ficha == "peonnegro8" && origen != "b8"){
						for(let i = 1 ; i < 2 ; i++){
							establecerPosBlack(x+i,y, destino, data, evento);
						}
				}
				/*------------------------------------------- Validacion para los peones blancos-------------------------- */
				if(ficha == "peonblanco1" && origen == "g1" || ficha == "peonblanco2" && origen == "g2" || 
					ficha == "peonblanco3" && origen == "g3" || ficha == "peonblanco4" && origen == "g4" || 
					ficha == "peonblanco5" && origen == "g5" || ficha == "peonblanco6" && origen == "g6" ||
					ficha == "peonblanco7" && origen == "g7" || ficha == "peonblanco8" && origen == "g8"){
					for(let i = 1 ; i < 3 ; i++){
						establecerPosWhite(x-i,y, destino, data, evento);
					}		
				} else if(ficha == "peonblanco1" && origen !== "g1" || ficha == "peonblanco2" && origen != "g2" || 
						ficha == "peonblanco3" && origen != "g3" || ficha == "peonblanco4" && origen != "g4" || 
						ficha == "peonblanco5" && origen != "g5" || ficha == "peonblanco6" && origen != "g6" ||
						ficha == "peonblanco7" && origen != "g7" || ficha == "peonblanco8" && origen != "g8"){
						for(let i = 1 ; i < 2 ; i++){
						establecerPosWhite(x-i,y, destino, data, evento);
					}
				}

				if (ficha == "torrenegra1" || ficha == "torrenegra2" || ficha === "reinanegra") {
					for(let i = 1 ; i < 8 ; i++){
							establecerPosBlack(x,y+i, destino, data, evento);
							establecerPosBlack(x,y-i, destino, data, evento);
							establecerPosBlack(x-i,y,destino, data, evento);
							establecerPosBlack(x+i,y,destino, data, evento);
					}
				}
				if(ficha === "torreblanca1" || ficha === "torreblanca2" || ficha === "reinablanca") {
					for(let i = 1 ; i < 8 ; i++){
							establecerPosWhite(x,y+i, destino, data, evento);
							establecerPosWhite(x,y-i, destino, data, evento);
							establecerPosWhite(x-i,y,destino, data, evento);
							establecerPosWhite(x+i,y,destino, data, evento);
					}
				}
				if(ficha === "caballonegro1" || ficha === "caballonegro2"){
					establecerPosBlack(x+2,y+1, destino, data, evento);
					establecerPosBlack(x+2,y-1, destino, data, evento);
					establecerPosBlack(x+1,y+2, destino, data, evento);
					establecerPosBlack(x+1,y-2, destino, data, evento);
					establecerPosBlack(x-2,y+1, destino, data, evento);
					establecerPosBlack(x-2,y-1, destino, data, evento);
					establecerPosBlack(x-1,y+2, destino, data, evento);
					establecerPosBlack(x-1,y-2, destino, data, evento);
				}
				if(ficha === "caballoblanco1" || ficha === "caballoblanco2"){
					establecerPosWhite(x+2,y+1, destino, data, evento);
					establecerPosWhite(x+2,y-1, destino, data, evento);
					establecerPosWhite(x+1,y+2, destino, data, evento);
					establecerPosWhite(x+1,y-2, destino, data, evento);
					establecerPosWhite(x-2,y+1, destino, data, evento);
					establecerPosWhite(x-2,y-1, destino, data, evento);
					establecerPosWhite(x-1,y+2, destino, data, evento);
					establecerPosWhite(x-1,y-2, destino, data, evento);
				}
				if(ficha === "reynegro"){
					establecerPosBlack(x+1,y, destino, data, evento);
					establecerPosBlack(x-1,y, destino, data, evento);
					establecerPosBlack(x+1,y+1, destino, data, evento);
					establecerPosBlack(x-1,y-1, destino, data, evento);
					establecerPosBlack(x,y+1, destino, data, evento);
					establecerPosBlack(x,y-1, destino, data, evento);
					establecerPosBlack(x+1,y-1, destino, data, evento);
					establecerPosBlack(x-1,y+1, destino, data, evento);
				}
				if(ficha === "reyblanco"){
					establecerPosWhite(x+1,y, destino, data, evento);
					establecerPosWhite(x-1,y, destino, data, evento);
					establecerPosWhite(x+1,y+1, destino, data, evento);
					establecerPosWhite(x-1,y-1, destino, data, evento);
					establecerPosWhite(x,y+1, destino, data, evento);
					establecerPosWhite(x,y-1, destino, data, evento);
					establecerPosWhite(x+1,y-1, destino, data, evento);
					establecerPosWhite(x-1,y+1, destino, data, evento);
				}
				if (ficha === "alfilnegro1" || ficha === "alfilnegro2" || ficha === "reinanegra") {
					establecerPosBlack(x+1,y+1, destino, data, evento);establecerPosBlack(x-1,y+1, destino, data, evento);
					establecerPosBlack(x+2,y+2, destino, data, evento);establecerPosBlack(x-2,y+2, destino, data, evento);
					establecerPosBlack(x+3,y+3, destino, data, evento);establecerPosBlack(x-3,y+3, destino, data, evento);
					establecerPosBlack(x+4,y+4, destino, data, evento);establecerPosBlack(x-4,y+4, destino, data, evento);
					establecerPosBlack(x+5,y+5, destino, data, evento);establecerPosBlack(x-5,y+5, destino, data, evento);
					establecerPosBlack(x+6,y+6, destino, data, evento);establecerPosBlack(x-6,y+6, destino, data, evento);
					establecerPosBlack(x+7,y+7, destino, data, evento);establecerPosBlack(x-7,y+7, destino, data, evento);

					establecerPosBlack(x+1,y-1, destino, data, evento);establecerPosBlack(x-1,y-1, destino, data, evento);
					establecerPosBlack(x+2,y-2, destino, data, evento);establecerPosBlack(x-2,y-2, destino, data, evento);
					establecerPosBlack(x+3,y-3, destino, data, evento);establecerPosBlack(x-3,y-3, destino, data, evento);
					establecerPosBlack(x+4,y-4, destino, data, evento);establecerPosBlack(x-4,y-4, destino, data, evento);
					establecerPosBlack(x+5,y-5, destino, data, evento);establecerPosBlack(x-5,y-5, destino, data, evento);
					establecerPosBlack(x+6,y-6, destino, data, evento);establecerPosBlack(x-6,y-6, destino, data, evento);
					establecerPosBlack(x+7,y-7, destino, data, evento);establecerPosBlack(x-7,y-7, destino, data, evento);
				}
				if (ficha === "alfilblanco1" || ficha === "alfilblanco2" || ficha === "reinablanca") {
					establecerPosWhite(x+1,y+1, destino, data, evento);establecerPosWhite(x-1,y+1, destino, data, evento);
					establecerPosWhite(x+2,y+2, destino, data, evento);establecerPosWhite(x-2,y+2, destino, data, evento);
					establecerPosWhite(x+3,y+3, destino, data, evento);establecerPosWhite(x-3,y+3, destino, data, evento);
					establecerPosWhite(x+4,y+4, destino, data, evento);establecerPosWhite(x-4,y+4, destino, data, evento);
					establecerPosWhite(x+5,y+5, destino, data, evento);establecerPosWhite(x-5,y+5, destino, data, evento);
					establecerPosWhite(x+6,y+6, destino, data, evento);establecerPosWhite(x-6,y+6, destino, data, evento);
					establecerPosWhite(x+7,y+7, destino, data, evento);establecerPosWhite(x-7,y+7, destino, data, evento);

					establecerPosWhite(x+1,y-1, destino, data, evento);establecerPosWhite(x-1,y-1, destino, data, evento);
					establecerPosWhite(x+2,y-2, destino, data, evento);establecerPosWhite(x-2,y-2, destino, data, evento);
					establecerPosWhite(x+3,y-3, destino, data, evento);establecerPosWhite(x-3,y-3, destino, data, evento);
					establecerPosWhite(x+4,y-4, destino, data, evento);establecerPosWhite(x-4,y-4, destino, data, evento);
					establecerPosWhite(x+5,y-5, destino, data, evento);establecerPosWhite(x-5,y-5, destino, data, evento);
					establecerPosWhite(x+6,y-6, destino, data, evento);establecerPosWhite(x-6,y-6, destino, data, evento);
					establecerPosWhite(x+7,y-7, destino, data, evento);establecerPosWhite(x-7,y-7, destino, data, evento);
				}
			}
		}
	}
	reiniciar();
}

