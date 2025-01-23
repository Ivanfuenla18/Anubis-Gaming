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
    <title>Anubis - Ruleta</title>
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/style_ruleta.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="../style/style_carrito.css"/>
    <link rel="icon" type="image/png" href="../img/image.png">
   
</head>

<body>
    <?php
    include '../includes/chat.html';
    include '../includes/header.php';
    ?>
    <div class="top"></div>
    <div class="ruls">
        <div id="premio">
        </div>
        <div class="vara"></div>
        <div>
            <img src="../img/ruleta.png" id="ruleta">
        </div>
        <div>
            <div id="sonido" style="display: none;">
                <iframe src="../img/sonido_ruleta.mp3" id="audio"></iframe>
            </div>
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
<script src="../js/jquery.min.js"></script>
<script src="../js/ruleta.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
