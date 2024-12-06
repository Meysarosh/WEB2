<?php
$title = 'Bejelentkezés'; // Page title for layout
?>
<h1 class="text-center">Bejelentkezés</h1>

<?php if (!empty($_SESSION['login_error'])): ?>
    <div class="alert alert-danger text-center">
        <?php 
        echo htmlspecialchars($_SESSION['login_error']); 
        unset($_SESSION['login_error']); // Clear the error after displaying
        ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
<form action="controllers/login.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Bejelentkezés</button>
</form>
</div></div>