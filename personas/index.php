<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM tabla_personas');
$tabla_personas = $stmt->fetchAll();
?>

<h2>Listado de Personas</h2>


<a href="create.php">Crear nueva persona</a>
<br><br>

<ul>
<?php foreach ($tabla_personas as $persona): ?>
    <li>
        <?php echo $persona['nombre']; ?> <?php echo $persona['apellido']; ?> <?php echo $persona['localizacion']; ?>
        <a href="edit.php?id=<?php echo $persona['id']; ?>">Editar</a>
        <a href="delete.php?id=<?php echo $persona['id']; ?>">Eliminar</a>
    </li>
<?php endforeach; ?>
</ul>
