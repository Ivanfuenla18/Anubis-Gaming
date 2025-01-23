<?php
session_start();

require_once("../includes/islogin.php");

if ($estado == 'false') {


    header("Location: ../index.php");
} else if ($estado == 'true') {
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Perfil</title>
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style_carrito.css"/>
    <link rel="stylesheet" href="../style/style_perfil.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<style>

</style>

<body>
    <?php
    include '../includes/chat.html';
    include '../includes/header.php';


    ?>
    <div class="top"></div>

    <div class="content_perfil">

        <div class="caja_perf">
            <?php

            $conn = concectar();

            $sql = "SELECT coins,url FROM usuario  where user = '" . $_SESSION['usuario'] . " '";

            $resultado = $conn->query($sql);

            while ($fila = $resultado->fetch_assoc()) {
                $url = $fila["url"];
                $coins = $fila["coins"];
            }
            echo "<div class='icono_perfil'> ";
            echo "</div> ";
            ?>
            <style>
                .icono_perfil {

                    height: 150px;
                    width: 150px;
                    border-radius: 50%;
                    background-image: url( ../<?php echo $url ?>);
                    background-position: center center;
                    background-size: cover;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 50px;
                    margin-bottom: 50px;
                }
            </style>
            <h1><?php echo $usuario ?> </h1>
            <h2>Tienes un total de : <?php echo $coins; ?>💎</h2>
            <form action="../includes/logout.php">
                <button type="submit">Cerrar session</button>
            </form>
            <form action="../includes/eliminarUsuario.php">
                <button type="submit">Eliminar Usuario</button>

            </form>
        </div>
    </div>
    <?php
    include '../includes/footer.html';
    ?>

</body>
<script src="js/redireccion.js"></script>

<script src="../js/script_header.js"></script>
<script src="../js/bot.js"></script>
<script src="../js/login.js"></script>


</html>