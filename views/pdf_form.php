<?php
require '../db.php';

$locationsQuery = $pdo->query("SELECT nev FROM helyseg");
$locations = $locationsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generálása</title>
</head>
<body>
    <h1>PDF Generálása</h1>
    <form action="../controllers/generate_pdf.php" method="POST">
        <label for="location">Válasszon helyszínt (opcionális):</label>
        <select id="location" name="location">
            <option value="">-- Válasszon helyszínt --</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?php echo htmlspecialchars($location['nev']); ?>">
                    <?php echo htmlspecialchars($location['nev']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="input1">Ország (opcionális):</label>
        <input type="text" id="input1" name="input1">
        <br><br>

        <label for="input2">Szálloda neve (opcionális):</label>
        <input type="text" id="input2" name="input2">
        <br><br>

        <label for="input3">Max ár (opcionális):</label>
        <input type="number" id="input3" name="input3" step="0.01">
        <br><br>

        <button type="submit">PDF Generálása</button>
    </form>
</body>
</html>
