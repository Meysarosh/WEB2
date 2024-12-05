<?php
$host = 'localhost';
$db = 'webprogbeadando';
$user = 'webprogbeadando'; 
$pass = 'Pro100Nethely'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
