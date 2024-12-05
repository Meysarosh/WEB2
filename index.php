<?php
require_once __DIR__ . '/config.php';

session_start();

// Set the page title
$title = 'Utazási Iroda';

// Determine which page to load
$page = $_GET['page'] ?? 'home'; // Default to 'home'

// Start output buffering for dynamic content
ob_start();

switch ($page) {
    case 'home':
        require_once SERVER_ROOT . 'views/home.php';
        break;

    case 'login':
        require_once SERVER_ROOT . 'views/login.php';
        break;

    case 'register':
        require_once SERVER_ROOT . 'views/register.php';
        break;

    case 'logout':
        require_once SERVER_ROOT . 'controllers/logout.php';
        break;

    case 'soap_server':
        require_once SERVER_ROOT . 'controllers/soap_server.php';
        break;

    case 'soap_client':
        require_once SERVER_ROOT . 'controllers/soap_client.php';
        break;

    // MNB logic cases
    case 'mnb_rates':
        require_once SERVER_ROOT . 'controllers/mnb_rates.php'; // Handles logic and passes data to the view
        break;

    case 'mnb_table':
        require_once SERVER_ROOT . 'controllers/mnb_table.php'; // Handles logic and passes data to the view
        break;

    case 'mnb_chart':
        require_once SERVER_ROOT . 'controllers/mnb_chart.php'; // Handles logic and passes data to the view
        break;

    // RESTful functionality
    case 'rest_server':
        require_once SERVER_ROOT . 'views/rest_server.php';
        break;

    case 'rest_client':
        require_once SERVER_ROOT . 'views/rest_client.php';
        break;

    // Admin functionality
    case 'admin_users':
        require_once SERVER_ROOT . 'views/admin/users.php';
        break;

    case 'admin_add_user':
        require_once SERVER_ROOT . 'views/admin/add_user.php';
        break;

    case 'admin_edit_user':
        require_once SERVER_ROOT . 'views/admin/edit_user.php';
        break;

    case 'admin_delete_user':
        require_once SERVER_ROOT . 'views/admin/delete_user.php';
        break;
    
    case 'generate_pdf':
        require_once SERVER_ROOT . 'views/pdf_form.php';
        break;

    default:
        // Handle 404 error
        http_response_code(404);
        require_once SERVER_ROOT . 'views/404.php';
        break;
}

// Capture the content for the layout
$content = ob_get_clean();

// Include the layout file
require SERVER_ROOT . 'layout.php';
