<?php
session_start();
require '../../db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
    header("Location: ../dashboard.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
    if ($stmt->execute([$name, $email, $role, $id])) {
        header("Location: users.php");
        exit;
    } else {
        echo "Error updating user!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <a href="users.php">Back to User List</a>
    <form method="POST">
        <label>Name:</label><input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br>
        <label>Email:</label><input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
        <label>Role:</label>
        <select name="role" required>
            <option value="ROLE_USER" <?php echo $user['role'] === 'ROLE_USER' ? 'selected' : ''; ?>>User</option>
            <option value="ROLE_ADMIN" <?php echo $user['role'] === 'ROLE_ADMIN' ? 'selected' : ''; ?>>Admin</option>
        </select><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>
