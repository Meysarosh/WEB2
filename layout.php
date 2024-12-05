<?php
require_once __DIR__ . '/helpers/menu_helper.php';


$role = $_SESSION['role'] ?? 'ROLE_GUEST'; // Default to guest if not logged in
$menus = getMenu($role);
?>

<!doctype html>
<html lang="hu" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($title ?? 'Webalkalmazás'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo SITE_ROOT . 'index.php?page=home'; ?>">Webalkalmazás</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php foreach ($menus as $menu): ?>
                        <?php if (empty($menu['submenus'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo SITE_ROOT . 'index.php?page=' . $menu['route']; ?>"><?php echo htmlspecialchars($menu['name']); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown<?php echo $menu['id']; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo htmlspecialchars($menu['name']); ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown<?php echo $menu['id']; ?>">
                                    <?php foreach ($menu['submenus'] as $submenu): ?>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo SITE_ROOT . 'index.php?page=' . $submenu['route']; ?>"><?php echo htmlspecialchars($submenu['name']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="flex-shrink-0">
    <div class="container">
        <?php echo $content ?? ''; ?>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-dark text-light">
    <div class="container">
        <span class="text-muted">© <?php echo date('Y'); ?> Webalkalmazás</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
