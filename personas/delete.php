<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tabla_personas WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
