<?php 
session_start();
function concectar()
{

    $con = new mysqli("localhost", "anubis", "123456", "anubisgaming");
    if (mysqli_connect_errno()) {
        echo "No se puede establecer conexión";
    }

    return $con;
};



$conn = concectar();

// borrar imagen portada 
$query = "SELECT url FROM usuario  where user = '". $_SESSION['usuario'] . "'";
$resultado = $conn->query($query);

echo $query;

while ($row = $resultado->fetch_assoc()) {
    $imagen_path = "G:/.shortcut-targets-by-id/1-2aFCNp8IL1CUct_5I4T0VMoHMuBLybD/Anubis gaming/".$row['url'];
    if (file_exists($imagen_path)) {
        unlink($imagen_path);
    }
}


$consulta2 = "DELETE FROM `usuario` WHERE `usuario`.`user` = '".$_SESSION['usuario']."';";

$stmt = $conn->prepare($consulta2);

$stmt->execute();



session_destroy();


header('Location: ../index.php');


