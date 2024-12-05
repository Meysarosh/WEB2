<?php
$title = 'Felhasználó módosítása'; // Page title for layout

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

$stmt = $pdo->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Felhasználó nem található!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
    if ($stmt->execute([$name, $email, $role, $id])) {
        header("Location: index.php?page=admin_users");
        exit;
    } else {
        echo "Hiba történt a felhasználó frissítése során!";
    }
}
?>
<h1 class="text-center">Felhasználó módosítása</h1>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Név:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Szerepkör:</label>
        <select id="role" name="role" class="form-select">
            <option value="ROLE_USER" <?php echo $user['role'] === 'ROLE_USER' ? 'selected' : ''; ?>>Felhasználó</option>
            <option value="ROLE_ADMIN" <?php echo $user['role'] === 'ROLE_ADMIN' ? 'selected' : ''; ?>>Adminisztrátor</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Frissítés</button>
</form>
