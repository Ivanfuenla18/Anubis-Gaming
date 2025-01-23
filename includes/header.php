<head>

  <style>
    .btn-2 {
      background: rgb(96, 9, 240);
      background: linear-gradient(0deg, rgba(96, 9, 240, 1) 0%, rgba(129, 5, 240, 1) 100%);
      border: none;

    }

    .btn-2:before {
      height: 0%;
      width: 2px;
    }

    .btn-2:hover {
      box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .5),
        -4px -4px 6px 0 rgba(116, 125, 136, .5),
        inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
        inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
    }
  </style>

  <!-- Unicons CSS -->

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <a href="../index.php" class="logo">
      <div class="logo-anubis">Anubis</div>
      <div class="logo-gaming">gaming</div>
    </a>
    <ul class="nav-links">
      <i class="uil uil-times navCloseBtn"></i>
      <li><a href="../index.php">Inicio</a></li>
      <!--<li><a href="services">Servicios</a></li>-->
      <li><a href="../catalogo.php">Juegos</a></li>
      <li><a href="../conocenos.php">Sobre nosotros</a></li>
      <li><a href="../contacto.php">Contacto</a></li>
    </ul>

    <div class="icon-container">
      <i class="uil uil-search search-icon" id="searchIcon"></i>

      <div id="icono-carrito" onclick="comprarRed()">
        <i class="uil uil-shopping-cart carrito" id="carrito"></i>
      </div>

      <!-- modal que se añadi carrito -->
      <div id="modal-carrito" style="display: none;">
        <h2>Carrito</h2>
        <table id="lista-carrito" class="u-full-width">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <button onclick="comprarRed()" class="custom-btn btn-2">Ir a comprar </button>
        <br>
        <button id="vaciar-carrito" class="custom-btn btn-2">Vaciar Carrito</button>
      </div>

      <script>
        function comprarRed() {

          window.location.href = "/user/carrito.php";

        }
      </script>

      <?php

      require_once 'islogin.php';


      function concectar()
      {
        $con = new mysqli("localhost", "anubis", "123456", "anubisgaming");
        if (mysqli_connect_errno()) {
          echo "No se puede establecer conexión";
        }
        return $con;
      }
      ;
      if ($estado == 'false') {
        ?>
        <i class="uil uil-user usuario hero__cta btn" id="usuario"></i>

        <?php
      } elseif ($estado == 'true') {
        $conn = concectar();
        $sql = "SELECT coins,url FROM usuario  where user = '" . $_SESSION['usuario'] . " '";
        $resultado = $conn->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
          $url = $fila["url"];
          $coins = $fila["coins"];
        }
        echo '<div class="coins">' . $coins . '💎</div>';
        echo "<a href='../user/ruleta.php'><div class='icono2'> ";
        echo "</div> </a>";
        echo "<a href='../user/perfil.php'><div class='icono'> ";
        echo "</div> </a>";
        echo "<div class='filtro' id='usuario'>" . $_SESSION['usuario'] . "</div>";
        ?>
        <style>
          /** */

          .coins {

            color: lightblue;
            margin-left: 10px;

          }

          .icono {

            height: 40px;
            width: 40px;
            border-radius: 50%;
            background-image: url(../<?php echo $url ?>);
            background-position: center center;
            background-size: cover;
            margin-left: 15px;
          }

          .icono2 {

            border-radius: 50%;
            background-image: url(../img/ruleta_icono.png);
            background-position: center center;
            background-size: cover;
            margin-left: 15px;
            height: 40px;
            width: 40px;
            animation: spin 10s infinite linear;
          }



          @keyframes spin {
            from {
              transform: rotate(0deg);
            }

            to {
              transform: rotate(360deg);
            }
          }
        </style>



        <?php

      }
      ?>

      <section class="modal ">
        <div class="modal__container">
          <i class="uil uil-times modal__close"></i>

          <div class="formulario_modal">

            <div class="login-box">
              <h2>Login</h2>
              <form action="../user/login.php" method="get">
                <div class="user-box">
                  <input type="text" name="user" required="">
                  <label>Usuario</label>
                </div>
                <div class="user-box">
                  <input type="password" name="password" required="">
                  <label>Contraseña</label>
                </div>

                <button class="modal_regis" type="submit">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  Iniciar
                </button>


                <a href="../user/registro.php" class="modal_regis">
                  Registrarse</a>

              </form>
            </div>
          </div>
          <div class="imagen_modal ">
          </div>
        </div>
      </section>
    </div>
    <div class="search-box">
      <i class="uil uil-search search-icon"></i>
      <input type="text" placeholder="Search here..." id="buscador2" />
    </div>





  </nav>
  <script src="../js/buscador.js"></script>
  <!-- para el modal >>>-->

  <script src="../js/Añadirjuego_modal.js"></script>
  <script>
    document.querySelector("#icono-carrito").addEventListener("mouseenter", function () {
      document.querySelector("#modal-carrito").style.display = "block";
    });

    document.querySelector("#modal-carrito").addEventListener("mouseleave", function () {
      document.querySelector("#modal-carrito").style.display = "none";
    });

    document.addEventListener("DOMContentLoaded", function () {
      let cart = [];
      if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
      }
      imprimir(cart);

    });
  </script>

</body>

</html>