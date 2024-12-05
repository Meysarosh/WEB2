<?php

require_once __DIR__ . '/../../db.php';

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ROLE_ADMIN') {
    header("Location: index.php?page=home");
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Érvénytelen felhasználó ID!";
    exit;
}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: index.php?page=admin_users");
    exit;
} else {
    echo "Hiba történt a felhasználó törlése során!";
}
