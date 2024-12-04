<?php

class RestClient {
    private $baseUrl;

    public function __construct($baseUrl) {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    private function sendRequest($endpoint, $method, $data = null) {
        $url = $this->baseUrl . $endpoint;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            return ['error' => $error];
        }

        return json_decode($response, true);
    }

    public function getUsers() {
        return $this->sendRequest('/controllers/rest_server.php', 'GET');
    }

    public function getUserById($id) {
        return $this->sendRequest('/controllers/rest_server.php?id=' . $id, 'GET');
    }

    public function createUser($data) {
        return $this->sendRequest('/controllers/rest_server.php', 'POST', $data);
    }

    public function updateUser($data) {
        return $this->sendRequest('/controllers/rest_server.php', 'PUT', $data);
    }

    public function deleteUser($id) {
        return $this->sendRequest('/controllers/rest_server.php?id=' . $id, 'DELETE');
    }
}

// Example usage
$client = new RestClient('http://localhost/project');

// Fetch all users
echo "<h2>All Users:</h2>";
print_r($client->getUsers());

// Fetch a user by ID
echo "<h2>Single User (ID = 1):</h2>";
print_r($client->getUserById(1));

// Create a new user
$newUser = [
    'name' => 'Client User',
    'email' => 'clientuser@example.com',
    'password' => 'clientpassword123',
    'role' => 'ROLE_USER'
];
echo "<h2>Create User:</h2>";
print_r($client->createUser($newUser));

// Update an existing user
$updateUser = [
    'id' => 1,
    'name' => 'Updated Client User',
    'email' => 'updatedclient@example.com',
    'role' => 'ROLE_ADMIN'
];
echo "<h2>Update User:</h2>";
print_r($client->updateUser($updateUser));

// Delete a user
echo "<h2>Delete User (ID = 1):</h2>";
print_r($client->deleteUser(1));
