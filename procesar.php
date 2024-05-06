<?php
// Configuración de la conexión a la bd
$servername = "localhost"; //
$username = "root"; // usuario de phpmyadmin 
$password = "679XKaTule351_"; // Contraseña de phpmyadmin
$dbname = "proyecto"; // 

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// verificar conexión
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}

// verificar si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['Apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // consulta SQL para los datos
    $sql = "INSERT INTO formulario_contacto (id, nombre, apellidos, email, telefono)
            VALUES ('$nombre', '$apellidos', '$email', '$telefono')";

    // ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// cerrar conexión
$conn->close();
?>
