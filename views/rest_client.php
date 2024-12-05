<?php
$title = 'RESTful Kliens';
?>
<h1 class="text-center">RESTful Kliens</h1>
<p>Ez az oldal lehetőséget biztosít a RESTful szolgáltatás tesztelésére:</p>

<?php if (isset($_SESSION['rest_error'])): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($_SESSION['rest_error']); ?>
    </div>
    <?php unset($_SESSION['rest_error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['rest_result'])): ?>
    <div class="alert alert-success">
        <pre><?php print_r($_SESSION['rest_result']); ?></pre>
    </div>
    <?php unset($_SESSION['rest_result']); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <h2>GET: Összes vagy adott felhasználó lekérése</h2>
        <form action="controllers/rest_client.php" method="POST" class="mb-3">
            <button type="submit" name="action" value="getUsers" class="btn btn-primary">Összes felhasználó</button>
        </form>
        <form action="controllers/rest_client.php" method="POST" class="mb-3">
            <label for="getById" class="form-label">Felhasználó ID:</label>
            <input type="number" name="id" id="getById" class="form-control mb-2">
            <button type="submit" name="action" value="getUserById" class="btn btn-primary">Lekérdezés</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2>POST: Új felhasználó létrehozása</h2>
        <form action="controllers/rest_client.php" method="POST" class="mb-3">
            <label for="name" class="form-label">Név:</label>
            <input type="text" name="name" class="form-control mb-2" required>
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control mb-2" required>
            <label for="password" class="form-label">Jelszó:</label>
            <input type="password" name="password" class="form-control mb-2" required>
            <label for="role" class="form-label">Szerepkör:</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="">Válasszon szerepkört...</option>
                    <option value="ROLE_USER" <?php echo (isset($_POST['role']) && $_POST['role'] === 'ROLE_USER') ? 'selected' : ''; ?>>Felhasználó</option>
                    <option value="ROLE_ADMIN" <?php echo (isset($_POST['role']) && $_POST['role'] === 'ROLE_ADMIN') ? 'selected' : ''; ?>>Adminisztrátor</option>
                </select>
            <button type="submit" name="action" value="createUser" class="btn btn-success">Létrehozás</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2>PUT: Felhasználó adatainak frissítése</h2>
        <form action="controllers/rest_client.php" method="POST" class="mb-3">
            <label for="id" class="form-label">Felhasználó ID:</label>
            <input type="number" name="id" class="form-control mb-2" required>
            <label for="name" class="form-label">Név:</label>
            <input type="text" name="name" class="form-control mb-2" required>
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control mb-2" required>
            <label for="role" class="form-label">Szerepkör:</label>
            <select id="role" name="role" class="form-select" required>
                    <option value="">Válasszon szerepkört...</option>
                    <option value="ROLE_USER" <?php echo (isset($_POST['role']) && $_POST['role'] === 'ROLE_USER') ? 'selected' : ''; ?>>Felhasználó</option>
                    <option value="ROLE_ADMIN" <?php echo (isset($_POST['role']) && $_POST['role'] === 'ROLE_ADMIN') ? 'selected' : ''; ?>>Adminisztrátor</option>
            </select>   
            <button type="submit" name="action" value="updateUser" class="btn btn-warning">Frissítés</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2>DELETE: Felhasználó törlése</h2>
        <form action="controllers/rest_client.php" method="POST" class="mb-3">
            <label for="deleteId" class="form-label">Felhasználó ID:</label>
            <input type="number" name="id" class="form-control mb-2" required>
            <button type="submit" name="action" value="deleteUser" class="btn btn-danger">Törlés</button>
        </form>
    </div>
</div>
