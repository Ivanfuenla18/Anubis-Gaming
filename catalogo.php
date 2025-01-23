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
    <title>Annubis - Catalogo</title>

    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style_catalogo.css" />
    <link rel="stylesheet" href="style/style_carrito.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="icon" type="image/png" href="../img/image.png">


</head>

<body>
    <?php
    include './includes/chat.html';
    include './includes/header.php';
    
    $con = concectar();
    function cartas($con)
    {
        $consulta = "SELECT id,titulo,precio,url FROM `videojuegos`";
        $stmt = $con->prepare($consulta);
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0;
        while ($Fila = $result->fetch_assoc()) {
            $listaCampos['id'][$i] = $Fila["id"];
            $listaCampos['titulo'][$i] = $Fila["titulo"];
            $listaCampos['precio'][$i] = $Fila["precio"];
            $listaCampos['url'][$i] = $Fila["url"];
            $i++;
        }
        mysqli_free_result($result);
        $stmt->close();
        return $listaCampos;
    }
    function imprimir($numero_imp, $datos)
    {
        for ($i = 0; $i < $numero_imp; $i++) {
            echo '<div class="card2 ">
            <div class="img">
        <a href="videojuego.php?id=' . $datos['id'][$i] . '" class="img2">
            <img src="' . $datos['url'][$i] . '" alt="">
        </a>
        </div>
        <div class="texto2 ">
            <span class="articulo">' . $datos['titulo'][$i] . '</span>
            <span>' . $datos['precio'][$i] . '€</span>
        </div>
    </div>';
        }
    }
    $datos = cartas($con);
    ?>
    <div class="top"></div>
    <div class="formulario2">
        <input type="text" placeholder="Buscar un videojuego" id="buscador">
    </div>
    <div class="juegos2 list-group">
        <?php
        $numero_imp = 51;
        imprimir($numero_imp, $datos);
        ?>
    </div>
    <?php
    include './includes/footer.html';
    ?>


</body>

<script src="js/script_header.js"></script>
<script src="js/bot.js"></script>
<script src="js/login.js"></script>
<script src="js/buscador.js"></script>
<script src="js/eventoheader.js" defer></script>

</html>