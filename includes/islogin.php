<?php 

$estado='false';

if(isset($_SESSION['usuario'])){

$usuario=$_SESSION['usuario'];
$estado='true';

}

?>