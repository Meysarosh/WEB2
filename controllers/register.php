<?php
require_once __DIR__ . '/../config.php'; // Include the configuration file
require_once __DIR__ . '/../db.php'; // Include the database connection

// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = 'ROLE_USER'; // Default role for registration

    // Validate input fields
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['register_error'] = "Minden mezőt ki kell tölteni!";
        header("Location: " . SITE_ROOT . "index.php?page=register");
        exit;
    }

    try {
        // Check if the email already exists
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);

        if ($query->fetch()) {
            $_SESSION['register_error'] = "Ez az email cím már regisztrálva van!";
            header("Location: " . SITE_ROOT . "index.php?page=register");
            exit;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $hashedPassword, $role])) {
            $_SESSION['register_success'] = "Sikeres regisztráció! Jelentkezzen be.";
            header("Location: " . SITE_ROOT . "index.php?page=login");
            exit;
        } else {
            $_SESSION['register_error'] = "Hiba történt a regisztráció során.";
        }
    } catch (PDOException $e) {
        $_SESSION['register_error'] = "Adatbázis hiba történt: " . $e->getMessage();
    }

    header("Location: " . SITE_ROOT . "index.php?page=register");
    exit;
}

// Redirect to home page if accessed directly
header("Location: " . SITE_ROOT . "index.php?page=home");
exit;
