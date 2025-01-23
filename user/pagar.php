<?php

session_start();

$dato = $_POST['dato'];

$datos = explode("-", $dato);

require_once '../includes/islogin.php';

function concectar()
{

    $con = new mysqli("localhost", "anubis", "123456", "anubisgaming");
    if (mysqli_connect_errno()) {
        echo "No se puede establecer conexión";
    }

    return $con;
};


$conn = concectar();

function verificarPass($conn, $datos)
{

    $stmt = $conn->prepare("SELECT nombre_titular,numero_tarjeta,fecha_expiracion,cvc FROM tarjetascredito WHERE nombre_titular = ? AND numero_tarjeta = ? and fecha_expiracion = ? and cvc = ?");
    $stmt->bind_param("ssss", $datos[0], $datos[1], $datos[2], $datos[3]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {


        return true;
    } else {


        return false;
    }
}


if (verificarPass($conn, $datos)) {

    $sql = "SELECT saldo_id FROM tarjetascredito WHERE nombre_titular = '" . $datos[0] . "' ";

    $resultado = $conn->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        $saldo_id = $fila["saldo_id"];
    }

    $subtotal = $datos[4];

    $sql = "SELECT saldo FROM saldos WHERE id=$saldo_id;";

    $resultado = $conn->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        $saldo = $fila["saldo"];
    }

    if ($saldo - $subtotal <= 0) {

        echo 'NO_DINERO';
    } else if ($saldo - $subtotal >= 0) {
        if ($estado == 'true') {
            
            $des = $datos[5];

            $sql = "SELECT coins FROM usuario  where user = '" . $_SESSION['usuario'] . " '";

            $resultado = $conn->query($sql);
            while ($fila = $resultado->fetch_assoc()) {

                $coins = $fila["coins"];
            }

            if ($des < $coins) {
                $total = $coins - $des;

                $sql = "UPDATE usuario SET coins = $total where user = '" . $_SESSION['usuario'] . " '";

                $resultado = $conn->query($sql);

                $subtotal = $subtotal - ($des / 10);
            }
        }

        $sql = "UPDATE Saldos SET saldo = saldo - $subtotal  WHERE id = '$saldo_id'";

        $resultado = $conn->query($sql);

        echo 'OK';
    }
} else {

    echo 'MAL';

    exit;
}
