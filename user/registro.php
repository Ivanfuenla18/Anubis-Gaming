<?php
session_start();

require_once("../includes/islogin.php");



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Anubis - Registro</title>
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style_registro.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="../style/style_carrito.css" />
    <link rel="icon" type="image/png" href="../img/image.png">
</head>

<body>
    <?php
    include '../includes/chat.html';
    include '../includes/header.php';

    ?>
    <div class="top"></div>

    <div class="content_perfil">

        <div class="login-box">
            <h2>Registrarse :</h2>

            <form action="../includes/añadirUsuario.php" method="post" enctype="multipart/form-data">
                <div class="user-box">
                    <input type="text" name="user" required="">
                    <label>Usuario</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Contraseña</label>
                </div>

                


                <div class="file-input-container">
                    <input type="file" id="myFileInput" class="file-input" name="imagen_portada" required />
                    <label for="myFileInput" class="file-input-label">
                        <span class="file-input-text">Icono de perfil</span>
                        <span class="file-input-button">Examinar</span>
                    </label>
                </div>








                <button class="modal_regis" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Registrarse
                </button>

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