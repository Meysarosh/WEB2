<?php
require '../db.php'; // Include the database connection

session_start(); // Start the session to store user info

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ];
        header("Location: ../views/dashboard.php"); // Redirect to a dashboard or home page
        exit;
    } else {
        echo "Invalid email or password!";
    }
}
?>
<!-- Login form -->
<form method="POST">
    <label>Email:</label><input type="email" name="email" required>
    <label>Password:</label><input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
