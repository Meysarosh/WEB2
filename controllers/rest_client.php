<?php
require_once __DIR__ . '/../config.php'; // Configuration file
require_once SERVER_ROOT . '/libs/RestClient.php'; // Correct path to RestClient class

session_start();

$client = new RestClient(SITE_ROOT);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = $_POST['action'];
        $result = null;

        switch ($action) {
            case 'getUsers':
                $result = $client->getUsers();
                break;

            case 'getUserById':
                if (!empty($_POST['id'])) {
                    $id = (int)$_POST['id'];
                    $result = $client->getUserById($id);
                } else {
                    $_SESSION['rest_error'] = 'Kérjük, adjon meg egy érvényes ID-t!';
                }
                break;

            case 'createUser':
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
                    $data = [
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'role' => $_POST['role'],
                    ];
                    $result = $client->createUser($data);
                } else {
                    $_SESSION['rest_error'] = 'Minden mezőt ki kell tölteni a felhasználó létrehozásához!';
                }
                break;

            case 'updateUser':
                if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['role'])) {
                    $data = [
                        'id' => (int)$_POST['id'],
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'role' => $_POST['role'],
                    ];
                    $result = $client->updateUser($data);
                } else {
                    $_SESSION['rest_error'] = 'Minden mezőt ki kell tölteni a felhasználó frissítéséhez!';
                }
                break;

            case 'deleteUser':
                if (!empty($_POST['id'])) {
                    $id = (int)$_POST['id'];
                    $result = $client->deleteUser($id);
                } else {
                    $_SESSION['rest_error'] = 'Kérjük, adjon meg egy érvényes ID-t a törléshez!';
                }
                break;

            default:
                $_SESSION['rest_error'] = 'Érvénytelen művelet!';
        }

        if ($result) {
            $_SESSION['rest_result'] = $result;
        }
    }
} catch (Exception $e) {
    $_SESSION['rest_error'] = 'REST Error: ' . $e->getMessage();
}

// Redirect back to the RESTful client view
header('Location: ' . SITE_ROOT . 'index.php?page=rest_client');
exit;
