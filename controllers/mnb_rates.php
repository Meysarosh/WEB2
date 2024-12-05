<?php
require_once __DIR__ . '/../config.php';
require_once SERVER_ROOT . 'controllers/mnb_client.php';

$mnb = new MNBClient();

$rates = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currency = $_POST['currency'] ?? null;
    $date = $_POST['date'] ?? null;

    if ($currency && $date) {
        $rates = $mnb->parseExchangeRates($date, $date, $currency);
        if (empty($rates)) {
            $error = "Nincs adat a megadott dátumra és devizapárra.";
        }
    } else {
        $error = "Kérjük, válasszon devizát és adjon meg egy dátumot!";
    }
}

require_once SERVER_ROOT . 'views/mnb_rates.php';
