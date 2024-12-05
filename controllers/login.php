<?php
require_once __DIR__ . '/../config.php'; // Include config file
require_once __DIR__ . '/../db.php'; // Use relative path for db.php

// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = "Minden mezőt ki kell tölteni!";
        header("Location: " . SITE_ROOT . "index.php?page=login");
        exit;
    }

    try {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: " . SITE_ROOT . "index.php?page=home");
            exit;
        } else {
            $_SESSION['login_error'] = "Helytelen email vagy jelszó!";
        }
    } catch (PDOException $e) {
        $_SESSION['login_error'] = "Adatbázis hiba történt: " . $e->getMessage();
    }

    // Redirect back to login page with error
    header("Location: " . SITE_ROOT . "index.php?page=login");
    exit;
}

// Redirect to home page if accessed directly
header("Location: " . SITE_ROOT . "index.php?page=home");
exit;
