<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

// Define SOAP functions
function getAll() {
    global $pdo;
    $query = $pdo->query("
        SELECT t.sorszam, t.indulas, t.idotartam, t.ar, sz.nev AS szalloda, h.nev AS helyseg
        FROM tavasz t
        JOIN szalloda sz ON t.szalloda_az = sz.az
        JOIN helyseg h ON sz.helyseg_az = h.az
    ");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getById($id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT t.sorszam, t.indulas, t.idotartam, t.ar, sz.nev AS szalloda, h.nev AS helyseg
        FROM tavasz t
        JOIN szalloda sz ON t.szalloda_az = sz.az
        JOIN helyseg h ON sz.helyseg_az = h.az
        WHERE t.sorszam = ?
    ");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function add($indulas, $idotartam, $ar, $szallodaAz) {
    global $pdo;
    $stmt = $pdo->prepare("
        INSERT INTO tavasz (indulas, idotartam, ar, szalloda_az) 
        VALUES (?, ?, ?, ?)
    ");
    return $stmt->execute([$indulas, $idotartam, $ar, $szallodaAz]);
}

function update($sorszam, $indulas, $idotartam, $ar, $szallodaAz) {
    global $pdo;
    $stmt = $pdo->prepare("
        UPDATE tavasz
        SET indulas = ?, idotartam = ?, ar = ?, szalloda_az = ?
        WHERE sorszam = ?
    ");
    return $stmt->execute([$indulas, $idotartam, $ar, $szallodaAz, $sorszam]);
}

function delete($sorszam) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM tavasz WHERE sorszam = ?");
    return $stmt->execute([$sorszam]);
}

// Initialize SOAP server
$server = new SoapServer(null, [
    'uri' => SITE_ROOT . 'controllers/soap.php',
]);

// Register SOAP functions
$server->addFunction('getAll');
$server->addFunction('getById');
$server->addFunction('add');
$server->addFunction('update');
$server->addFunction('delete');

// Handle SOAP requests
$server->handle();
