<?php
require_once __DIR__ . '/../db.php';

function getMenu($role) {
    global $pdo;

    // Define role hierarchy
    $rolesToInclude = match ($role) {
        'ROLE_ADMIN' => ['ROLE_ADMIN', 'ROLE_USER'], // Admin sees all menus
        'ROLE_USER' => ['ROLE_USER'], // User sees their menus + guest menus
        default => ['ROLE_GUEST'], // Guests see only guest menus
    };

    // Convert roles into placeholders for the query
    $placeholders = implode(',', array_fill(0, count($rolesToInclude), '?'));

    // Fetch top-level menus based on roles
    $query = $pdo->prepare("
        SELECT * FROM menu 
        WHERE parent_id IS NULL 
        AND role IN ($placeholders)
        ORDER BY id
    ");
    $query->execute($rolesToInclude);
    $menus = $query->fetchAll(PDO::FETCH_ASSOC);

    // Fetch submenus for each menu
    $subQuery = $pdo->prepare("
        SELECT * FROM menu 
        WHERE parent_id = ? 
        AND role IN ($placeholders)
        ORDER BY id
    ");

    foreach ($menus as &$menu) {
        $subQuery->execute(array_merge([$menu['id']], $rolesToInclude));
        $menu['submenus'] = $subQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    return $menus;
}
