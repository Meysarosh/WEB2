<?php

require_once __DIR__ . '/../config.php';
require_once SERVER_ROOT . 'controllers/mnb_client.php';

// Initialize MNB Client
$mnb = new MNBClient();

// Set default date range (current month)
$year = date('Y');
$month = date('m');
$startDate = "{$year}-{$month}-01";
$endDate = date("Y-m-t", strtotime($startDate));
$currencies = null;
$data = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'] ?? $year;
    $month = $_POST['month'] ?? $month;
    $currencies = $_POST['currencies'] ?? null;

    // Construct date range
    $startDate = "{$year}-{$month}-01";
    $endDate = date("Y-m-t", strtotime($startDate));

    // Fetch rates
    $data = $mnb->parseExchangeRates($startDate, $endDate, $currencies);
}

// Prepare data for Chart.js
$chartLabels = array_values(array_unique(array_column($data, 'date')));
$chartData = [];
if ($currencies) {
    $currencyList = explode(',', $currencies);
    foreach ($currencyList as $currency) {
        $chartData[$currency] = array_map(function ($date) use ($data, $currency) {
            foreach ($data as $rate) {
                if ($rate['date'] === $date && $rate['currency'] === $currency) {
                    return $rate['value'];
                }
            }
            return null;
        }, $chartLabels);
    }
}

require SERVER_ROOT . 'views/mnb_chart.php';
