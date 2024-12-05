<?php

class RestClient {
    private $baseUrl;

    public function __construct($baseUrl) {
        // Ensure the base URL ends without a trailing slash
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    private function sendRequest($endpoint, $method, $data = null) {
        $url = $this->baseUrl . $endpoint;

        // Initialize cURL
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
