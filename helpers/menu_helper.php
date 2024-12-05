<?php
require_once __DIR__ . '/../config.php';
require SERVER_ROOT . 'db.php';

// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getMenu($role) {
    global $pdo;

    $query = $pdo->prepare("
        SELECT * FROM menu 
        WHERE parent_id IS NULL AND (role = ? OR role = 'ROLE_GUEST')
        ORDER BY id
    ");
    $query->execute([$role]);
    $menus = $query->fetchAll(PDO::FETCH_ASSOC);

    $subQuery = $pdo->prepare("
        SELECT * FROM menu 
        WHERE parent_id = ? AND (role = ? OR role = 'ROLE_GUEST')
        ORDER BY id
    ");

    foreach ($menus as &$menu) {
        $subQuery->execute([$menu['id'], $role]);
        $menu['submenus'] = $subQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    return $menus;
}
