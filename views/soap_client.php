<?php
$title = 'SOAP Kliens'; // Page title for layout
?>
<div class="container my-4">
    <h1 class="text-center">SOAP Kliens</h1>

    <p class="text-center">
        Ez az oldal lehetőséget biztosít a SOAP szolgáltatások tesztelésére. Az alábbi gombok segítségével különböző műveleteket hajthat végre a <strong>tavasz</strong> táblázat adataival.
    </p>

    <?php if (isset($_SESSION['soap_error'])): ?>
        <div class="alert alert-danger text-center">
            <?php echo htmlspecialchars($_SESSION['soap_error']); ?>
        </div>
        <?php unset($_SESSION['soap_error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['soap_result'])): ?>
        <div class="alert alert-success">
            <strong>Művelet:</strong> <?php echo htmlspecialchars($_SESSION['soap_result']['action']); ?><br>
            <strong>Eredmény:</strong> <pre><?php print_r($_SESSION['soap_result']['data']); ?></pre>
        </div>
        <?php unset($_SESSION['soap_result']); ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <!-- Separate forms for each action -->
            <form action="controllers/soap_client.php" method="POST" class="mb-3">
                <input type="hidden" name="action" value="getAll">
                <button type="submit" class="btn btn-primary w-100">Összes rekord lekérdezése</button>
            </form>

            <form action="controllers/soap_client.php" method="POST" class="mb-3">
                <input type="hidden" name="action" value="getById">
                <div class="mb-3">
                    <label for="getById" class="form-label">Rekord lekérdezése azonosító alapján:</label>
                    <input type="number" name="id" id="getById" class="form-control" placeholder="Adja meg a sorszámot" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Lekérdezés</button>
            </form>

            <form action="controllers/soap_client.php" method="POST" class="mb-3">
                <input type="hidden" name="action" value="add">
                <div class="mb-3">
                    <label for="addRecord" class="form-label">Új rekord hozzáadása:</label>
                    <input type="date" name="indulas" class="form-control mb-2" placeholder="Indulás dátuma" required>
                    <input type="number" name="idotartam" class="form-control mb-2" placeholder="Időtartam (napok)" required>
                    <input type="number" name="ar" class="form-control mb-2" placeholder="Ár (HUF)" required>
                    <input type="text" name="szallodaAz" class="form-control mb-2" placeholder="Szálloda azonosítója (e.g., BS, CL, CW)" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Hozzáadás</button>
            </form>

            <form action="controllers/soap_client.php" method="POST" class="mb-3">
                <input type="hidden" name="action" value="update">
                <div class="mb-3">
                    <label for="updateRecord" class="form-label">Rekord frissítése:</label>
                    <input type="number" name="sorszam" class="form-control mb-2" placeholder="Rekord sorszáma" required>
                    <input type="date" name="indulas" class="form-control mb-2" placeholder="Indulás dátuma" required>
                    <input type="number" name="idotartam" class="form-control mb-2" placeholder="Időtartam (napok)" required>
                    <input type="number" name="ar" class="form-control mb-2" placeholder="Ár (HUF)" required>
                    <input type="text" name="szallodaAz" class="form-control mb-2" placeholder="Szálloda azonosítója (e.g., BS, CL, CW)" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Frissítés</button>
            </form>

            <form action="controllers/soap_client.php" method="POST" class="mb-3">
                <input type="hidden" name="action" value="delete">
                <div class="mb-3">
                    <label for="deleteRecord" class="form-label">Rekord törlése azonosító alapján:</label>
                    <input type="number" name="sorszam" id="deleteRecord" class="form-control" placeholder="Adja meg a sorszámot" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Törlés</button>
            </form>
        </div>
    </div>
</div>
