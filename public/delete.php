<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $query = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $query);
}

header("Location: index.php");
exit;
?>