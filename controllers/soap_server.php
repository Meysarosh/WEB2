<?php
require_once __DIR__ . '/../config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Render the view
$title = 'SOAP Szerver Leírás';
ob_start();
require SERVER_ROOT . 'views/soap_server.php';
