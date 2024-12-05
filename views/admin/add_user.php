<?php
$title = 'Új felhasználó hozzáadása'; // Page title for layout

require_once __DIR__ . '/../../db.php';

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ROLE_ADMIN') {
    header("Location: index.php?page=home");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role])) {
        header("Location: index.php?page=admin_users");
        exit;
    } else {
        echo "Hiba történt a felhasználó hozzáadása során!";
    }
}
?>
<h1 class="text-center">Új felhasználó hozzáadása</h1>
<div class="row">
        <div class="col-md-6 mx-auto">
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Név:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Szerepkör:</label>
        <select id="role" name="role" class="form-select">
            <option value="ROLE_USER">Felhasználó</option>
            <option value="ROLE_ADMIN">Adminisztrátor</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Hozzáadás</button>
</form>
</div></div>
