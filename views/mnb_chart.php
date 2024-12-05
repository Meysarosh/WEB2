<?php
$title = 'Grafikon'; // Page title
?>
<h1 class="text-center">Devizaárfolyamok grafikonja</h1>
<p class="text-center">Kérjen le adatokat egy adott devizapár és dátumtartomány alapján.</p>

<form action="index.php?page=mnb_chart" method="POST" class="mb-4">
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

<?php if (!empty($chartLabels)): ?>
    <canvas id="exchangeRateChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($chartLabels); ?>;
        const datasets = [
            <?php foreach ($chartData as $currency => $values): ?>
            {
                label: '<?php echo $currency; ?>',
                data: <?php echo json_encode($values); ?>,
                borderColor: '<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)); ?>',
                fill: false
            },
            <?php endforeach; ?>
        ];

        const config = {
            type: 'line',
            data: { labels, datasets },
            options: {
                responsive: true,
                scales: {
                    y: {
                        title: { display: true, text: 'Árfolyam' },
                    },
                    x: {
                        title: { display: true, text: 'Dátum' },
                    }
                }
            }
        };

        new Chart(document.getElementById('exchangeRateChart'), config);
    </script>
<?php else: ?>
    <div class="alert alert-info">Nincs megjeleníthető adat.</div>
<?php endif; ?>
