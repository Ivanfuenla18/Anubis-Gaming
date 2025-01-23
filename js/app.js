const express = require('express');
const mysql = require('mysql');
const cors = require('cors');
const bodyParser = require('body-parser');
const app = express();

// Configura el middleware CORS
app.use(cors());

app.use(bodyParser.json());

// Configurar una ruta POST en el servidor
app.post('/datos', (req, res) => {
  var conn = mysql.createConnection(
    {
      host: 'localhost',
      database: 'anubisgaming',
      user: 'anubis',
      password: '123456',

    }
  );
  const datosRecibidos = req.body;

  let username = datosRecibidos['nombre'];
  let coins = datosRecibidos['puntos'];

  conn.connect(function (error) {

    if (error) {

      throw error;

    } else {


    }

  });


  conn.query("SELECT coins FROM `usuario` WHERE user='" + username + "';", function (err, results) {
    if (err) {
      throw err;
    } else {

      results.forEach(element => {

        coins = coins + element['coins']
        console.log(coins);

      });

    }

  });
  
  
  setTimeout(() => {
    conn.query("UPDATE `usuario` SET `coins` = " + coins + " WHERE `usuario`.`user` = '" + username + " ' ; ", function (err, result) {

      if (err) {
        throw err;
      } else {
        console.log('result: ' + result);
      }


    });

    conn.end();

  }, 1000);

  const respuesta = { mensaje: 'Recibido crack' };
  res.json(respuesta);
});

// Configurar el servidor para escuchar en un puerto específico
app.listen(4000, () => {
  console.log('Servidor Node.js en funcionamiento en el puerto 4000');
});
