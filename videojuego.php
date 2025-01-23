<?php
session_start();

?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Juego </title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style_videojuego.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="style/style_carrito.css" />
    <link rel="icon" type="image/png" href="../img/image.png">


</head>
<script src="js/eventoheader.js" defer></script>

<body>
    <style>

    </style>
    <?php
    include './includes/chat.html';
    include './includes/header.php';

    $id = $_GET['id'];
    $con = concectar();
    function cartas($con, $id)
    {
        $consulta = "SELECT * FROM `videojuegos` WHERE id=$id;";
        $stmt = $con->prepare($consulta);
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0;
        while ($Fila = $result->fetch_assoc()) {
            $listaCampos['id'] = $Fila["id"];
            $listaCampos['titulo'] = $Fila["titulo"];
            $listaCampos['genero'] = $Fila["genero"];
            $listaCampos['plataforma'] = $Fila["plataforma"];
            $listaCampos['desarrollador'] = $Fila["desarrollador"];
            $listaCampos['fecha_lanzamiento'] = $Fila["fecha_lanzamiento"];
            $listaCampos['descripcion'] = $Fila["descripcion"];
            $listaCampos['precio'] = $Fila["precio"];
            $listaCampos['url'] = $Fila["url"];
            $i++;
        }
        mysqli_free_result($result);
        $stmt->close();
        return $listaCampos;
    };

    $datos = cartas($con, $id);


    ?>
    <style>
        .img_fondo {

            background-image: url(<?php echo $datos['url']; ?>);

            background-size: cover;
            background-position: center center;

            height: 70vh;
            width: 100%;
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 75%);
            margin-bottom: 250px;
        }
    </style>

    <div class="main_contenedor">
        <div class="img_fondo">
       </div>
        <div class="contenedor_todo">
            <div class="img_vid">
                <img id="game-image" src="<?php echo $datos['url']; ?>" alt="">
            </div>
            <div class="descripcion">
                <h1 id="game-name">
                    <?php echo $datos['titulo']; ?>
                </h1>
                <div class="box_juego">
                    <div class="elemento_juego"><?php echo $datos['plataforma']; ?></div>
                    <hr>
                    <div class="elemento_juego"><?php echo $datos['desarrollador']; ?></div>
                    <hr>
                    <div class="elemento_juego"><?php echo $datos['genero']; ?></div>
                </div>
                <div class="descrp">
                    <h2>Acerca del Juego</h2>
                    <?php echo $datos['descripcion']; ?>
                </div>
                <div class="precio">
                    <h2 id="game-price"><span>
                            <?php echo $datos['precio']; ?>€
                        </span></h2>
                    <!-- botno del moidal cariito  -->
                </div>
                <button id="añadir_juego" class="custom-btn btn-2" data-game-name="<?php echo $datos['titulo']; ?>" data-game-price="<?php echo $datos['precio']; ?>" data-game-image="<?php echo $datos['url']; ?>">Añadir al carrito</button>
            </div>
        </div>
    </div>







    <?php
    include './includes/footer.html';
    ?>


</body>
<script src="js/redireccion.js"></script>

<script src="js/script_header.js"></script>
<script src="js/bot.js"></script>
<script src="js/login.js"></script>
<script src="/js/Añadirjuego_modal.js"></script>

</html>