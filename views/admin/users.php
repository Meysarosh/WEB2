<?php
$title = 'Felhasználók kezelése'; // Page title for layout

require_once __DIR__ . '/../../db.php';

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ROLE_ADMIN') {
    header("Location: index.php?page=home");
    exit;
}

// Fetch all users from the database
$stmt = $pdo->query("SELECT id, name, email, role FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="text-center">Felhasználók kezelése</h1>
<a href="index.php?page=admin_add_user" class="btn btn-success mb-3">Új felhasználó hozzáadása</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Email</th>
            <th>Szerepkör</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['role']); ?></td>
                <td>
                    <a href="index.php?page=admin_edit_user&id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Módosítás</a>
                    <a href="index.php?page=admin_delete_user&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Biztosan törölni szeretné?');">Törlés</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
