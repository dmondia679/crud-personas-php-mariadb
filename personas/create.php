<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $localizacion = $_POST['localizacion'];

    try {
        $sql = "INSERT INTO tabla_personas (nombre, apellido, localizacion) VALUES (:nombre, :apellido, :localizacion)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'apellido' => $apellido, 'localizacion' => $localizacion]);

        $message = 'Persona añadida con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir ña persona: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
<h2>Añadir nueva persona</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <textarea name="apellido" id="apellido"></textarea>
    <br>
    <label for="localizacion">Localización:</label>
    <input type="text" name="localizacion" id="localizacion" required>
    <br>
    <input type="submit" value="Añadir persona">
</form>

</body>
</html>
