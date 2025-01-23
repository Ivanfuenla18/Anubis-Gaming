<?php
// Comprueba si la ruta de Ivan existe
// esto para al tener dos pcs de trabajo la funcion que hace subir las imagens 
// al darle la ruta directamente pues cuando esta con otro pc esta no va
//la solocion a ellos es el if de abajo y las rutas de cada pc
$rutaimagenIvan = "G:/.shortcut-targets-by-id/1-2aFCNp8IL1CUct_5I4T0VMoHMuBLybD/Anubis gaming/img/perfiles/";
$rutaimagenAzz = "E:/ProyectosPhp/Anubis gaming/img/perfiles/";
if (file_exists($rutaimagenIvan)) {
    $rutapaco = $rutaimagenIvan;
    
} else {
    // Si la ruta de Ivan no existe, usa la ruta de Azz
    $rutapaco = $rutaimagenAzz;
    
}

// Aho

$usuario = $_POST["user"];

$password = $_POST["password"];



/*_____________________  ESTO HAY Q MIRARLO PARA TEMA DE LOS USUARIOS REPETIDOS USAR SELECT  ________________________ */

function concectar()
{

    $con = new mysqli("localhost", "anubis", "123456", "anubisgaming");
    if (mysqli_connect_errno()) {
        echo "No se puede establecer conexión";
    }

    return $con;
};



$conn = concectar();


$consulta2 = "INSERT INTO `usuario` (`id`, `user`, `password`,`coins`) VALUES (NULL, '$usuario', '$password',0);";

$stmt = $conn->prepare($consulta2);

$stmt->execute();


// solo una imagen de portada 

$tipo = $_FILES['imagen_portada']['type'];

if (strpos($tipo, "image") === false) {

    echo $tipo;

} else {
    if (file_exists($_FILES['imagen_portada']['tmp_name'])) {
        /**AQUI se añadi la ruta de cada pc en la variable ruta pc*/
        if (move_uploaded_file($_FILES['imagen_portada']['tmp_name'],  $rutapaco .$_FILES['imagen_portada']['name'])) {
            $ruta = 'img/perfiles/' . $_FILES['imagen_portada']['name'];
            $query = "UPDATE usuario SET url = '$ruta' WHERE user = '$usuario'";
            $resultado = $conn->query($query);
        }
    }
}


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
