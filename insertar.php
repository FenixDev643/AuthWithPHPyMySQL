<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

// Create connection
$conn = mysqli_connect('localhost','root','','login');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$UsuarioExistente="SELECT*FROM usuarios where usuario='$usuario'";
$resultado=mysqli_query($conn,$UsuarioExistente);
$filasUsuarioExistente=mysqli_num_rows($resultado);

if($filasUsuarioExistente){
    ?>
    <?php
    include("registrar.php");
    ?>
    <h1 class="bad">Ese Usuario ya existe</h1>
    <?php
    return;
}

$PasswordArray = str_split($contraseña);
$PasswordArrayLenght = count($PasswordArray);

foreach($PasswordArray as &$valor){
    if($PasswordArrayLenght < 5 or $valor == "" or $valor == " "){
        ?>
        <?php
        include("registrar.php");
        ?>
        <h1 class="bad">Su Contraseña debe de llevar minimo 6 caracteres</h1>
        <?php
        return;
    }       
}

$encryptedPassword = password_hash($contraseña, PASSWORD_DEFAULT, ['cost' => 10]);
$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$encryptedPassword')";

if (mysqli_query($conn, $sql)) {
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="good">Registrado Correctamente</h1>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>