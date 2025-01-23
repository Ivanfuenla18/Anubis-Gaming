<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Conocenos</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style_carrito.css" />
    <link rel="stylesheet" href="style/style_conocenos.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="icon" type="image/png" href="../img/image.png">
</head>

<script>


</script>

<body>

    </a>
    <?php
    include './includes/chat.html';
    include './includes/header.php';


    ?>

    <div class="top"></div>

    <div class="top"></div>

    <div class="contenido_general">



        <div class="contenido2">

            <div class="img1"></div>
            <div class="texto">
                <h2>¿Quiénes somos?</h2>

                <text>Anubis Gaming es una reconocida empresa de venta de videojuegos que se ha establecido como un referente en la industria del entretenimiento digital. Fundada en 2023, la empresa ha experimentado un crecimiento constante y ha ganado una sólida reputación entre los aficionados a los videojuegos.

                </text>
            </div>

        </div>

        <div class="contenido3">

            <div class="texto">
                <h2>¿Qué hacemos?</h2>

                <text>Anubis Gaming se especializa en la comercialización de una amplia variedad de videojuegos para diversas plataformas, incluyendo consolas de última generación, como PlayStation, Xbox y Nintendo Switch, así como también juegos para PC. La empresa se enorgullece de ofrecer una amplia selección de títulos populares y de alta calidad, desde los últimos lanzamientos hasta clásicos atemporales.</text>

            </div>

            <div class="img2"></div>

        </div>

        <div class="contenido2">

            <div class="img3"></div>

            <div class="texto">

                <h2>¿Annubis gaming?</h2>

                <text>Anubis Gaming cuenta con una plataforma de venta en línea, a través de la cual los clientes pueden explorar su catálogo de productos, realizar pedidos y recibir envíos rápidos y confiables. También tienen presencia física a través de varias tiendas ubicadas estratégicamente, donde los jugadores pueden visitar y experimentar los juegos antes de comprarlos.</text>

            </div>

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