<?php
require_once __DIR__ . '/config.php';

session_start();

$title = 'Utazási Iroda';

$page = $_GET['page'] ?? 'home';

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

  
    case 'mnb_rates':
        require_once SERVER_ROOT . 'controllers/mnb_rates.php'; 
        break;

    case 'mnb_table':
        require_once SERVER_ROOT . 'controllers/mnb_table.php'; 
        break;

    case 'mnb_chart':
        require_once SERVER_ROOT . 'controllers/mnb_chart.php'; 
        break;

    case 'rest_server':
        require_once SERVER_ROOT . 'controllers/rest_server.php';
        break;

    case 'rest_client':
        require_once SERVER_ROOT . 'controllers/rest_client.php';
        break;

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

    default:
        http_response_code(404);
        require_once SERVER_ROOT . 'views/404.php';
        break;
}

$content = ob_get_clean();

require SERVER_ROOT . 'layout.php';
