<?php
$title = 'Táblázat'; // Page title
?>
<h1 class="text-center">Devizaárfolyamok táblázata</h1>
<p class="text-center">Kérjen le adatokat egy adott devizapár és dátumtartomány alapján.</p>

<form action="index.php?page=mnb_table" method="POST" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <label for="currencies" class="form-label">Devizapár:</label>
            <input type="text" id="currencies" name="currencies" class="form-control" placeholder="Pl. EUR,USD" value="<?php echo htmlspecialchars($_POST['currencies'] ?? ''); ?>">
        </div>
        <div class="col-md-3">
            <label for="year" class="form-label">Év:</label>
            <input type="number" id="year" name="year" class="form-control" min="2000" max="<?php echo date('Y'); ?>" value="<?php echo htmlspecialchars($_POST['year'] ?? date('Y')); ?>">
        </div>
        <div class="col-md-3">
            <label for="month" class="form-label">Hónap:</label>
            <select id="month" name="month" class="form-select">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo (int)($_POST['month'] ?? date('m')) === $i ? 'selected' : ''; ?>>
                        <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Lekérdezés</button>
        </div>
    </div>
</form>

<?php if (!empty($data)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Deviza</th>
                <th>Árfolyam</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $rate): ?>
                <tr>
                    <td><?php echo htmlspecialchars($rate['date']); ?></td>
                    <td><?php echo htmlspecialchars($rate['currency']); ?></td>
                    <td><?php echo htmlspecialchars($rate['value']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info">Nincs megjeleníthető adat.</div>
<?php endif; ?>
