const ruleta = document.querySelector('#ruleta');
const usuario = document.getElementById('usuario').textContent;

let bandera = true;
ruleta.addEventListener('click', girar);

if (localStorage.getItem('giros') == null) {
  localStorage.setItem('giros', true);
}

function checkResetVariable() {
  const currentDate = new Date();
  const storedDate = localStorage.getItem('resetDate');

  if (storedDate && currentDate - new Date(storedDate) >= 24 * 60 * 60 * 1000) {
    reiniciarJuego();
  }
}

setInterval(checkResetVariable, 100);

function reiniciarJuego() {
  localStorage.setItem('giros', true);
  const currentDate = new Date();
  const resetDate = new Date(currentDate.getTime() + 24 * 60 * 60 * 1000); // Reiniciar en 24 horas
  localStorage.setItem('lastSpinTime', currentDate);
  localStorage.setItem('resetDate', resetDate);
}

function obtenerTiempoRestante() {
  const currentDate = new Date();
  const storedDate = localStorage.getItem('resetDate');

  if (storedDate && currentDate >= new Date(storedDate)) {
    reiniciarJuego();
    return 0;
  }

  const resetDate = new Date(storedDate);
  const tiempoRestante = Math.floor((resetDate - currentDate) / (60 * 60 * 1000));

  return tiempoRestante;
}

function girar() {
  if (bandera) {
    bandera = false;

    const giros = localStorage.getItem('giros');
    console.log(giros);

    if (giros === 'true') {
      let rand = Math.random() * 7200;
      calcular(rand);
      localStorage.setItem('giros', false);
      const sonido = document.querySelector('#audio');
      sonido.setAttribute('src', '../img/sonido_ruleta.mp3');
      document.querySelector('.contador').innerHTML = 'TURNO: ' + giros;
      const currentDate = new Date();
      localStorage.setItem('lastSpinTime', currentDate);
    } else {
      const tiempoRestante = obtenerTiempoRestante();

      if (tiempoRestante > 0) {
        const horasFaltantes = tiempoRestante;
        Swal.fire({
          icon: 'success',
          title: 'VUELVA PRONTO EL JUEGO TERMINÓ!!',
          confirmButtonColor: '#3085d6',
          html: 'El juego se reiniciará en ' + horasFaltantes + ' horas',
          confirmButtonText: 'Aceptar',
          allowOutsideClick: false
        }).then((result) => {
          if (result.value === true) {
            document.querySelector('.elije').innerHTML = 'TU PREMIO ES: ';
            document.querySelector('.contador').innerHTML = 'TURNO: ' + giros;
          }
        });
      } else {
        reiniciarJuego();
       
      }
    }
  }
}

function calcular(rand) {
  valor = rand / 360;
  valor = (valor - parseInt(valor.toString().split('.')[0])) * 360;
  ruleta.style.transform = 'rotate(' + rand + 'deg)';

  setTimeout(() => {
    switch (true) {
      case valor > 0 && valor <= 45:
        premio('Has ganado 5💎');
        const datos4 = {
          nombre: usuario,
          puntos: 5
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos4)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 45 && valor <= 90:
        premio('Has ganado 10💎');
        const datos3 = {
          nombre: usuario,
          puntos: 10
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos3)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 90 && valor <= 135:
        premio('HAS GANADO 50 💎');
        const datos = {
          nombre: usuario,
          puntos: 50
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 135 && valor <= 180:
        premio('No has ganado nada');
        bandera = true;
        break;
      case valor > 180 && valor <= 225:
        premio('Has ganado 2 💎');
        const datos5 = {
          nombre: usuario,
          puntos: 2
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos5)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 225 && valor <= 270:
        premio('Has ganado 6 💎');
        const datos6 = {
          nombre: usuario,
          puntos: 6
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos6)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 270 && valor <= 315:
        premio('Has ganado 2 💎');
        const datos2 = {
          nombre: usuario,
          puntos: 2
        };
        fetch('http://localhost:4000/datos', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(datos2)
        })
          .then(response => response.json())
          .then(data => {
            console.log(data); // Hacer algo con la respuesta del servidor
          })
          .catch(error => {
            console.error('Error:', error);
          });
        bandera = true;
        break;
      case valor > 315 && valor <= 360:
        premio('No has ganado nada');
        bandera = true;
        break;
      default:
        break;
    }
  }, 5000);
}

function premio(texto) {
  Swal.fire({
    icon: 'success',
    title: '¡Felicidades!',
    confirmButtonColor: '#3085d6',
    html: texto,
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value === true) {
      document.querySelector('.elije').innerHTML = 'TU PREMIO ES: ' + texto;
    }
  });
}
