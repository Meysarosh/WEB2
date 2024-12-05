<?php
$title = 'Árfolyam lekérdezés'; // Page title for layout
?>

<h1 class="text-center">Árfolyam lekérdezés</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?page=mnb_rates" class="mb-4">
    <div class="mb-3">
        <label for="currency" class="form-label">Deviza:</label>
        <select name="currency" id="currency" class="form-select" required>
            <option value="">Válasszon...</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Dátum:</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Lekérdezés</button>
</form>

<?php if (!empty($rates)): ?>
    <h2>Eredmény:</h2>
    <p><strong>Dátum:</strong> <?php echo htmlspecialchars($rates[0]['date']); ?></p>
    <p><strong>Deviza:</strong> <?php echo htmlspecialchars($rates[0]['currency']); ?></p>
    <p><strong>Árfolyam:</strong> <?php echo htmlspecialchars($rates[0]['value']); ?></p>
<?php endif; ?>
