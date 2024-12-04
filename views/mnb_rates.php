<?php
require '../controllers/mnb_client.php';

$mnb = new MNBClient();
$startDate = '2024-11-01';
$endDate = '2024-12-03';
$currencies = 'EUR,USD';

$rates = $mnb->parseExchangeRates($startDate, $endDate, $currencies);

$chartLabels = array_values(array_unique(array_column($rates, 'date')));
$chartDataEUR = [];
$chartDataUSD = [];

foreach ($chartLabels as $label) {
    $eurRate = null;
    $usdRate = null;

    foreach ($rates as $rate) {
        if ($rate['date'] === $label && $rate['currency'] === 'EUR') {
            $eurRate = $rate['value'];
        }
        if ($rate['date'] === $label && $rate['currency'] === 'USD') {
            $usdRate = $rate['value'];
        }
    }

    $chartDataEUR[] = $eurRate;
    $chartDataUSD[] = $usdRate;
}

$chartDataEUR = array_map('floatval', $chartDataEUR);
$chartDataUSD = array_map('floatval', $chartDataUSD);

$allValues = array_merge($chartDataEUR, $chartDataUSD);
$minValue = floor(min($allValues)); 
$maxValue = ceil(max($allValues));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Exchange Rates</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Currency</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rates as $rate): ?>
                <tr>
                    <td><?php echo htmlspecialchars($rate['date']); ?></td>
                    <td><?php echo htmlspecialchars($rate['currency']); ?></td>
                    <td><?php echo htmlspecialchars($rate['value']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <canvas id="exchangeRateChart" width="400" height="200"></canvas>
    <script>
    const chartLabels = <?php echo json_encode($chartLabels); ?>;
    const chartDataEUR = <?php echo json_encode(array_map('floatval', $chartDataEUR)); ?>;
    const chartDataUSD = <?php echo json_encode(array_map('floatval', $chartDataUSD)); ?>;
    const minValue = <?php echo json_encode($minValue); ?>;
    const maxValue = <?php echo json_encode($maxValue); ?>;

    const data = {
        labels: chartLabels,
        datasets: [
            {
                label: 'EUR',
                data: chartDataEUR,
                borderColor: 'blue',
                fill: false,
            },
            {
                label: 'USD',
                data: chartDataUSD,
                borderColor: 'green',
                fill: false,
            }
        ]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            scales: {
                x: {
                    type: 'category',
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Exchange Rate'
                    },
                    min: minValue-10,
                    max: maxValue+10,
                }
            }
        }
    };

    new Chart(
        document.getElementById('exchangeRateChart'),
        config
    );
</script>

</body>
</html>
