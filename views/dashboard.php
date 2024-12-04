<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../controllers/login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
    <p>Your role is: <strong><?php echo htmlspecialchars($user['role']); ?></strong></p>

    <?php if ($user['role'] === 'ROLE_ADMIN'): ?>
        <h2>Admin Panel</h2>
        <p>Here you can manage users, view logs, etc.</p>

    <?php elseif ($user['role'] === 'ROLE_USER'): ?>
        <h2>User Dashboard</h2>
        <p>Welcome to your user dashboard! Explore content tailored to you.</p>

    <?php else: ?>
        <p>Unrecognized role. Please contact support.</p>
    <?php endif; ?>

    <a href="../controllers/logout.php">Logout</a>
</body>
</html>
