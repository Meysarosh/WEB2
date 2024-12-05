<?php
$title = 'Bejelentkezés'; // Page title for layout

// Fetch error messages from the session
$error = $_SESSION['login_error'] ?? null;

// Clear the error after displaying it
unset($_SESSION['login_error']);
?>

<h2 class="text-center mt-4">Bejelentkezés</h2>

<?php if ($error): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<form action="controllers/login.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Bejelentkezés</button>
</form>
