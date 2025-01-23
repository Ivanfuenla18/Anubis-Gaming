<?php

session_start();

?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Carrito</title>

    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style_carrito.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="icon" type="image/png" href="../img/image.png">


</head>
<script src="js/eventoheader.js" defer></script>


<style>
    nav {

        background-color: #000 !important;
    }
</style>

<body>
    <?php
    include '../includes/chat.html';
    include '../includes/header.php';
    include '../includes/islogin.php';

    ?>


    <div class="top"></div>

    <div class="todo_carrito" id="todo_carrito">
        <div class="pasos">

            <div class="circulo">1</div>
            <h3>Cesta</h3>
            <hr> <span class="flecha">></span>
            <div class="circulo">2</div>
            <h3>Pago</h3>


        </div>

        <div class="contenido_carrito" id="contenido_carrito">

            <div class="cesta">
                <h1>Cestas</h1>
                <div class="contenido_cesta">

                    <table id="lista-carrito2">
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


                </div>

            </div>

            <div class="resumen">

                <h1>Resumen</h1>
                <div class="contenido_resumen">
                    <div class="titulos_resumen">
                        <h2 id=>Precio : <span id="precio_juegos"></span>€<h2>


                                <?php

                                if ($estado == 'true') {


                                    $sql = "SELECT coins FROM usuario  where user = '" . $_SESSION['usuario'] . " '";

                                    $resultado = $conn->query($sql);
                                    while ($fila = $resultado->fetch_assoc()) {

                                        $coins = $fila["coins"];
                                    }

                                ?>
                                    <h2>Coins: <input type="number" class="custom-input" id="miInput" value="0" min="0" max="<?php echo $coins ?>" onkeydown="return false;" />💎</h2>
                                <?php
                                } else {
                                }

                                ?>





                                <h2>Sub total :<span id="subtotal_juegos"></span>€</h2>
                    </div>



                    <button class="custom-btn btn-11" onclick="cambiar()">Proceder a pagar <div class="dot"></div></button>

                    <hr class="inline">




                    <button class="custom-btn btn-11" onclick="volver()">Continuar pagando <div class="dot"></div></button>


                </div>
            </div>

        </div>
    </div>
    <div class="todo_pagar filtro" id="todo_pagar">

        <div class="pasos">

            <div class="circulo">1</div>
            <h3>Cesta</h3>
            <hr> <span class="flecha">></span>
            <div class="circulo">2</div>
            <h3>Pago</h3>

        </div>

        <div class="pagar_g">

            <div class="metodo_pago ">
                <h1>Metodo pago</h1>
                <div class="contenido_metodo_pago">

                    <div class="formulario">

                        <label for="nombre">Nombre del titular</label>
                        <input type="text" id="nombre" name="nombre" required>

                        <label for="numero">Número de tarjeta</label>
                        <input type="text" id="numero" name="numero" required>

                        <label for="fecha">Fecha de expiración</label>
                        <input type="text" id="fecha" name="fecha" required>

                        <label for="cvc">CVC</label>
                        <input type="text" id="cvc" name="cvc" required>

                    </div>
                </div>
            </div>

            <div class="resumen_pago">
                <h1>Resumen pago</h1>
                <div class="contenido_resumen_pago">
                    <div class="nombre_juego" id="videojuego_pagooo">
                        <h2>Juegos </h2>



                    </div>
                    <div class="precesar_pago">

                        <h2>Procesar pago</h2>

                        <div class="content_procesar_pago">

                            <h4>Precio total :</h4>

                            <div> <span id="subtotal_juegos2"></span>€</div>


                        </div>

                        <?php
                        if ($estado == 'true') {
                        ?>
                            <button class="custom-btn btn-11" onclick="pagar()">Pagar <div class="dot"></div></button>



                            <?php
                            ?>
                        <?php
                        } else {
                        ?>
                            <button class="custom-btn btn-11" onclick="mensaje4()">Pagar <div class="dot"></div></button>

                        <?php
                        } ?>




                    </div>
                </div>

            </div>
        </div>

    </div>


    <script>
        function volver() {

            window.location.href = "../catalogo.php";

        }

        function cambiar() {

            var carrito = document.getElementById("todo_carrito");
            console.log(carrito);

            carrito.classList.add("filtro");

            var carrito = document.getElementById("todo_pagar");
            console.log(carrito);

            carrito.classList.remove("filtro");


        }

        if (localStorage.getItem('cart')) {
            var cart = JSON.parse(localStorage.getItem('cart')); // convierte la cadena de texto JSON almacenada en un array de objetos
        }

        var div = document.getElementById('cesta');

        var string = '';


        cart.forEach(element => {
            // Obtenemos la tabla del carrito del DOM.
            let cartTable = document.getElementById("lista-carrito2");

            // Creamos una nueva fila para la tabla.
            let row = document.createElement("tr");

            // Creamos las celdas que van en la fila.
            let imgCell = document.createElement("td");
            let nameCell = document.createElement("td");
            let priceCell = document.createElement("td");
            let borrar = document.createElement("td");

            // Asignamos los valores a las celdas.
            imgCell.innerHTML = `<img src="${element.image}" alt="${element.name}" style="width:150px;height:100px; border-radius:15px;">`;
            nameCell.textContent = element.name;
            priceCell.textContent = `${element.price}€`;
            borrar.innerHTML = `<a href="">X</a>`;

            // Agregamos las celdas a la fila.
            row.appendChild(imgCell);
            row.appendChild(nameCell);
            row.appendChild(priceCell);
            row.appendChild(borrar);

            // Agregamos la fila a la tabla del carrito.
            cartTable.appendChild(row);
        });

        function precrio() {
            if (localStorage.getItem('cart')) {
                var cart = JSON.parse(localStorage.getItem('cart')); // convierte la cadena de texto JSON almacenada en un array de objetos
            }

            var sumatorio = 0;

            var subtotal = 0;

            cart.forEach(element => {

                sumatorio = parseInt(element.price) + sumatorio;

            });

            var span = document.getElementById('precio_juegos');

            span.innerHTML = sumatorio;

            subtotal = sumatorio;

            var span3 = document.getElementById('subtotal_juegos');

            span3.innerHTML = subtotal;

            var span4 = document.getElementById('subtotal_juegos2');

            span4.innerHTML = subtotal;

            var div2 = document.getElementById('videojuego_pagooo');

            cart.forEach(element => {

                var div = document.createElement('div');

                div.innerHTML = "<span class=''>" + element.name + "</span><span class=''>" + element.price + "€</span>";

                div.classList.add('titulo_juego_pagooo');

                div2.appendChild(div);


            });


        }



        precrio();



        function pagar(subtotal) {
            var nombre = document.getElementById('nombre').value;
            var numero = document.getElementById('numero').value;
            var fecha = document.getElementById('fecha').value;
            var cvc = document.getElementById('cvc').value;
            var subtotal = document.getElementById('subtotal_juegos2').textContent;
            var input = document.getElementById("miInput");
            var valor = input.value;


            // Datos que deseas enviar a PHP
            var dato = nombre + "-" + numero + "-" + fecha + "-" + cvc + "-" + subtotal + "-" + valor;

            // Crear un objeto XMLHttpRequest
            var xhttp = new XMLHttpRequest();

            // Configurar una función de devolución de llamada para manejar la respuesta del servidor
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // Manejar la respuesta del servidor

                    if (this.responseText == 'MAL') {
                        mensaje2(this.responseText);

                    } else if (this.responseText == 'OK') {

                        mensaje1(this.responseText);
                    } else if (this.responseText == 'NO_DINERO') {

                        mensaje3(this.responseText);
                    } else if (this.responseText == 'hola') {


                    }

                }
            };
            // Abrir una solicitud POST a tu archivo PHP
            xhttp.open("POST", "pagar.php", true);

            // Establecer el encabezado de la solicitud
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Enviar la solicitud con los datos
            xhttp.send("dato=" + encodeURIComponent(dato));
        }

        function mensaje1(texto) {
            Swal.fire({
                icon: 'success',
                title: '¡Se ha realizado la compra con exito!',
                confirmButtonColor: 'rgba(129, 5, 240, 1)',
                html: 'Codigo juego : XXX XXX XXX XXX',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            })

            localStorage.removeItem('cart');



        }

        function mensaje2(texto) {
            Swal.fire({
                icon: 'error',
                title: 'Los datos introducidos no son correctos',
                confirmButtonColor: 'rgba(129, 5, 240, 1)',

                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            })
        }

        function mensaje3(texto) {
            Swal.fire({
                icon: 'error',
                title: 'No tienes suficientes fondos en tu tarjeta',
                confirmButtonColor: 'rgba(129, 5, 240, 1)',

                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            })
        }

        function mensaje4(texto) {
            Swal.fire({
                icon: 'error',
                title: 'Por favor inicia sesion antes de comprar',
                confirmButtonColor: 'rgba(129, 5, 240, 1)',

                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            })
        }
    </script>


    <?php
    include '../includes/footer.html';
    ?>


</body>
<script>




</script>
<script src="../js/script_header.js"></script>
<script src="../js/bot.js"></script>
<script src="../js/login.js"></script>
<script src="../js/buscador.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>