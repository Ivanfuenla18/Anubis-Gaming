<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Contacto</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style_carrito.css" />
    <link rel="stylesheet" href="style/style_contacto.css" />
    <link rel="icon" type="image/png" href="../img/image.png">

</head>



<body>

    </a>
    <?php
    include './includes/chat.html';
    include './includes/header.php';


    ?>

    <style>
        nav {

            background-color: #000 !important;
        }
    </style>


    <div class="top"></div>

    <div class="fondo_contacto">

        <div class="formulario_contact">
            <h1>Contactanos</h1>
            <form id="form" class="topBefore">

                <input id="name" type="text" placeholder="Nombre">
                <input id="email" type="text" placeholder="E-MAIL">
                <textarea id="message" type="text" placeholder="Mensaje"></textarea>
                <input id="submit" type="submit" value="Enviar!">

            </form>
        </div>


    </div>


    <?php

    include './includes/footer.html';
    ?>


</body>


<script>
    // like y dislike 
    const likes = document.querySelectorAll('.like');
    const dislikes = document.querySelectorAll('.dislike');

    likes.forEach(like => {
        like.addEventListener('click', () => {
            let count = parseInt(like.querySelector('span').innerText);
            if (count < 100) {
                count++;
                like.querySelector('span').innerText = count;
            }
        });
    });

    dislikes.forEach(dislike => {
        dislike.addEventListener('click', () => {
            let count = parseInt(dislike.querySelector('span').innerText);
            if (count < 100) {
                count++;
                dislike.querySelector('span').innerText = count;
            }
        });
    });
</script>

<script src="js/redireccion.js"></script>
<script src="js/script_header.js"></script>
<script src="js/bot.js"></script>
<script src="js/login.js"></script>



</html>