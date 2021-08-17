<?php
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

include('db.php');

$consulta="SELECT*FROM usuarios where usuario='$usuario'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$filasArray=mysqli_fetch_row($resultado);

if($filas && password_verify($contraseña,$filasArray[1])){
    header('location:home.php');
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">Usuario o Contraseña incorrecto</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);