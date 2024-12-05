<?php
require '../db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Fetch a single user
            $stmt = $pdo->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($user);
        } else {
            // Fetch all users
            $stmt = $pdo->query("SELECT id, name, email, role FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($users);
        }
        break;

    case 'POST':
        // Add a new user
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->execute([$data['name'], $data['email'], $hashedPassword, $data['role']]);
        echo json_encode(["message" => "User created successfully"]);
        break;

    case 'PUT':
        // Update an existing user
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['email'], $data['role'], $data['id']]);
        echo json_encode(["message" => "User updated successfully"]);
        break;

    case 'DELETE':
        // Delete a user
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode(["message" => "User deleted successfully"]);
        } else {
            echo json_encode(["error" => "No ID provided"]);
        }
        break;

    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}
