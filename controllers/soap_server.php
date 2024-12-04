<?php
require '../db.php';

// Define a class to handle SOAP requests
class SoapHandler {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch all users
    public function getUsers() {
        $stmt = $this->pdo->query("SELECT id, name, email, role FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all places (helyseg)
    public function getPlaces() {
        $stmt = $this->pdo->query("SELECT * FROM helyseg");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add more methods as needed...
}

// Instantiate the SOAP server
$options = ['uri' => 'http://localhost/project/controllers/soap_server.php'];
$server = new SoapServer(null, $options);

// Register the handler class
$handler = new SoapHandler($pdo);
$server->setObject($handler);

// Handle SOAP requests
$server->handle();
