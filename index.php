<?php
require_once __DIR__ . '/config.php';

session_start();

// Set the page title
$title = 'Webalkalmazás';

// Determine which page to load
$page = $_GET['page'] ?? 'home'; // Default to 'home'

// Start output buffering for dynamic content
ob_start();

// Map the page to the corresponding file
$pageFile = match ($page) {
    'home' => SERVER_ROOT . 'views/home.php',
    'login' => SERVER_ROOT . 'views/login.php',
    'register' => SERVER_ROOT . 'views/register.php',
    'logout' => SERVER_ROOT . 'controllers/logout.php',
    'soap_server' => SERVER_ROOT . 'controllers/soap_server.php',
    'soap_client' => SERVER_ROOT . 'controllers/soap_client.php',
    'mnb_rates' => SERVER_ROOT . 'views/mnb_rates.php',
    'mnb_table' => SERVER_ROOT . 'views/mnb_table.php',
    'mnb_chart' => SERVER_ROOT . 'views/mnb_chart.php',
    'rest_server' => SERVER_ROOT . 'controllers/rest_server.php',
    'rest_client' => SERVER_ROOT . 'controllers/rest_client.php',
    'admin_users' => SERVER_ROOT . 'views/admin/users.php',
    'admin_add_user' => SERVER_ROOT . 'views/admin/add_user.php',
    'admin_edit_user' => SERVER_ROOT . 'views/admin/edit_user.php',
    'admin_delete_user' => SERVER_ROOT . 'views/admin/delete_user.php',
    default => null,
};

// Include the requested page file if it exists
if ($pageFile && file_exists($pageFile)) {
    require $pageFile;
} else {
    echo "<h1>404 - Az oldal nem található</h1>";
    echo "<p>A kért oldal nem létezik.</p>";
}

// Capture the content for the layout
$content = ob_get_clean();

// Include the layout file
require SERVER_ROOT . 'layout.php';
