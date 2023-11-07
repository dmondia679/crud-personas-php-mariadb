<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $localizacion = $_POST['localizacion'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE tabla_personas SET nombre = ?, apellido = ?, localizacion = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellido, $localizacion, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM tabla_personas WHERE id = $id");
$persona = $stmt->fetch();

?>

<h2>Editar persona</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>"><br>
    Apellido: <input type="text" name="apellido" value="<?php echo $persona['apellido']; ?>"><br>
    Localización: <input type="text" name="localizacion" value="<?php echo $persona['localizacion']; ?>"><br>
    <input type="submit" value="Guardar Cambios">
</form>
