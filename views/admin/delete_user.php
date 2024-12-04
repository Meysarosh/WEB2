<?php
session_start();
require '../../db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
    header("Location: ../dashboard.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: users.php");
    exit;
} else {
    echo "Error deleting user!";
}
?>
