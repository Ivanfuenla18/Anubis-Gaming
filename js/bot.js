/*__________ para la animacion y el desplegue del cuadro de chat de Thot_______________*/
var pos = true;
function mostrarContenido() {
  var paco = 1000;
  var contenido = document.querySelector(".contenido");
  var boton = document.querySelector(".boton-bot");
  boton.classList.remove("mover_rectangulo_circulo");
  if (pos == true) {
    boton.classList.add("mover_circulo_rectangulo");
  } else {
    paco = 0;
  }
  setTimeout(function () {
    contenido.classList.toggle("mostrar");
    if (contenido.classList.contains("mostrar")) {
      boton.classList.remove("circular");
      boton.classList.remove("mover_circulo_rectangulo");
      boton.classList.add("rectangular");
      boton.classList.add("mover_btn_arriba");
      boton.style.bottom = "500px";
      pos = false;

    } else {
      boton.classList.add("mover_btn_abajo");
      boton.classList.remove("mover_btn_arriba");
      boton.classList.remove("mover_circulo_rectangulo");
      boton.classList.remove("mover_circulo_arriba");
      boton.style.bottom = "";
      pos = true;
      setTimeout(function () {
        boton.classList.remove("mover_btn_abajo");
        boton.classList.add("mover_rectangulo_circulo");
        boton.classList.remove("rectangular");
        boton.classList.add("circular");
      }, 1000);
    }
  }, paco);
}
/*----------------------------- Primer mensaje del bot -----------------------------------*/
// funcion Obtiene el primer mensaje de thot 
firstBotMessage();

function firstBotMessage() {
  // marca tiemnpo para el mensaje incial Thot
  let time = getTime();
  console.log(time);
  const marcaTiempo = document.getElementById("marca-tiempo");
  console.log(marcaTiempo);
  const tiempo = document.createTextNode(time);
  marcaTiempo.appendChild(tiempo);

  // marca primer mensaje de thot 
  let firstMessage = "¿Cómo va todo?"
  document.getElementById("mensaje-inicial-del-bot").innerHTML = '<p class="botText"><span>' + firstMessage + '</span></p>';

}

/*----------------------------------------------------------------*/
/*a la escucha de  activar el submit del  formulario  */

document.getElementById('formulario').addEventListener('submit', function (event) {
  event.preventDefault(); // Evita que el formulario se envíe por defecto

  // Obtiene el valor del campo de entrada de textrea
  const descripcion = document.getElementById('descripcion').value;

  // Llama a la función "respuesta" con el valor obtenido
  // respuesta(texto);

  mario(); // Llama a la función mario que enviará los datos con AJAX
});

/*---------------------------- super mario ------------------------------*/
/*super mario es super importante ya que se trata de una funcion ajax que lo que hace es mandar la infromacion del formulario
y estar a la eschua de la devolucion de esa informacion basicamente para logar la conexion a la bbdd */
/*________________________________________________________________________*/

function mario() {
  // esto por internet
  const xhr = new XMLHttpRequest();
  const url = '../includes/bot.php';
  const descripcion = document.getElementById('descripcion').value;
  const params = `descripcion=${descripcion}`;

  xhr.open('POST', url);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {

      // esto es mio 
      const respuestaServidor = JSON.parse(xhr.responseText);
      console.log(respuestaServidor);
      if (respuestaServidor.respuesta) {
        console.log(respuestaServidor.respuesta);
        console.log(respuestaServidor.descripcion);
        respuesta_bbdd_Tchat(respuestaServidor.descripcion, respuestaServidor.respuesta);

      } else if (respuestaServidor.TodoOk) {
        console.log(respuestaServidor.juegos);

        respuesta_bbdd_Tpalbrasclaves(respuestaServidor.descripcion, respuestaServidor.juegos);




      } else {
        console.log(respuestaServidor.error);
        console.log(respuestaServidor.descripcion);
        console.log(respuestaServidor.respuesta);
        
        let tiempo = getTime();
        let usuariohtml = '<p class="texto-de-usuario"><span>' + respuestaServidor.descripcion + '</span></p>';
        // selecciona el elemento con el ID "cuadro_chat"
        const cuadro_chat = document.getElementById("cuadro-de-chat");
        // crea un elemento HTML con el contenido de la variable "usuarioHtml"
        const div = document.createElement("div");
        div.innerHTML = usuariohtml;
      
        // agrega el nuevo elemento al final del elemento seleccionado
        cuadro_chat.appendChild(div);
      
        const limbiarEntrada = document.getElementById("descripcion");
        limbiarEntrada.value = "";
        document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);

        // Espera 3 segundos (3000 milisegundos) antes de mostrar la respuesta del bot
        setTimeout(function () {

          // Construye la respuesta del bot
          let ThotHtml = '<h5 id="marca-tiempo" style="text-align: center; padding: 8px;" >' + tiempo + '</h5><p class="texto-del-bot"><span>' + respuestaServidor.error + '</span></p>';
          divThot = document.createElement("div");
          divThot.innerHTML = ThotHtml;

          // Agrega la respuesta del bot al chat
          cuadro_chat.appendChild(divThot);

          // Limpia el campo de entrada
          const limbiarEntrada = document.getElementById("descripcion");
          limbiarEntrada.value = "";

          // Hace que el chat se desplace hacia abajo para mostrar la nueva respuesta
          document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);
        }, 3000);


      }
    }
  };
  // encio de formulario 
  xhr.send(params);
}



/*--------------------- Tiempo ------------------------*/

function getTime() {
  let today = new Date();
  hours = today.getHours();
  minutes = today.getMinutes();
  if (hours < 10) {
    hours = "0" + hours;
  }

  if (minutes < 10) {
    minutes = "0" + minutes;
  }

  let time = hours + ":" + minutes;
  return time;
}




// Función para cambiar el estilo de la página a "noche"
function noche() {
  document.body.classList.add("noche");
}

// Función para cambiar el estilo de la página a su estado predeterminado
function dia() {
  document.body.classList.remove("noche");
}



// Función para obtener la respuesta del bot
function respuestaTHOt(entrada) {
  let respuesta = "";
  if (entrada == "hola") {
    return "hola!";
  } else if (entrada == "Adios") {
    return "hablamos luego!";
  }
  // Verificación condicional para cambiar el estilo de la página
  else if (entrada === "pagina noche") {
    noche();
    respuesta = "La página ha cambiado a modo noche.";
  } else if (entrada === "pagina dia") {
    dia();
    respuesta = "La página ha vuelto a su estado predeterminado.";
  } else {
    respuesta = "Dime algo!";
  }

  return respuesta;
}






function respuesta_bbdd_Tchat(preguntaUsuario, respondeThot) {
  let tiempo = getTime();
  let usuariohtml = '<p class="texto-de-usuario"><span>' + preguntaUsuario + '</span></p>';
  // selecciona el elemento con el ID "cuadro_chat"
  const cuadro_chat = document.getElementById("cuadro-de-chat");
  // crea un elemento HTML con el contenido de la variable "usuarioHtml"
  const div = document.createElement("div");
  div.innerHTML = usuariohtml;

  // agrega el nuevo elemento al final del elemento seleccionado
  cuadro_chat.appendChild(div);

  const limbiarEntrada = document.getElementById("descripcion");
  limbiarEntrada.value = "";
  document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);

  setTimeout(() => {

    let ThotHtml = '<h5 id="marca-tiempo" style="text-align: center; padding: 8px;" >' + tiempo + '</h5><p class="texto-del-bot"><span>' + respondeThot + '</span></p>';

    // crea un elemento HTML con el contenido de la variable "ThotHtml"
    divThot = document.createElement("div");
    divThot.innerHTML = ThotHtml;

    // agrega el nuevo elemento al final del elemento seleccionado
    cuadro_chat.appendChild(divThot);

    const limbiarEntrada = document.getElementById("descripcion");
    limbiarEntrada.value = "";
    document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);

   
  }, 1500)
}


function respuesta_bbdd_Tpalbrasclaves(preguntaUsuario, respondeThot) {
  console.log("estiod dentro de la funcion");
  let tiempo = getTime();
  let usuariohtml = '<p class="texto-de-usuario"><span>' + preguntaUsuario + '</span></p>';
  // selecciona el elemento con el ID "cuadro_chat"
  const cuadro_chat = document.getElementById("cuadro-de-chat");
  // crea un elemento HTML con el contenido de la variable "usuarioHtml"
  const div = document.createElement("div");
  div.innerHTML = usuariohtml;

  // agrega el nuevo elemento al final del elemento seleccionado
  cuadro_chat.appendChild(div);

  const limbiarEntrada = document.getElementById("descripcion");
  limbiarEntrada.value = "";
  document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);


  console.log(respondeThot);

  setTimeout(function () {
    let tiempohtml = '<div><h5 id="marca-tiempo" style="text-align: center; padding: 8px;" >' + tiempo + '</h5></div>';
    divThot = document.createElement("div");
    divThot.innerHTML = tiempohtml;
    // Agrega la respuesta del bot al chat
    cuadro_chat.appendChild(divThot);


    let html = ' ';
    respondeThot.forEach(juego => {
      html += `<div class="cart_msg">
                              <div class="cart-body-msg">
                                  <img class="cart-img-msg" src="${juego.url}" alt="Imagen del juego" style="background-repeat: no-repeat;
                                  background-size: cover; width: 100px;
                                  height: auto;">
                                  <h5 class="cart-title-msg">${juego.titulo}</h5>
                              </div>
                          </div>`;
    });
    console.log(html);

    divThot = document.createElement("div");
    divThot.classList.add("caja-cartas-msg"); // Agregar la clase "caja-cartas-msg"
    divThot.innerHTML = html;


    // Agrega la respuesta del bot al chat
    cuadro_chat.appendChild(divThot);

    const limbiarEntrada = document.getElementById("descripcion");
    limbiarEntrada.value = "";
    document.getElementById("parte-inferior-de-la-barra-de-chat").scrollIntoView(true);

  }, 2500);
}
