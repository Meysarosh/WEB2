<?php
$title = 'Regisztráció'; // Page title for layout
?>
<h1 class="text-center">Regisztráció</h1>

<?php if (!empty($_SESSION['register_error'])): ?>
    <div class="alert alert-danger text-center">
        <?php 
        echo htmlspecialchars($_SESSION['register_error']); 
        unset($_SESSION['register_error']); // Clear the error after displaying
        ?>
    </div>
<?php endif; ?>

<?php if (!empty($_SESSION['register_success'])): ?>
    <div class="alert alert-success text-center">
        <?php 
        echo htmlspecialchars($_SESSION['register_success']); 
        unset($_SESSION['register_success']); // Clear the message after displaying
        ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
<form action="controllers/register.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label for="name" class="form-label">Név:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Regisztráció</button>
</form>
</div></div>