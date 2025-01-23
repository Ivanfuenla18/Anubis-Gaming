<?php

$usuario = $_GET["user"];

$password = $_GET["password"];


function concectar()
{

    $con = new mysqli("localhost", "anubis", "123456", "anubisgaming");
    if (mysqli_connect_errno()) {
        echo "No se puede establecer conexión";
    }

    return $con;
};


$usuario = $_GET["user"];
$password = $_GET["password"];

$conn = concectar();

function verificarPass($conn, $usuario, $password)
{

    $stmt = $conn->prepare("SELECT user,password FROM usuario WHERE user = ? AND password = ?");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {

        return true;
    } else {
        return false;
    }
}

if (verificarPass($conn, $usuario, $password)) {

session_start();

$_SESSION['usuario'] = $usuario;

header('Location: ../index.php');

} else {

    header('Location: ../index.php');

    exit;
}
