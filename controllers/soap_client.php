<?php
require_once __DIR__ . '/../config.php';

$options = [
    'location' => SITE_ROOT . 'controllers/soap.php',
    'uri' => SITE_ROOT . 'controllers/soap.php',
];

// Create the SOAP client
$client = new SoapClient(null, $options);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    // Handle SOAP operations based on the action
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = $_POST['action'];
        $result = null;

        switch ($action) {
            case 'getAll':
                $result = $client->getAll();
                $_SESSION['soap_result'] = [
                    'action' => 'getAll',
                    'data' => $result,
                ];
                break;

            case 'getById':
                if (!empty($_POST['id'])) {
                    $id = (int)$_POST['id'];
                    $result = $client->getById($id);
                    $_SESSION['soap_result'] = [
                        'action' => 'getById',
                        'data' => $result,
                    ];
                } else {
                    $_SESSION['soap_error'] = 'Please provide a valid ID for the Get By ID operation.';
                }
                break;

            case 'add':
                if (!empty($_POST['indulas']) && !empty($_POST['idotartam']) && !empty($_POST['ar']) && !empty($_POST['szallodaAz'])) {
                    $indulas = $_POST['indulas'];
                    $idotartam = (int)$_POST['idotartam'];
                    $ar = (int)$_POST['ar'];
                    $szallodaAz = $_POST['szallodaAz'];

                    try {
                        $result = $client->add($indulas, $idotartam, $ar, $szallodaAz);
                        $_SESSION['soap_result'] = [
                            'action' => 'add',
                            'data' => $result ? 'Record added successfully.' : 'Failed to add record.',
                        ];
                    } catch (SoapFault $e) {
                        $_SESSION['soap_error'] = 'SOAP Error during Add operation: ' . $e->getMessage();
                    }
                } else {
                    $_SESSION['soap_error'] = 'Please fill all fields for the Add operation.';
                }
                break;

            case 'update':
                if (!empty($_POST['sorszam']) && !empty($_POST['indulas']) && !empty($_POST['idotartam']) && !empty($_POST['ar']) && !empty($_POST['szallodaAz'])) {
                    $sorszam = (int)$_POST['sorszam'];
                    $indulas = $_POST['indulas'];
                    $idotartam = (int)$_POST['idotartam'];
                    $ar = (int)$_POST['ar'];
                    $szallodaAz = $_POST['szallodaAz'];

                    try {
                        $result = $client->update($sorszam, $indulas, $idotartam, $ar, $szallodaAz);
                        $_SESSION['soap_result'] = [
                            'action' => 'update',
                            'data' => $result ? 'Record updated successfully.' : 'Failed to update record.',
                        ];
                    } catch (SoapFault $e) {
                        $_SESSION['soap_error'] = 'SOAP Error during Update operation: ' . $e->getMessage();
                    }
                } else {
                    $_SESSION['soap_error'] = 'Please fill all fields for the Update operation.';
                }
                break;

            case 'delete':
                if (!empty($_POST['sorszam'])) {
                    $sorszam = (int)$_POST['sorszam'];

                    try {
                        $result = $client->delete($sorszam);
                        $_SESSION['soap_result'] = [
                            'action' => 'delete',
                            'data' => $result ? 'Record deleted successfully.' : 'Failed to delete record.',
                        ];
                    } catch (SoapFault $e) {
                        $_SESSION['soap_error'] = 'SOAP Error during Delete operation: ' . $e->getMessage();
                    }
                } else {
                    $_SESSION['soap_error'] = 'Please provide a valid ID for the Delete operation.';
                }
                break;

            default:
                $_SESSION['soap_error'] = 'Invalid operation.';
        }

        // Redirect back to the SOAP client view after processing
        header('Location: ' . SITE_ROOT . 'index.php?page=soap_client');
        exit;
    }
} catch (Exception $e) {
    $_SESSION['soap_error'] = 'SOAP Error: ' . $e->getMessage();
}

// If no POST action, include the view directly
require_once __DIR__ . '/../views/soap_client.php';
