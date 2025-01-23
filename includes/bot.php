<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "anubis", "123456", "anubisgaming");


// Función principal del bot
function Thot($conexion)
{
    // Obtener la descripción del juego del usuario
    $descripcion = strtolower($_POST["descripcion"]);
    $RespuestaServidor = array();
    // apartir de aqui es un fummada mia a ver si me sale ¿?¿???¿?¿?¿??¿?¿
    // !!!!!! idea para mejorar esto es un inner jion que junte las dos tablas asi no necesitas una rray para verficar si es texto nomral o texto de video juego !!!! 
    $plabras_paco = array('hola', 'como te llamas', 'adios', 'estado');

    if (in_array($descripcion, $plabras_paco)) {

        // Consulta para buscar la respuesta en la tabla chat
        $sql = "SELECT respuesta FROM chat WHERE mensaje = '$descripcion'";

        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Si se encontró una respuesta en la tabla chat, la mostramos
            $row = mysqli_fetch_assoc($result);
            $respuesta = $row["respuesta"];
            // Retornamos la respuesta en formato JSON
            $RespuestaServidor = array(
                "respuesta" => $respuesta,
                "descripcion" =>  $descripcion,
            );

            $RespuestaServidor["respuesta"] = $respuesta;

        } else {
            // Si no se encontró una respuesta en la tabla chat, mostramos una respuesta por defecto
        $RespuestaServidor['respuesta'] = "Lo siento, no entendí lo que quisiste decir. ¿Podrías reformular tu pregunta?";
        }

        //array asociativo en PHP
        
// aqui acaba la fumada mia ¿????????????????????????????????????????????????????????


    } else {
        // Buscar juegos que coinciden con las palabras clave en la descripción
        $juegos = buscar_juegos($descripcion, $conexion);

        if (count($juegos) == 0) {
            $RespuestaServidor['error'] = "Lo siento, no entendí lo que quisiste decir.";
            $RespuestaServidor["descripcion"] = $descripcion;
            
        } else {
            $RespuestaServidor['TodoOk'] = true;
            $RespuestaServidor["descripcion"] = $descripcion;
            $RespuestaServidor['juegos'] = array();
            foreach ($juegos as $juego) {
                $consulta = "SELECT url, titulo  FROM videojuegos WHERE id='" . $juego . "'";
                $resultado = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($resultado);
                
                $RespuestaServidor['juegos'][] = array(
                    'url' => $fila["url"],
                    'titulo' => $fila["titulo"]
                );
            }
        }
    }

    // Devolver respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($RespuestaServidor);
}


// Función para buscar juegos que coinciden con las palabras clave en la descripción
function buscar_juegos($descripcion, $conexion)
{
    // Dividir la descripción en palabras clave
    $palabras_clave = explode(" ", $descripcion);
    // Declaración del arreglo
    $juegos = array();
    // Recorre el arreglo de palabras clave
    foreach ($palabras_clave as $palabra) {
        // Busca las palabras clave en la tabla palabras_clave
        $consulta = "SELECT videojuego_id FROM palabras_clave WHERE palabra_clave='" . $palabra . "'";
        $resultados = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_assoc($resultados)) {
            $juegos[] = $fila["videojuego_id"];
        }
    }
    // Eliminar duplicados en el arreglo de juegos
    $juegos = array_unique($juegos);
    return ($juegos);
}


// Ejecutar la función principal del bot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Thot($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);